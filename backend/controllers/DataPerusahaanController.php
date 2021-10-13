<?php

namespace backend\controllers;

use Yii;
use backend\models\DataPerusahaan;
use backend\models\DataPerusahaanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\httpclient\Client;
use backend\models\RefAll;

/**
 * DataPerusahaanController implements the CRUD actions for DataPerusahaan model.
 */
class DataPerusahaanController extends Controller
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
     * Lists all DataPerusahaan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $id_pemohon = Yii::$app->request->get('id_pemohon');
        

        $searchModel = new DataPerusahaanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if($id_pemohon){
        $dataProvider->query->where(['id_pemohon'=>$id_pemohon]);
        }
        return $this->renderAjax('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DataPerusahaan model.
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
     * Creates a new DataPerusahaan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $id_pemohon = Yii::$app->user->identity->nip;
        if (Yii::$app->request->get()){
            $id_pemohon = Yii::$app->request->get('id');
        }
                $client = new Client();
        $response = $client->createRequest()
                ->setMethod('GET')
                ->setUrl('http://api.cyber313.com/wilayah/provinsi')
                //   ->setData(['name' => 'John Doe', 'email' => 'johndoe@example.com'])
                ->send();
        if ($response->isOk) {
            $getProv = $response->data['result']['items'];
        }
        $datprov = [];
        foreach ($getProv as $value) {
            $datprov[] = [
                'id' => $value['id'],
                'nama' => $value['nama']
            ];
        }
        
        $model = new DataPerusahaan();
        $model->id_pemohon = $id_pemohon;
        $modelLegalitasPerusahaan = new \backend\models\LegalitasPerusahaan();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['#data-perusahaan/view', 'id' => $model->id]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
            'datprov'=>$datprov,
            'modelLegalitasPerusahaan'=>$modelLegalitasPerusahaan
        ]);
    }

    /**
     * Updates an existing DataPerusahaan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DataPerusahaan model.
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
     * Finds the DataPerusahaan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DataPerusahaan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DataPerusahaan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    
        public function actionGetDataWilayah() {
        $wilayah = Yii::$app->request->post('wilayah');
        $id_parent = Yii::$app->request->post('id_parent');

        $dataWilayah = RefAll::getDataWilayah($wilayah, $id_parent);
        return $dataWilayah;
    }
}
