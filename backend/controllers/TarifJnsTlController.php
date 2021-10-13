<?php

namespace backend\controllers;

use Yii;
use backend\models\TarifJnsTl;
use backend\models\TarifJnsTlSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TarifJnsTlController implements the CRUD actions for TarifJnsTl model.
 */
class TarifJnsTlController extends Controller
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
     * Lists all TarifJnsTl models.
     * @return mixed
     */
    public function actionIndex()
    {
        $id_ref_jns_tl = Yii::$app->request->get('id');
        $searchModel = new TarifJnsTlSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['id_ref_jns_tl'=>$id_ref_jns_tl]);
        
        return $this->renderAjax('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TarifJnsTl model.
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
     * Creates a new TarifJnsTl model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
             $id_ref_jns_tl = Yii::$app->request->get('id_jns_tl');
   
        $model = new TarifJnsTl();
$model->id_ref_jns_tl=$id_ref_jns_tl;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['#tarif-jns-tl/view', 'id' => $model->id]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TarifJnsTl model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['#tarif-jns-tl/view', 'id' => $model->id]);
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TarifJnsTl model.
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
     * Finds the TarifJnsTl model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TarifJnsTl the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TarifJnsTl::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionGetDataTarifKawasan()
    {
        $id_ref_jns_tl = Yii::$app->request->post('id_ref_jns_tl');
        
        $array = (new \yii\db\Query())
                ->select('a.id,a.id_lok_jns_tl,b.nm_jns_lok_tl')
                ->from('tarif_jns_tl a')
                ->innerJoin('ref_lok_jns_tl b','a.id_lok_jns_tl=b.id')
                ->where(['a.id_ref_jns_tl'=>$id_ref_jns_tl])
                ->groupBy('a.id_lok_jns_tl')
                ->all();
        $html ="<option value=0>Pilih Kawasan</option>";
        foreach ($array as $value) {
            $id_lok=$value['id_lok_jns_tl'];
            $nm_lok = $value['nm_jns_lok_tl'];
            $html .="<option value=$id_lok>$nm_lok</option>";
        }
       return $html;
    }
}
