<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "data_pemohon".
 *
 * @property int $id
 * @property int $id_tipe_pemohon
 * @property string $no_ktp
 * @property string $no_npwp
 * @property string $id_jns_bdn_usaha
 * @property string $nm_pemohon
 * @property string $nm_pmilik_bu nama pemilik badan usaha
 * @property string $alamat_pemohon
 * @property string $id_prov
 * @property string $id_kabkot
 * @property string $id_desa
 * @property string $id_kec
 * @property string $email_pemohon
 * @property string $telp_pemohon
 */
class DataPemohon extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_pemohon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tipe_pemohon','id_prov','id_kabkot','id_desa','id_kec'], 'required'],
          [['id_tipe_pemohon','id_prov','id_kabkot','id_desa','id_kec'], 'integer'],
            [['no_ktp', 'no_npwp', 'id_jns_bdn_usaha', 'nm_pemohon', 'nm_pmilik_bu', 'alamat_pemohon', 'email_pemohon', 'telp_pemohon'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_tipe_pemohon' => 'Tipe Pemohon',
            'no_ktp' => 'No KTP',
            'no_npwp' => 'No NPWP',
            'id_jns_bdn_usaha' => 'Jenis BU',
            'nm_pemohon' => 'Pemohon',
            'nm_pmilik_bu' => 'Nama Pemilik BU',
            'alamat_pemohon' => 'Alamat Pemohon',
            'id_prov'=>'Provinsi',
            'id_kabkot'=>'Kabupaten Kota',
            'id_desa' => 'Desa',
            'id_kec' => 'Kecamatan',
            'email_pemohon' => 'Email Pemohon',
            'telp_pemohon' => 'Telp Pemohon',
        ];
    }
    
    public static function getDataPemohon(){
        
        $array = DataPemohon::find()
                ->all();
        
        return \yii\helpers\ArrayHelper::map($array, 'id','nm_pemohon');
    } 
    
    public static function NmPemohonById($id)
    {
       $nm_pemohon = DataPemohon::find()->where(['id'=>$id])->one();
       return $nm_pemohon['nm_pemohon'];
    }
}
