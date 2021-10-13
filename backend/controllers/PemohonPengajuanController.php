<?php

namespace backend\controllers;

use Yii;
use backend\models\PemohonPengajuan;
use backend\models\PemohonPengajuanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PemohonPengajuanController implements the CRUD actions for PemohonPengajuan model.
 */
class PemohonPengajuanController extends Controller {

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
     * Lists all PemohonPengajuan models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PemohonPengajuanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderAjax('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PemohonPengajuan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
         $pemohonPengajuan =(new \yii\db\Query())
                ->select('f.nmjenis,a.no_ktp,a.no_npwp,a.nm_pemohon,e.no_registrasi,e.id_jenis_izin,b.nm_jenis_izin,c.nm_jenis_permohonan,e.id_data_pemohon,d.id as id_data_perusahaan')
                  ->from('data_pemohon a')
                  ->leftJoin('pemohon_pengajuan e','e.id_data_pemohon=a.id')
                ->leftJoin('ref_jenis_izin b','e.id_jenis_izin=b.id')
                ->leftJoin('ref_jenis_permohonan c','e.id_jenis_permohonan=c.id')
                ->leftJoin('data_perusahaan d','d.id_pemohon=e.id_data_pemohon')
                 ->leftJoin('ref_tipe_pemohon f','f.id=a.id_tipe_pemohon')
                ->where(['e.id'=>$id])->one();
    
          $dok = (new \yii\db\Query())
                  ->select('a.no_urut,a.nm_dok')
                  ->from('detail_jenis_izin a')
                  ->where(['a.id_jenis_izin'=>$pemohonPengajuan['id_jenis_izin']]);
                $dataProvider = new \yii\data\ActiveDataProvider([
              'query'=>$dok
          ]);
        return $this->renderAjax('view', [
                    'model' =>$pemohonPengajuan,
            'dataProvider'=>$dataProvider
        ]);
    }

    /**
     * Creates a new PemohonPengajuan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $hak_user = \Yii::$app->user->identity->kode_group_user;

        $id_user = Yii::$app->user->identity->id;
        $model = new PemohonPengajuan();
        $model->id_status_daftar = 2;

        if (in_array($hak_user, ['PORG', 'BDNUS'])) {
            $id_data_pemohon = Yii::$app->user->identity->nip;
            $model->id_data_pemohon = $id_data_pemohon;
            $model->id_status_daftar = 1;
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->tgl_pengajuan = date('ymdhms');
            $model->no_registrasi = rand(9, date('ymdhms'));
            $model->id_user = $id_user;
            $model->save(false);
         //   return $this->redirect(['#pemohon-pengajuan/index']);
          return $this->redirect(['#pemohon-pengajuan/view', 'id' => $model->id]);
        }

        return $this->renderAjax('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing PemohonPengajuan model.
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

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PemohonPengajuan model.
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
     * Finds the PemohonPengajuan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PemohonPengajuan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = PemohonPengajuan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    ///--- Custom ----///
    
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

    //Detail pemhono
    public function actionDetailPemohon() {
        $id_data_pemohon = Yii::$app->request->post('id_data_pemohon');

        $query = (new \yii\db\Query())
                        ->select('a.no_ktp,b.no_npwp,b.nm_perusahaan,b.alamat')
                        ->from('data_pemohon a')
                        ->innerJoin('data_perusahaan b', 'a.id=b.id_pemohon')
                        ->where(['a.id' => $id_data_pemohon])->one();

        return $this->renderPartial('detail-pemohon', [
                    'model' => $query
        ]);
    }
    
    public function actionCekBerkas()
    {
        $no_registrasi = Yii::$app->request->get('no_registrasi');
        
        $pemohonPengajuan =(new \yii\db\Query())
                ->select('e.id,e.no_npwp,e.nm_pemohon,e.no_ktp,b.nm_jenis_izin,c.nm_jenis_permohonan,a.id_data_pemohon,d.id as id_data_perusahaan')
                ->from('pemohon_pengajuan a')
                ->innerJoin('data_pemohon e','a.id_data_pemohon=e.id')
                ->innerJoin('ref_jenis_izin b','a.id_jenis_izin=b.id')
                ->innerJoin('ref_jenis_permohonan c','a.id_jenis_permohonan=c.id')
                ->innerJoin('data_perusahaan d','d.id_pemohon=a.id_data_pemohon')
                ->where(['a.no_registrasi'=>$no_registrasi])->one();
     //   $dataPemohon = \backend\models\DataPemohon::find()->where(['id'=>$pemohonPengajuan['id_data_pemohon']])->one();
        $file_berkas = \backend\models\PemohonUploadFile::find()->where(['no_registrasi'=>$no_registrasi]);
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query'=>$file_berkas,
        ]);
        return $this->renderAjax('cek-berkas',[
            'pemohonPengajuan'=>$pemohonPengajuan,
        //        'dataPemohon'=>$dataPemohon,
            'dataProvider'=>$dataProvider
        ]);
    }
    
    public function actionTampilDok($id){
          $file_berkas = \backend\models\PemohonUploadFile::find()->where(['id'=>$id])->one();
        return $this->renderAjax('tampil-dok',[
            'file_berkas'=>$file_berkas
        ]);
    }
    
    public function actionDiterima()
    {
        $no_registrasi = Yii::$app->request->post('no_registrasi');
        $status_pengajuan = 1;
        $tgl_verifikasi_pengajuan = date('ymdHms'); //ymdhms
        
        $model = PemohonPengajuan::find()
                ->where(['no_registrasi'=>$no_registrasi])->one();
        
        $model->status_pengajuan=1;
        $model->tgl_verifikasi_pengajuan=$tgl_verifikasi_pengajuan;
        $model->save(false);
        return \yii\helpers\Json::encode([
            'msg'=>"Sukses"
        ]);
    }
 public function actionDitolak()
    {
     $keys = Yii::$app->request->post('keys');
        $no_registrasi = Yii::$app->request->post('no_registrasi');
        $ket = Yii::$app->request->post('ket');
        $status_pengajuan = 2;
        $tgl_verifikasi_pengajuan = date('ymdHms'); //ymdhms
        
        $model = PemohonPengajuan::find()
                ->where(['no_registrasi'=>$no_registrasi])->one();    
        $model->status_pengajuan=2;
        $model->tgl_verifikasi_pengajuan=$tgl_verifikasi_pengajuan;
        $model->catatan_verifikasi_pengajuan=$ket;
        $model->save(false);
        
        foreach ($keys as $value) {
            $modelberkasfile = \backend\models\PemohonUploadFile::findOne($value);
            $modelberkasfile->status_berkas=2;
            $modelberkasfile->save(false);
        }
        return \yii\helpers\Json::encode([
            'msg'=>"Sukses"
        ]);
    }
    
    public function actionDetailPermohonan($no_registrasi){
          $pemohonPengajuan =(new \yii\db\Query())
                ->select('a.no_ktp,a.no_npwp,a.nm_pemohon,b.nm_jenis_izin,c.nm_jenis_permohonan,e.id_data_pemohon,d.id as id_data_perusahaan,'
                        . 'e.status_pengajuan,e.status_verifikasi,e.status_selesai,'
                        . 'e.tgl_pengajuan,e.tgl_verifikasi_pengajuan,e.tgl_verifikasi,e.tgl_selesai,e.no_registrasi')
                  ->from('data_pemohon a')
                  ->leftJoin('pemohon_pengajuan e','e.id_data_pemohon=a.id')
                ->leftJoin('ref_jenis_izin b','e.id_jenis_izin=b.id')
                ->leftJoin('ref_jenis_permohonan c','e.id_jenis_permohonan=c.id')
                ->leftJoin('data_perusahaan d','d.id_pemohon=e.id_data_pemohon')
                ->where(['e.no_registrasi'=>$no_registrasi])->one();
    
          $fileuploadpemohon = (new \yii\db\Query)
                  ->select('a.id,b.no_urut, b.nm_dok,a.data_file_upload,a.no_registrasi,a.status_berkas')
                  ->from('pemohon_upload_file a')
                  ->innerJoin('detail_jenis_izin b','a.id_jenis_izin=b.id_jenis_izin AND a.id_jenis_permohonan=b.id_jenis_permohonan '
                          . ' AND a.id_detail_jenis_izin=b.id')
                  ->where(['a.no_registrasi'=>$no_registrasi])->orderBy('b.no_urut ASC');
          $dataProvider = new \yii\data\ActiveDataProvider([
              'query'=>$fileuploadpemohon
          ]);
          return $this->renderAjax('detail-permohonan',[
              'dataProvider'=>$dataProvider,
              'model'=>$pemohonPengajuan
          ]);
          
    }
       public function actionDetailPermohonanByNoReg($no_registrasi){
          $pemohonPengajuan =(new \yii\db\Query())
                ->select('a.no_ktp,a.no_npwp,a.nm_pemohon,b.nm_jenis_izin,c.nm_jenis_permohonan,e.id_data_pemohon,d.id as id_data_perusahaan,'
                        . 'e.status_pengajuan,e.status_verifikasi,e.status_selesai,'
                        . 'e.tgl_pengajuan,e.tgl_verifikasi_pengajuan,e.tgl_verifikasi,e.tgl_selesai,e.no_registrasi')
                  ->from('data_pemohon a')
                  ->innerJoin('pemohon_pengajuan e','e.id_data_pemohon=a.id')
                ->leftJoin('ref_jenis_izin b','e.id_jenis_izin=b.id')
                ->leftJoin('ref_jenis_permohonan c','e.id_jenis_permohonan=c.id')
                ->leftJoin('data_perusahaan d','d.id_pemohon=e.id_data_pemohon')
                ->where(['e.no_registrasi'=>$no_registrasi])->one();
    
          return $this->renderAjax('detail-permohonan-by-noreg',[
                'model'=>$pemohonPengajuan
          ]);
          
    }
}
