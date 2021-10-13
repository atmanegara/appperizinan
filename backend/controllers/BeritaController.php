<?php

namespace backend\controllers;

use Yii;
use backend\models\Berita;
use backend\models\File;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\UploadForm;
use yii\data\Pagination;

/**
 * BeritaController implements the CRUD actions for Berita model.
 */
class BeritaController extends Controller
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

    /**
     * Lists all Berita models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Berita::find(),
        ]);

        return $this->renderAjax('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Berita models.
     * @return mixed
     */
    public function actionPreview()
    {
        $query = Berita::find()->where([]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $berita = $query->offset($pages->offset)
            ->limit(5)
            ->all();

        $pages->setPageSize(5);

        return $this->renderAjax('preview', [
            'berita' => $berita,
            'pages' => $pages,
        ]);
    }


    /**
     * Displays a single Berita model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Berita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Berita();

        if ($model->load(Yii::$app->request->post())) {
            $model->description= Berita::getDescription($model->content);
            $slug = self :: slugify($model->slug);
            $id_user = Yii::$app->user->identity->id;
            

            $model->slug = $slug;
            $model->id_user = $id_user;
            $model->date = date('Y-m-d');
            if ($model->save(false))
            {
                return $this->redirect(['#berita/view', 'id' => $model->id]);
            }

        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Berita model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $id_user = Yii::$app->user->identity->id;
            $model->id_user = $id_user;

            if ($model->save(false))
            {
                return $this->redirect(['#berita/view', 'id' => $model->id]);
            }

        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Berita model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['#berita/index']);
    }

    /**
     * Finds the Berita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Berita the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Berita::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function slugify($text)
    {
      // replace non letter or digits by -
      $text = preg_replace('~[^\pL\d]+~u', '-', $text);

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      // trim
      $text = trim($text, '_');

      // remove duplicate -
      $text = preg_replace('~-+~', '-', $text);

      // lowercase
      $text = strtolower($text);

      if (empty($text)) {
        return 'n-a';
      }

      return $text;
    }

    public $alert = array();

    public function actionUpload()
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

  //      $nip = Yii::$app->user->identity->nip;
        $idpost = Yii::$app->request->get('idpost');

        if($idpost == null)
        {
            return $this->renderAjax('error',[
                'name'=>'Error',
                'message'=>'Database tidak ada',
                'model'=>$model
            ]);
        }
        else
        {
            $dataProvider = new ActiveDataProvider([
                'query' => File::find()->where(['id_post' => $idpost]),
            ]);

            return $this->renderAjax('upload', [
                'model' => $model,
                'dataProvider' => $dataProvider,
                'alert' => $this->alert
            ]);
        }
    }
    
}
