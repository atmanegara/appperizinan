<?php

namespace backend\controllers;

use Yii;
use backend\models\DetailJenisIzin;
use backend\models\DetailJenisIzinSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetailJenisIzinController implements the CRUD actions for DetailJenisIzin model.
 */
class DetailJenisIzinController extends Controller
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
     * Lists all DetailJenisIzin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetailJenisIzinSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderAjax('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DetailJenisIzin model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
    $query = DetailJenisIzin::find()
                ->alias('a')
                ->select('a.id,a.id_jenis_izin,a.id_jenis_permohonan,a.no_urut,a.nm_dok,b.nm_jenis_izin,c.nm_jenis_permohonan')
                ->innerJoin('ref_jenis_izin b','b.id=a.id_jenis_izin')
                ->innerJoin('ref_jenis_permohonan c','c.id=a.id_jenis_permohonan')
            ->where(['a.id'=>$id])->one();

        return $this->renderAjax('view', [
            'model' => $query,
        ]);
    }

    /**
     * Creates a new DetailJenisIzin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DetailJenisIzin();

        if ($model->load(Yii::$app->request->post())) {
             $model->save();
            return $this->redirect(['#detail-jenis-izin/view', 'id' => $model->id]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DetailJenisIzin model.
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
     * Deletes an existing DetailJenisIzin model.
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
     * Finds the DetailJenisIzin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DetailJenisIzin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DetailJenisIzin::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
