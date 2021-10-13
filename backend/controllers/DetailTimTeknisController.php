<?php

namespace backend\controllers;

use Yii;
use backend\models\DetailTimTeknis;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\RefTimTeknis;
/**
 * DetailTimTeknisController implements the CRUD actions for DetailTimTeknis model.
 */
class DetailTimTeknisController extends Controller
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
     * Lists all DetailTimTeknis models.
     * @return mixed
     */
    public function actionIndex()
    {
        $id_tim_teknis = Yii::$app->request->get('id');
        $tim_teknis = RefTimTeknis::find()->where(['id'=>$id_tim_teknis])->one()->nm_teknisi;
        $dataProvider = new ActiveDataProvider([
            'query' => DetailTimTeknis::find()->where(['id_tim_teknis'=>$id_tim_teknis]),
        ]);
        return $this->renderAjax('index', [
            'dataProvider' => $dataProvider,
            'tim_teknis'=>$tim_teknis,
            'id_tim_teknis'=>$id_tim_teknis
        ]);
    }

    /**
     * Displays a single DetailTimTeknis model.
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
     * Creates a new DetailTimTeknis model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_tim_teknis)
    {
        $model = new DetailTimTeknis();
        $model->id_tim_teknis=$id_tim_teknis;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['#detail-tim-teknis/view', 'id' => $model->id]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DetailTimTeknis model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['#detail-tim-teknis/view', 'id' => $model->id]);
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DetailTimTeknis model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id,$id_tim_teknis)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['#detail-tim-teknis/index','id'=>$id_tim_teknis]);
    }

    /**
     * Finds the DetailTimTeknis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DetailTimTeknis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DetailTimTeknis::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
