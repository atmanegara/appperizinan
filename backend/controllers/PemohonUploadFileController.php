<?php

namespace backend\controllers;

use Yii;
use backend\models\PemohonUploadFile;
use backend\models\PemohonUploadFileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Json;

/**
 * PemohonUploadFileController implements the CRUD actions for PemohonUploadFile model.
 */
class PemohonUploadFileController extends Controller {

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
     * Lists all PemohonUploadFile models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PemohonUploadFileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderAjax('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PemohonUploadFile model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->renderAjax('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PemohonUploadFile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $no_registrasi = Yii::$app->request->get('no_registrasi');
        $pemohonPengajuan = (new \yii\db\Query())
                        ->select('f.nmjenis,a.no_ktp,a.no_npwp,a.nm_pemohon,e.no_registrasi,e.id_jenis_izin,b.nm_jenis_izin,c.nm_jenis_permohonan,e.id_data_pemohon,d.id as id_data_perusahaan')
                        ->from('data_pemohon a')
                        ->leftJoin('pemohon_pengajuan e', 'e.id_data_pemohon=a.id')
                        ->leftJoin('ref_jenis_izin b', 'e.id_jenis_izin=b.id')
                        ->leftJoin('ref_jenis_permohonan c', 'e.id_jenis_permohonan=c.id')
                        ->leftJoin('data_perusahaan d', 'd.id_pemohon=e.id_data_pemohon')
                 ->leftJoin('ref_tipe_pemohon f','f.id=a.id_tipe_pemohon')
                        ->where(['e.no_registrasi' => $no_registrasi])->one();

        $query = (new \yii\db\Query())
                        ->select('a.no_registrasi,a.id_jenis_izin,a.id_jenis_permohonan')
                        ->from('pemohon_pengajuan a')
                        ->where([
                            'a.no_registrasi' => $no_registrasi
                        ])->one();
        $id_jenis_izin = $query['id_jenis_izin'];
        $id_jenis_permohonan = $query['id_jenis_permohonan'];

        $model = new PemohonUploadFile();

        $query = \backend\models\DetailJenisIzin::find()
                ->where([
            'id_jenis_izin' => $id_jenis_izin,
            'id_jenis_permohonan' => $id_jenis_permohonan
        ]);
        $dataProviderJenisPermohonan = new \yii\data\ActiveDataProvider([
            'query' => $query
        ]);
        $model->tahun = date('Y');
        $model->no_registrasi = $no_registrasi;
        $model->id_jenis_izin = $id_jenis_izin;
        $model->id_jenis_permohonan = $id_jenis_permohonan;
        if ($model->load(Yii::$app->request->post())) {

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->renderAjax('create', [
                    'model' => $model,
                    'dataProviderJenisPermohonan' => $dataProviderJenisPermohonan,
                    'no_registrasi' => $no_registrasi,
                    'model' => $pemohonPengajuan
        ]);
    }

    /*
     * Upload berkas syarat
     */

    public function actionFileUpload() {
        if (Yii::$app->request->get()) {
            $filedok = Yii::$app->request->get('name');
            $id = Yii::$app->request->get('id');
            $no_registrasi = Yii::$app->request->get('no_registrasi');
            $query = (new \yii\db\Query())
                            ->select('a.no_registrasi,a.id_jenis_izin,a.id_jenis_permohonan')
                            ->from('pemohon_pengajuan a')
                            ->where([
                                'a.no_registrasi' => $no_registrasi
                            ])->one();
            $id_jenis_izin = $query['id_jenis_izin'];
            $id_jenis_permohonan = $query['id_jenis_permohonan'];

            $model = new PemohonUploadFile();
            $model->id_detail_jenis_izin = $id;
            $model->no_registrasi = $no_registrasi;
            $model->id_jenis_izin = $id_jenis_izin;
            $model->id_jenis_permohonan = $id_jenis_permohonan;

            $model->filedoc = UploadedFile::getInstanceByName($filedok);
            $filename = $model->filedoc->baseName . '.' . $model->filedoc->extension;
            $model->data_file_upload = $filename;
            if ($model->filedoc->saveAs('./uploads/' . $filename)) {
                $model->save();
            }

            return Json::encode(['msg' => 'Sukses']);
        }
    }

    /*
     * Re Upload berkas Syarat
     */

    public function actionFileReupload() {
        if (Yii::$app->request->get()) {
            $filedok = Yii::$app->request->get('name');
            $id = Yii::$app->request->get('id');
            $no_registrasi = Yii::$app->request->get('no_registrasi');
            $query = (new \yii\db\Query())
                            ->select('a.no_registrasi,a.id_jenis_izin,a.id_jenis_permohonan')
                            ->from('pemohon_pengajuan a')
                            ->where([
                                'a.no_registrasi' => $no_registrasi
                            ])->one();
            $id_jenis_izin = $query['id_jenis_izin'];
            $id_jenis_permohonan = $query['id_jenis_permohonan'];

            $model = PemohonUploadFile::findOne($id);
            //Berkas Lama
            $berkaslama = $model->data_file_upload;
            $model->no_registrasi = $no_registrasi;
            $model->status_berkas = 0;
            $model->id_jenis_izin = $id_jenis_izin;
            $model->id_jenis_permohonan = $id_jenis_permohonan;

            $model->filedoc = UploadedFile::getInstanceByName($filedok);
            $filename = $model->filedoc->baseName . '.' . $model->filedoc->extension;
            $model->data_file_upload = $filename;
            if (unlink('./uploads/' . $berkaslama)) {

                if ($model->filedoc->saveAs('./uploads/' . $filename)) {
                    $model->save();
                }
            }

            return Json::encode(['msg' => 'Sukses']);
        }
    }

//Simpan pernytaan
    public function actionSimpanPernyataan() {
        $pilih = Yii::$app->request->post('pilih');
        $no_registrasi = Yii::$app->request->post('no_registrasi');

        $sql = "insert into persetujuan_permohonan(no_registrasi,pilih)values(:no_registrasi,:pilih)";
        $params = [
            ':no_registrasi' => $no_registrasi,
            ':pilih' => $pilih
        ];
        Yii::$app->db->createCommand($sql, $params)->execute();
        return Json::encode([
                    'growlSettings' => [
                        'placement' => [
                            'from' => 'top',
                            'align' => 'right'
                        ],
                        'type' => 'success'
                    ],
                    'growlOptions' => [
                        'title' => '<h3>Sukses</h3>',
                        'icon' => 'glyphicon glyphicon-ok-sign',
                        'showSeparator' => true,
                        'message' => "<p>OK</p>",
                    ]
        ]);
    }

    //permohonan berhasil
    public function actionPermohonanBerhasil() {
        return $this->renderAjax('permohonan-berhasil');
    }

    /**
     * Updates an existing PemohonUploadFile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->renderAjax('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PemohonUploadFile model.
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
     * Finds the PemohonUploadFile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PemohonUploadFile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = PemohonUploadFile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //
    public function actionSyaratDok() {
        $id_jenis_izin = Yii::$app->request->post('id_jenis_izin');
        $id_jenis_permohonan = Yii::$app->request->post('id_jenis_permohonan');
        $query = \backend\models\DetailJenisIzin::find()
                ->where([
            'id_jenis_izin' => $id_jenis_izin,
            'id_jenis_permohonan' => $id_jenis_permohonan
        ]);
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query
        ]);
        return $this->renderPartial('tabel-syarat-dok', [
                    'dataProvider' => $dataProvider
        ]);
    }

}
