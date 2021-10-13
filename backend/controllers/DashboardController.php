<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\PemohonPengajuan;
/**
 * Description of DashboardController
 *
 * @author User
 */
class DashboardController extends Controller {
    //put your code here

    
    public function actionIndex(){
        
        $detail = Yii::$app->request->get('detail');
        $id_data_pemohon = Yii::$app->user->identity->nip;
        $model = (new \yii\db\Query())
                ->select('a.no_registrasi,a.id_data_pemohon,a.id_data_perusahaan,a.id_jenis_izin,b.nm_jenis_izin,a.id_jenis_permohonan,c.nm_jenis_permohonan,'
                        . 'a.tgl_pengajuan,a.tgl_verifikasi_pengajuan,a.tgl_verifikasi,a.tgl_selesai')
                ->from('pemohon_pengajuan a')
                ->innerJoin('ref_jenis_izin b','a.id_jenis_izin=b.id')
                ->innerJoin('ref_jenis_permohonan c','a.id_jenis_permohonan=c.id')
                ->where(['a.id_data_pemohon'=>$id_data_pemohon]);
                //Pengajuan berkas = 0
        
                switch ($detail){
                    case 'baru';
                        $query = $model->andWhere(['status_pengajuan'=>'0']);
                        break;
                    case 'verifikasi':
                        $query = $model->andWhere(['status_verifikasi'=>'1']);
                        break;
                    case 'selesai':
                        $query = $model->andWhere(['status_selesai'=>'1']);
                        break;
                                       case 'tolak':
                        $query = $model->andWhere(['or',['status_pengajuan'=>'2'],['status_verifikasi'=>'2'],['status_selesai'=>'2']]);
                        break;
                }
        
                $dataProvider = new \yii\data\ActiveDataProvider([
                    'query'=>$query,
                    
                ]);
                return $this->renderAjax('index',[
                    'dataProvider'=>$dataProvider
                ]);
        
    }
    
}

