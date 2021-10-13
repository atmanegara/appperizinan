<?php

namespace backend\controllers;

use Yii;
use backend\models\DataPemohon;
use backend\models\DataPemohonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\httpclient\Client;
use backend\models\RefAll;
use frontend\models\SignupForm;
use frontend\models\RefTipePemohon;

/**
 * DataPemohonController implements the CRUD actions for DataPemohon model.
 */
class DataPemohonController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
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
     * Lists all DataPemohon models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new DataPemohonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderAjax('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DataPemohon model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $client = new Client();

        //Prov   
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
//Kab
        $responseKab = $client->createRequest()
                ->setMethod('GET')
                ->setUrl('http://api.cyber313.com/wilayah/kabupaten/' . $model->id_prov)
                //   ->setData(['name' => 'John Doe', 'email' => 'johndoe@example.com'])
                ->send();
        if ($responseKab->isOk) {
            $getKab = $responseKab->data['result']['items'];
        }
        $datkab = [];
        foreach ($getKab as $value) {
            $datkab[] = [
                'id' => $value['id'],
                'nama' => $value['nama']
            ];
        }
//Kec
        $responseKec = $client->createRequest()
                ->setMethod('GET')
                ->setUrl('http://api.cyber313.com/wilayah/kecamatan/' . $model->id_kabkot)
                // ->setData(['name' => 'John Doe', 'email' => 'johndoe@example.com'])
                ->send();
        if ($responseKec->isOk) {
            $getKec = $responseKec->data['result']['items'];
        }
        $datkec = [];
        foreach ($getKec as $value) {
            $datkec[] = [
                'id' => $value['id'],
                'nama' => $value['nama']
            ];
        }
//Desa
        $responseDesa = $client->createRequest()
                ->setMethod('GET')
                ->setUrl('http://api.cyber313.com/wilayah/desa/' . $model->id_kec)
                // ->setData(['name' => 'John Doe', 'email' => 'johndoe@example.com'])
                ->send();
        if ($responseDesa->isOk) {
            $getDesa = $responseDesa->data['result']['items'];
        }
        $datdesa = [];
        foreach ($getDesa as $value) {
            $datdesa[] = [
                'id' => $value['id'],
                'nama' => $value['nama']
            ];
        }

        return $this->renderAjax('view', [
                    'model' => $model,
                    'datkab' => $datkab,
                    'datkec' => $datkec,
                    'datdesa' => $datdesa
        ]);
    }

    /**
     * Creates a new DataPemohon model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $hakuser = Yii::$app->user->identity->kode_group_user;

        $model = new DataPemohon();
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

        if ($model->load(Yii::$app->request->post())) {
            $model->save(false);

            if (in_array($hakuser, ['FO', 'BO'])) {
                $modeluser = new SignupForm();
                $id_pemohon = $model->getPrimaryKey();
                $modeluser->username = $model->no_ktp;
                $modeluser->password = $model->no_ktp;
                $modeluser->email = $model->email_pemohon;
                $modeluser->nip = $id_pemohon;
                $kode = RefTipePemohon::findOne($model->id_tipe_pemohon);
                $modeluser->kode_group_user = $kode['kdjenis'];
                  $modeluser->signup();
                     
            }
            return $this->redirect(['#data-pemohon/view', 'id' => $model->id]);
        }

        return $this->renderAjax('create', [
                    'model' => $model,
                    'getProv' => $datprov
        ]);
    }

    /**
     * Updates an existing DataPemohon model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        $client = new Client();
        //Prov   
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
//Kab
        $responseKab = $client->createRequest()
                ->setMethod('GET')
                ->setUrl('http://api.cyber313.com/wilayah/kabupaten/' . $model->id_prov)
                //   ->setData(['name' => 'John Doe', 'email' => 'johndoe@example.com'])
                ->send();
        if ($responseKab->isOk) {
            $getKab = $responseKab->data['result']['items'];
        }
        $datkab = [];
        foreach ($getKab as $value) {
            $datkab[] = [
                'id' => $value['id'],
                'nama' => $value['nama']
            ];
        }
//Kec
        $responseKec = $client->createRequest()
                ->setMethod('GET')
                ->setUrl('http://api.cyber313.com/wilayah/kecamatan/' . $model->id_kabkot)
                // ->setData(['name' => 'John Doe', 'email' => 'johndoe@example.com'])
                ->send();
        if ($responseKec->isOk) {
            $getKec = $responseKec->data['result']['items'];
        }
        $datkec = [];
        foreach ($getKec as $value) {
            $datkec[] = [
                'id' => $value['id'],
                'nama' => $value['nama']
            ];
        }
//Desa
        $responseDesa = $client->createRequest()
                ->setMethod('GET')
                ->setUrl('http://api.cyber313.com/wilayah/desa/' . $model->id_kec)
                // ->setData(['name' => 'John Doe', 'email' => 'johndoe@example.com'])
                ->send();
        if ($responseDesa->isOk) {
            $getDesa = $responseDesa->data['result']['items'];
        }
        $datdesa = [];
        foreach ($getDesa as $value) {
            $datdesa[] = [
                'id' => $value['id'],
                'nama' => $value['nama']
            ];
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['#data-pemohon/view', 'id' => $model->id]);
        }

        return $this->renderAjax('update', [
                    'model' => $model,
                    'getProv' => $datprov,
                    'datkab' => $datkab,
                    'datkec' => $datkec,
                    'datdesa' => $datdesa
        ]);
    }

    /**
     * Deletes an existing DataPemohon model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DataPemohon model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DataPemohon the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = DataPemohon::findOne($id)) !== null) {
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
