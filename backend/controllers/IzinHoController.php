<?php

namespace backend\controllers;

use Yii;
use backend\models\IzinHo;
use backend\models\IzinHoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IzinHoController implements the CRUD actions for IzinHo model.
 */
class IzinHoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all IzinHo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IzinHoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderAjax('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IzinHo model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = (new \yii\db\Query())
                        ->select('a.*,aa.nm_pemohon,c.nm_jns_tl,d.nm_jns_lok_tl,e.nm_jns_index,f.ket')
                        ->from('izin_ho a')
                        ->innerJoin('data_pemohon aa', 'a.id_data_pemohon=aa.id')
                        ->innerJoin('pemohon_pengajuan b', 'a.no_registrasi=b.no_registrasi')
                        ->innerJoin('ref_jns_tl c', 'a.jns_tl = c.id')
                        ->innerJoin('ref_lok_jns_tl d', 'a.kawasan=d.id')
                        ->innerJoin('ref_indeks_lok e', 'a.jns_jalan=e.id')
                        ->innerJoin('ref_nilai_skala f', 'a.id_ref_nilai_skala=f.id')->where(['a.id' => $id])->one();
        return $this->renderAjax('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new IzinHo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IzinHo();
        if ($model->load(Yii::$app->request->post())){
                 $dataPemononPengajuan = \backend\models\PemohonPengajuan::findOne(['no_registrasi'=>$model->no_registrasi]);
        $model->id_data_pemohon = $dataPemononPengajuan['id_data_pemohon'];
   
                $model->save(); 
            return $this->redirect(['#izin-ho/view', 'id' => $model->id]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing IzinHo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['#izin-ho/view', 'id' => $model->id]);
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing IzinHo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['#izin-ho/index']);
    }

    /**
     * Finds the IzinHo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IzinHo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IzinHo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionHitungTarif()
    {
      $id_ref_jns_tl = Yii::$app->request->post('id_ref_jns_tl');
    $id_ref_lok_tl =Yii::$app->request->post('id_ref_lok_tl');
    $jns_jalan = Yii::$app->request->post('jns_jalan');
    $luas_tinggi = Yii::$app->request->post('luas_tinggi');
    $nilai_investasi = Yii::$app->request->post('nilai_investasi');
    $id_ref_nilai_skala = Yii::$app->request->post('id_ref_nilai_skala');
    
    //
    $sqltl = " SELECT `a`.*, `b`.`nm_jns_lok_tl` FROM `tarif_jns_tl` `a` 
 INNER JOIN `ref_lok_jns_tl` `b` ON a.id_lok_jns_tl=b.id WHERE `a`.`id_ref_jns_tl`='1' AND a.id_lok_jns_tl=1
 AND $luas_tinggi BETWEEN a.awal_luas_t AND a.akhir_luas_t";
    $querytl = Yii::$app->db->createCommand($sqltl)->queryOne();
    
    $queryil = \backend\models\RefIndeksLok::findOne($jns_jalan);
    $sqlskala = "select * from ref_nilai_skala where id=$id_ref_nilai_skala and $nilai_investasi between skala_1 and skala_2";
    
    $queryskala = Yii::$app->db->createCommand($sqlskala)->queryOne();
    if($id_ref_jns_tl==1){
        
        
        
        //Rumus Tempat Usaha : (TL * IL * LRTU)+Nilai Skala
        $tl = $querytl['tarif'];
        $il = $queryil['nilai_index'];
        $lrtu = $luas_tinggi;
        $nilai_skala = $queryskala['tarif'];
        
        $retribusi = ($tl*$il*$lrtu)+$nilai_skala;
    }
    return $retribusi;
    }
}
