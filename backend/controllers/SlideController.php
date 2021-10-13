<?php

namespace backend\controllers;

use Yii;


use yii\filters\VerbFilter;
use backend\models\UploadForm;
use yii\web\UploadedFile;
use backend\models\File;
use yii\data\ActiveDataProvider;



class SlideController extends \yii\web\Controller
{

	/**
     * @inheritdoc
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

	public $alert = array();

    public function actionIndex()
    {
        $model = new UploadForm();

        $this->alert = array(
            'display' => 'none',
            'icon' => 'fa-ban',
            'type' => 'error',
            'messages' => 'Check File Upload'
        );

        if (Yii::$app->request->isPost)
        {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->id_post = UploadedFile::getInstance($model, 'file');
            $model->id_file_jenis = UploadedFile::getInstance($model, 'file');
            $model->title = UploadedFile::getInstance($model, 'file');
            $model->description = UploadedFile::getInstance($model, 'file');
            $model->position = UploadedFile::getInstance($model, 'file');
            
            $upload = $model->upload();
            
            if ($upload['success'] == true) 
            {
                $this->alert['display'] = 'block';
                $this->alert['type'] = 'success';
                $this->alert['messages'] = $upload['messages'];
            }
            else
            {
                $this->alert['display'] = 'block';
                $this->alert['messages'] = $upload['messages'];
            }

        }
        else
        {
            $this->alert['display'] = 'none';
        }


        $dataProvider = new ActiveDataProvider([
            'query' => File::find()->where(['id_file_jenis' => 5]), // 5 => Slides
        ]);

        return $this->renderAjax('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'alert' => $this->alert
        ]);
        
    }
        public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
  protected function findModel($id)
    {
        if (($model = File::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
