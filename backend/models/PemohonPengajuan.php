<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pemohon_pengajuan".
 *
 * @property int $id
 * @property string $no_registrasi
 * @property int $id_user
 * @property int $id_data_pemohon
 * @property int $id_jenis_izin
 * @property int $id_jenis_permohonan
 * @property int $id_jenis_bdn_usaha
 * @property int $status_pengajuan pengajuan ke loket 
 * @property int id_status_daftar id status cari mendaftar (1:online,2:offine)
 * @property int $status_verifikasi verifikasi dr kasi
 * @property int $status_selesai selesai
 * @property string $tgl_pengajuan
 * @property string $tgl_verifikasi
 * @property string $tgl_selesai
 * @property string $status_kunci
 * @property string $catatan_verifikasi_pengajuan
 * @property string $catatan_verifikasi
 * @property string $catatan_selesai
 */
class PemohonPengajuan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemohon_pengajuan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jenis_izin','id_jenis_bdn_usaha','id_jenis_permohonan','lokasi_izin'],'required'],
            [['id_user','id_status_daftar', 'id_data_pemohon', 'id_jenis_izin', 
                'id_jenis_permohonan', 'id_jenis_bdn_usaha', 'status_pengajuan', 'status_verifikasi', 'status_selesai'], 'integer'],
            [['tgl_pengajuan', 'tgl_verifikasi', 'tgl_selesai'], 'safe'],
            [['status_kunci','lokasi_izin','catatan_verifikasi_pengajuan','catatan_verifikasi','catatan_selesai'], 'string'],
            [['no_registrasi'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_registrasi' => 'No Registrasi',
            'id_user' => 'Id User',
            'id_data_pemohon' => 'Id Data Pemohon',
            'id_jenis_izin' => 'Id Jenis Izin',
            'id_jenis_permohonan' => 'Id Jenis Permohonan',
            'id_jenis_bdn_usaha' => 'Id Jenis Bdn Usaha',
            'status_pengajuan' => 'Status Pengajuan',
            'status_verifikasi' => 'Status Verifikasi',
            'status_selesai' => 'Status Selesai',
            'tgl_pengajuan' => 'Tgl Pengajuan',
            'tgl_verifikasi' => 'Tgl Verifikasi',
            'tgl_selesai' => 'Tgl Selesai',
            'status_kunci' => 'Status Kunci',
        ];
    }
    
    public static function getDataPemohonPengajuan()
    {
        $array = (new \yii\db\Query())
                ->select('a.id,a.no_registrasi,a.id_data_pemohon,b.nm_pemohon,a.id_jenis_permohonan')
                ->from('pemohon_pengajuan a')
                ->innerJoin('data_pemohon b','a.id_data_pemohon=b.id')
                ->where(['a.status_selesai'=>'1'])->all();
        
        return \yii\helpers\ArrayHelper::map($array, 'id', 'no_registrasi');
    }
    
    
    public static function getDataPemohonRegistrasi()
    {
        $sql = "SELECT a.* FROM data_hasil_tinjauan a 
WHERE not EXISTS(SELECT b.* FROM berita_acara b WHERE a.id_pemohon_pengajuan=b.id_pemohon_pengajuan)";
        $cmd = Yii::$app->db->createCommand($sql)->queryAll();
        return \yii\helpers\ArrayHelper::map($cmd, 'id_pemohon_pengajuan', function($model,$defaultValue){
            $pemohonPengajuan = PemohonPengajuan::findOne($model['id_pemohon_pengajuan']);
            $dataPemohon = DataPemohon::find()->where(['id'=>$pemohonPengajuan['id_data_pemohon']])->one();
            return sprintf('%s - %s', $model['no_registrasi'],$dataPemohon['nm_pemohon']);
            
        });
    }
  public static function getDataPemohonNo()
    {
        $sql = "SELECT a.* FROM verifikasi_bap_tim a 
WHERE not EXISTS(SELECT b.* FROM penetapan_nomor b WHERE a.id_pemohon_pengajuan=b.id_pemohon_pengajuan)";
        $cmd = Yii::$app->db->createCommand($sql)->queryAll();
        return \yii\helpers\ArrayHelper::map($cmd, 'id_pemohon_pengajuan', function($model,$defaultValue){
            $pemohonPengajuan = PemohonPengajuan::findOne($model['id_pemohon_pengajuan']);
            $dataPemohon = DataPemohon::find()->where(['id'=>$pemohonPengajuan['id_data_pemohon']])->one();
            return sprintf('%s - %s', $pemohonPengajuan['no_registrasi'],$dataPemohon['nm_pemohon']);
            
        });
    }
    public static function getDataDetailPemohon($id){
         $array = (new \yii\db\Query())
                ->select('a.id,a.no_registrasi,a.id_data_pemohon,a.id_jenis_izin,a.id_jenis_permohonan,
b.no_ktp,b.nm_pemohon,c.nm_jenis_izin,d.nm_jenis_permohonan,e.nm_perusahaan,e.alamat,
a.status_pengajuan,a.status_verifikasi,a.status_selesai')
                ->from('pemohon_pengajuan a')
                ->innerJoin('data_pemohon b','a.id_data_pemohon=b.id')
                ->leftJoin('data_perusahaan e','e.id=a.id_data_perusahaan')
                ->leftJoin('ref_jenis_izin c','a.id_jenis_izin=c.id')
                ->leftJoin('ref_jenis_permohonan d','a.id_jenis_permohonan=d.id')                 
                 ->where(['a.id'=>$id])->groupBy('a.no_registrasi')->all();
         
         return $array;
    }
      public static function getDataDetailPemohonOne($id){
         $array = (new \yii\db\Query())
                ->select('a.id,a.no_registrasi,a.id_data_pemohon,a.id_jenis_izin,a.id_jenis_permohonan,
b.no_ktp,b.nm_pemohon,c.nm_jenis_izin,d.nm_jenis_permohonan,e.nm_perusahaan,e.alamat,
a.status_pengajuan,a.status_verifikasi,a.status_selesai')
                ->from('pemohon_pengajuan a')
                ->innerJoin('data_pemohon b','a.id_data_pemohon=b.id')
                ->leftJoin('data_perusahaan e','e.id=a.id_data_perusahaan')
                ->leftJoin('ref_jenis_izin c','a.id_jenis_izin=c.id')
                ->leftJoin('ref_jenis_permohonan d','a.id_jenis_permohonan=d.id')                 
                 ->where(['a.id'=>$id])->groupBy('a.no_registrasi')->one();
         
         return $array;
    }
}
