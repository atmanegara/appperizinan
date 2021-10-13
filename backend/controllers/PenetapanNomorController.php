<?php

namespace backend\controllers;

use Yii;
use backend\models\PenetapanNomor;
use backend\models\PenetapanNomorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PenetapanNomorController implements the CRUD actions for PenetapanNomor model.
 */
class PenetapanNomorController extends Controller
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

    public function actionIndexOld()
    {
        $model = (new \yii\db\Query())
                ->select('a.id,a.no_registrasi,a.id_data_pemohon,a.id_jenis_izin,a.id_jenis_permohonan,
b.no_ktp,b.nm_pemohon,c.nm_jenis_izin,d.nm_jenis_permohonan,e.nm_perusahaan,e.alamat,
a.status_pengajuan,a.status_verifikasi,a.status_selesai')
                ->from('pemohon_pengajuan a')
                ->innerJoin('data_pemohon b','a.id_data_pemohon=b.id')
                ->leftJoin('data_perusahaan e','e.id_pemohon=a.id_data_pemohon')
                ->innerJoin('ref_jenis_izin c','a.id_jenis_izin=c.id')
                ->innerJoin('ref_jenis_permohonan d','a.id_jenis_permohonan=d.id')->groupBy('a.no_registrasi');
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query'=>$model
        ]);
        
        return $this->renderAjax('index',[
            'dataProvider'=>$dataProvider
        ]);
    }
    /**
     * Lists all PenetapanNomor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PenetapanNomorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderAjax('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PenetapanNomor model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model=$this->findModel($id);
        $id_pemohon_pengajuan = $model['id_pemohon_pengajuan'];
        $pemohonPengajuan = \backend\models\PemohonPengajuan::find()->where(['id'=>$id_pemohon_pengajuan])->one();
        $modelDataPemohon = \backend\models\DataPemohon::find()->where(['id'=>$pemohonPengajuan['id_data_pemohon']])->one();
        $modelDataPerusahaan = \backend\models\DataPerusahaan::find()->where(['id'=>$pemohonPengajuan['id_data_perusahaan']]);
        if($modelDataPerusahaan->exists()>0){
               $modelDataPerusahaan = \backend\models\DataPerusahaan::find()->where(['id'=>$pemohonPengajuan['id_data_perusahaan']])->one();
     
        }
        $modelPemohonPengajuan = \backend\models\PemohonPengajuan::find()->where(['id'=>$id_pemohon_pengajuan])->one();
        return $this->renderAjax('view', [
            'model' => $model ,
            'modelDataPemohon'=>$modelDataPemohon,
            'modelDataPerusahaan'=>$modelDataPerusahaan,
            'modelPemohonPengajuan'=>$modelPemohonPengajuan
        ]);
    }

    /**
     * Creates a new PenetapanNomor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PenetapanNomor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['#penetapan-nomor/view', 'id' => $model->id]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PenetapanNomor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['#penetapan-nomor/view', 'id' => $model->id]);
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PenetapanNomor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PenetapanNomor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PenetapanNomor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PenetapanNomor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    ///Detail pemohon
    
    public function actionDetailPemohon(){
        $id_pemohon_pengajuan = Yii::$app->request->post('id_pemohon_pengajuan');
        
        $model = \backend\models\PemohonPengajuan::getDataDetailPemohonOne($id_pemohon_pengajuan);
        $modelBeritaAcara = \backend\models\BeritaAcara::find()->where(['id_pemohon_pengajuan'=>$id_pemohon_pengajuan])->one();
        return $this->renderPartial('detail-pemohon',[
            'model'=>$model,
            'modelBeritaAcara'=>$modelBeritaAcara
        ]);
    }
}
