<?php

namespace backend\controllers;
use Yii;

class LaporanController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->renderAjax('index');
    }
    
    public function actionFormBulanan()
    {
      
        
        return $this->renderPartial('form-bulanan');
    }
     public function actionFormTahunan()
    {
      
        
        return $this->renderPartial('form-tahunan');
    }
    //Lap.Rekap Perizinan
    public function actionCariBulanan()
    {
        $bulan = Yii::$app->request->post('bulan');
        $tahun = date('Y');
        
        $sql = "call sp_lap_rekap_bulanan(:bulan,:tahun)";
        $params=[
            ':bulan'=>$bulan,
            ':tahun'=>$tahun
        ];
        
        $query = Yii::$app->db->createCommand($sql, $params)->queryAll();
  //      $dataChart[] =[];
        
        foreach ($query as $value) {
            $dataChart[]=[
                'label'=>$value['nm_jenis_izin'],
                'data'=>$value['jml_pengajuan']
            ];
        }
        $dataJson = \yii\helpers\Json::encode($dataChart);
        return $this->renderAjax('cari-bulanan',[
            'tahun'=>$tahun,
            'bulan'=>$bulan,
            'dataJson'=>$dataJson,
            'query'=>$query
        ]);
    }
       public function actionCariTahunan()
    {
        $tahun = Yii::$app->request->post('tahun');
   //     $tahun = date('Y');
        
        $sql = "call sp_lap_rekap_tahunan(:tahun)";
        $params=[
             ':tahun'=>$tahun
        ];
        
        $query = Yii::$app->db->createCommand($sql, $params)->queryAll();
  //      $dataChart[] =[];
        
        foreach ($query as $value) {
            $dataChart[]=[
                'label'=>$value['nm_jenis_izin'],
                'data'=>$value['jml_pengajuan']
            ];
        }
        $dataJson = \yii\helpers\Json::encode($dataChart);
        return $this->renderAjax('cari-tahunan',[
            'tahun'=>$tahun,
            'dataJson'=>$dataJson,
            'query'=>$query
        ]);
    }
    
     //Lap. Pemohon Perizinan
    public function actionPemohon()
    {
        return $this->renderAjax('pemohon');
    }
    
    public function actionCariDataPerizinan()
    {
        $key_izin = Yii::$app->request->post('key');
        
        $query = (new \yii\db\Query())
                ->select('a.*,c.nm_jenis_izin,e.nm_jenis_permohonan,b.nm_pemohon,b.alamat_pemohon,d.nm_perusahaan,d.alamat')
                ->from('pemohon_pengajuan a')
                ->leftJoin('data_pemohon b', 'a.id_data_pemohon=b.id')
                ->leftJoin('ref_jenis_izin c','a.id_jenis_izin=c.id')
                ->leftJoin('data_perusahaan d','a.id_data_perusahaan=d.id')
                ->leftJoin('ref_jenis_permohonan e','a.id_jenis_permohonan=e.id')
                ->where("!isnull(a.id_data_pemohon)")
                ->andWhere(['IN','c.id',$key_izin])->orderBy('c.id')->all();
        //tanda tangan
        $ttd = \backend\models\RefTtd::findOne(['kode_rpt'=>'LAP-01']);
       return $this->renderAjax('data-perizinan',[
           'query'=>$query,
           'ttd'=>$ttd
       ]); 
    }
}
