<?php
namespace backend\controllers;
use Yii;
use backend\models\DataPemohon;
use backend\models\JadwalPeninjauan;
use backend\models\LegalitasPerusahaan;
use yii\web\Controller;
use backend\models\FileHasilTinjauan;
use yii\web\UploadedFile;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class HasilTinjauanController extends Controller
{
    
    public function actionIndex()
    {
        $query = (new yii\db\Query())
                ->select(['b.id AS id_jadwal_peninjau, a.id_data_pemohon,a.no_registrasi, a.id,d.no_ktp,d.nm_pemohon,'
                        . 'a.id_jenis_izin,e.nm_jenis_izin,f.nm_jenis_permohonan,g.nm_perusahaan,c.nm_teknisi,concat(no_ktp,"-",nm_pemohon) as gbung'])
                ->from('pemohon_pengajuan a')
                ->innerJoin('data_pemohon d','a.id_data_pemohon=d.id')
                ->innerJoin('data_perusahaan g','d.id=g.id_pemohon')
                ->innerJoin('jadwal_peninjauan b','a.id=b.id_pemohon_pengajuan')
                ->innerJoin('ref_tim_teknis c','b.id_tim_teknis=c.id')
                ->innerJoin('ref_jenis_izin e','a.id_jenis_izin=e.id')
                ->innerJoin('ref_jenis_permohonan f','a.id_jenis_permohonan=f.id');
        
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query'=>$query,
            
        ]);
        return $this->renderAjax('index',[
            'dataProvider'=>$dataProvider
        ]);
    }
    
    public function actionCreate()
    {
        $id_jadwal_peninjau = Yii::$app->request->get('id');
        
        $query = (new yii\db\Query())
                ->select('b.id AS id_jadwal_peninjau,b.id_tim_teknis,a.id as id_pemohon_pengajuan, a.id_data_pemohon,a.no_registrasi, a.id,d.no_ktp,d.nm_pemohon')
                ->from('pemohon_pengajuan a')
                ->innerJoin('data_pemohon d','a.id_data_pemohon=d.id')
                ->innerJoin('data_perusahaan g','d.id=g.id_pemohon')
                ->innerJoin('jadwal_peninjauan b','a.id=b.id_pemohon_pengajuan')
                ->innerJoin('ref_tim_teknis c','b.id_tim_teknis=c.id')
                ->innerJoin('ref_jenis_izin e','a.id_jenis_izin=e.id')
                ->innerJoin('ref_jenis_permohonan f','a.id_jenis_permohonan=f.id')
                ->where(['b.id'=>$id_jadwal_peninjau])->one();
        $model = new \backend\models\DataHasilTinjauan();
        $model->id_pemohon_pengajuan=$query['id_pemohon_pengajuan'];
        $model->no_registrasi = $query['no_registrasi'];
        $model->id_tim_teknis = $query['id_tim_teknis'];
        $modelFileTinjauan = new FileHasilTinjauan();
        $modelFileTinjauan->no_registrasi = $query['no_registrasi'];
        $modelFileTinjauan->tahun = date('Y');
        if($model->load(Yii::$app->request->post()) && $modelFileTinjauan->load(\Yii::$app->request->post()))
        {
             $modelFileTinjauan->imgfile = UploadedFile::getInstances($model, 'imgfile');
  foreach ($modelFileTinjauan->imgfile as $file) {
      $filename = $file->baseName . '.' . $file->extension;
      $modelFileTinjauan->file_tinjauan = $filename;
                $file->saveAs(Yii::getAlias('@web').'/uploads/' . $filename);
                $modelFileTinjauan->save(false);
            }
            $model->save(false);
            $modelPemohonPengajuan = \backend\models\PemohonPengajuan::findOne($query['id_pemohon_pengajuan']);
            $modelPemohonPengajuan->status_verifikasi=1;
            $modelPemohonPengajuan->tgl_verifikasi=date('Y-m-d H:i:s');
            $modelPemohonPengajuan->save(false);
            return $this->redirect(['#hasil-tinjauan/view-hasil-tinjauan','id'=>$model->id_pemohon_pengajuan]);
        }
        
        return $this->renderAjax('create',[
            'model'=>$model,
            'modelFileTinjauan'=>$modelFileTinjauan,
            'query'=>$query
        ]);
    }
    
    public function actionViewHasilTinjauan($id)
    {
          $model = \backend\models\DataHasilTinjauan::find()->where(['id_pemohon_pengajuan'=>$id])->one();
        return $this->renderAjax('view-hasil-tinjauan',[
            'model'=>$model
        ]);
    }
    
    public function actionViewHasiJadwal($id){
        
        return $this->renderAjax('hasil-jadwal');
    }
}
