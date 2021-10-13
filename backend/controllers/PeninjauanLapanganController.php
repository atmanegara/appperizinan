<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\DataPemohon;
use backend\models\JadwalPeninjauan;
use yii\data\ActiveDataProvider;
/**
 * Description of PeninjauLapanganController
 *
 * @author User
 */
class PeninjauanLapanganController extends Controller{
    //put your code here
    
    public function actionIndex()
    {
        $query = (new \yii\db\Query())
                ->select('c.no_registrasi,c.id,a.no_ktp,a.nm_pemohon,b.nm_perusahaan,d.nm_jenis_izin,c.tgl_pengajuan,e.tgl_peninjauan,e.id as id_jdwl_peninjauan')
                ->from('data_pemohon a')
                ->innerJoin('data_perusahaan b','a.id=b.id_pemohon')
                ->innerJoin('pemohon_pengajuan c','a.id=c.id_data_pemohon')
                ->innerJoin('ref_jenis_izin d','c.id_jenis_izin = d.id')
                ->innerJoin('persetujuan_permohonan f','c.no_registrasi=f.no_registrasi')
        ->leftJoin('jadwal_peninjauan e','e.id_pemohon_pengajuan=c.id');
        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
           
        ]);
        return $this->renderAjax('index',[
            'dataProvider'=>$dataProvider
        ]);
    }
    
    public function actionEntryJadwal($id_pemohon_pengajuan)
    {
        $model = new JadwalPeninjauan();
        $model->id_pemohon_pengajuan = $id_pemohon_pengajuan;
        if ($model->load(Yii::$app->request->post())){
            $model->save();
            return $this->redirect(['#peninjauan-lapangan/view','id'=>$model->id]);
        }
        
        return $this->renderAjax('entry-jadwal',[
            'model'=>$model
        ]);
    }
      public function actionEditEntryJadwal($id)
    {
        $model =JadwalPeninjauan::find()->where(['id'=>$id])->one();
        $model->id_pemohon_pengajuan = $model['id_pemohon_pengajuan'];
        if ($model->load(Yii::$app->request->post())){
            $model->save();
            return $this->redirect(['#peninjauan-lapangan/view','id'=>$model->id]);
        }
        
        return $this->renderAjax('entry-jadwal',[
            'model'=>$model
        ]);
    }
    public function actionView($id)
    {
        $model = (new \yii\db\Query())
                ->select('c.id,a.no_ktp,a.nm_pemohon,b.nm_perusahaan,e.id_tim_teknis,e.id as id_jdwl_peninjauan')
                ->from('data_pemohon a')
                ->innerJoin('data_perusahaan b','a.id=b.id_pemohon')
                ->innerJoin('pemohon_pengajuan c','a.id=c.id_data_pemohon')
                 ->innerJoin('jadwal_peninjauan e','c.id=e.id_pemohon_pengajuan')
        ->where([
            'e.id'=>$id
        ])->one();
        
         $query = (new \yii\db\Query())
                ->select('d.nm_jenis_izin,c.tgl_pengajuan,e.tgl_peninjauan,e.ket')
                ->from('data_pemohon a')
                ->innerJoin('data_perusahaan b','a.id=b.id_pemohon')
                ->innerJoin('pemohon_pengajuan c','a.id=c.id_data_pemohon')
                ->innerJoin('ref_jenis_izin d','c.id_jenis_izin = d.id')   
                 ->innerJoin('jadwal_peninjauan e','c.id=e.id_pemohon_pengajuan')
        ->where([
            'e.id'=>$id
        ]);
        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
           
        ]);
         
         $nm_teknisi = \backend\models\RefTimTeknis::find()->where(['id'=>$model['id_tim_teknis']])->one()->nm_teknisi;
         $anggota_teknis = \backend\models\DetailTimTeknis::find()->where(['id_tim_teknis'=>$model['id_tim_teknis']]);
         
        $dataProviderAnggota = new ActiveDataProvider([
            'query'=>$anggota_teknis,
           
        ]);
        return $this->renderAjax('view',[
            'model'=>$model,
            'dataProvider'=>$dataProvider,
            'dataProviderAnggota'=>$dataProviderAnggota,
            'nm_teknisi'=>$nm_teknisi
        ]);
    }
}
