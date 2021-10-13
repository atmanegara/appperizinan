<?php

namespace backend\controllers;

use Yii;
use backend\models\BeritaAcara;
use backend\models\BeritaAcaraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BeritaAcaraController implements the CRUD actions for BeritaAcara model.
 */
class BeritaAcaraController extends Controller
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
     * Lists all BeritaAcara models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BeritaAcaraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderAjax('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BeritaAcara model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BeritaAcara model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BeritaAcara();

        if ($model->load(Yii::$app->request->post()) ) {
            $image_file = \yii\web\UploadedFile::getInstance($model, 'imageFile');
            $model->file_berita =$image_file->baseName.'.'.$image_file->extension;
            $image_file->saveAs('./uploads/'.$model->file_berita);
            $model->save(false);
            return $this->redirect(['#berita-acara/view', 'id' => $model->id]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BeritaAcara model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ){ 
            $image_file = \yii\web\UploadedFile::getInstance($model, 'imageFile');
            $model->file_berita =$image_file->baseName.'.'.$image_file->extension;
            $image_file->saveAs('./uploads/'.$model->file_berita);
            $model->save();
            return $this->redirect(['#berita-acara/view', 'id' => $model->id]);
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BeritaAcara model.
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
     * Finds the BeritaAcara model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BeritaAcara the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BeritaAcara::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //Verifikasi berkas BAP
       public function actionIndexVerifikasi()
    {
        $searchModel = new BeritaAcaraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderAjax('index-verifikasi', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionVerifikasi($id)
    {
          return $this->renderAjax('verifikasi', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionSubmitVerifikasi()
    {
        $id_pemohon_pengajuan = Yii::$app->request->post('id_pemohon_pengajuan');
        $status_verifikasi = Yii::$app->request->post('status_verifikasi');
        $id_berita_acara = Yii::$app->request->post('id_berita_acara');
        $catatan = Yii::$app->request->post('catatan');
        
        $exitst = \backend\models\VerifikasiBapTim::find()->where(['id_pemohon_pengajuan'=>$id_pemohon_pengajuan])->exists();
        if($exitst>0){
               $model = \backend\models\VerifikasiBapTim::find()->where(['id_pemohon_pengajuan'=>$id_pemohon_pengajuan])->one();
        $model->id_pemohon_pengajuan= $id_pemohon_pengajuan;
        $model->id_berita_acara= $id_berita_acara;
        $model->status_verifikasi = $status_verifikasi;
        $model->catatan = $catatan;
        }else{
        $model = new \backend\models\VerifikasiBapTim();
        $model->id_pemohon_pengajuan= $id_pemohon_pengajuan;
        $model->id_berita_acara= $id_berita_acara;
        $model->status_verifikasi = $status_verifikasi;
        $model->catatan = $catatan;
        }
        if($model->save()){
            $modelPengajuan = \backend\models\PemohonPengajuan::findOne($id_pemohon_pengajuan);
            $modelPengajuan->status_verifikasi = $status_verifikasi;
            $modelPengajuan->tgl_verifikasi = date('Y-m-d H:i:s');
            $modelPengajuan->catatan_verifikasi = $catatan;
            $modelPengajuan->save(false);
            $msg=[
                'code'=>'200',
                'msg'=>'Berhasil di submit'
            ];
        }else{
            $msg = [
                'code'=>'400',
                'msg'=>'Gagal Submit'
            ];
        }
       
        return \yii\helpers\Json::encode($msg);
    }
}
