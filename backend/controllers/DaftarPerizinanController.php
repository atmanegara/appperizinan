<?php

namespace backend\controllers;

use Yii;
use backend\models\DataPemohon;
use backend\models\DataPemohonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\PemohonPengajuan;
use Mpdf\Mpdf;

/**
 * DataPemohonController implements the CRUD actions for DataPemohon model.
 */
class DaftarPerizinanController extends Controller {

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

        $hak_user = Yii::$app->user->identity->kode_group_user;

        if (in_array($hak_user, ['PORG', 'BDNUS'])) {

            $id_data_pemohon = Yii::$app->user->identity->nip;

            $model = $this->findModel($id_data_pemohon);

            $query = (new \yii\db\Query())
                            ->select('a.no_registrasi,a.id_jenis_izin,b.nm_jenis_izin,a.id_jenis_permohonan,c.nm_jenis_permohonan,a.id_jenis_bdn_usaha,d.nm_jns_bdn_usaha,'
                                    . 'a.status_pengajuan,a.status_verifikasi,a.status_selesai,'
                                    . 'a.tgl_pengajuan,a.tgl_verifikasi_pengajuan,a.tgl_verifikasi,a.tgl_selesai')
                            ->from('pemohon_pengajuan a')
                            ->innerJoin('ref_jenis_izin b', 'a.id_jenis_izin=b.id')
                            ->innerJoin('ref_jenis_permohonan c', 'a.id_jenis_permohonan=c.id')
                            ->innerJoin('ref_jenis_bdn_usaha d', 'a.id_jenis_bdn_usaha=d.id')
                            ->where([
                                'a.id_data_pemohon' => $id_data_pemohon
                            ])->groupBy('a.no_registrasi');

            $dataProvider = new \yii\data\ActiveDataProvider([
                'query' => $query
            ]);

            return $this->renderAjax('index', [
                        'dataProvider' => $dataProvider,
                        'model' => $model
            ]);
        } else {

            $query = (new \yii\db\Query())
                    ->select('a.no_registrasi,a.id_jenis_izin,b.nm_jenis_izin,a.id_jenis_permohonan,c.nm_jenis_permohonan,a.id_jenis_bdn_usaha,d.nm_jns_bdn_usaha,a.status_pengajuan,a.status_verifikasi,a.status_selesai')
                    ->from('pemohon_pengajuan a')
                    ->innerJoin('ref_jenis_izin b', 'a.id_jenis_izin=b.id')
                    ->innerJoin('ref_jenis_permohonan c', 'a.id_jenis_permohonan=c.id')
                    ->innerJoin('ref_jenis_bdn_usaha d', 'a.id_jenis_bdn_usaha=d.id')
                    ->groupBy('a.no_registrasi');

            $dataProvider = new \yii\data\ActiveDataProvider([
                'query' => $query
            ]);

            return $this->renderAjax('index', [
                        'dataProvider' => $dataProvider]);
        }
    }

    /**
     * Displays a single DataPemohon model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DataPemohon model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new PemohonPengajuan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->renderAjax('create', [
                    'model' => $model,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
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

    //cetak bukti pendaftara
    public function actionPreviewBukti() {
        $no_registrasi = Yii::$app->request->get('no_registrasi');
        $sql = "call sp_cetak_bukti_pendaftaran(:no_registrasi)";
        $params = [
            ':no_registrasi' => $no_registrasi
        ];
        $dataPemohon = Yii::$app->db->createCommand($sql, $params)->queryOne();
  //      return count($dataPemohon);
        if (count($dataPemohon)==0){
            return "No Registrasi : <span class='label label-danger'>$no_registrasi</span> <span class='label label-info'>Tidak ditemukan</span>";
        }
        return $this->renderAjax('form-cetak-bukti',
                        [
                            'no_registrasi' => $no_registrasi,
                            'dataPemohon' => $dataPemohon
        ]);
    }

    public function actionCetakBukti() {
        $no_registrasi = Yii::$app->request->get('no_registrasi');
        $sql = "call sp_cetak_bukti_pendaftaran(:no_registrasi)";
        $params = [
            ':no_registrasi' => $no_registrasi
        ];
        $dataPemohon = Yii::$app->db->createCommand($sql, $params)->queryOne();
        //    return var_dump($dataPemohon);
        $content = $this->renderPartial('cetak-bukti',
                [
                    'no_registrasi' => $no_registrasi,
                    'dataPemohon' => $dataPemohon
        ]);


        $mpdf = new Mpdf();
        $mpdf->WriteHTML($content);
        $mpdf->Output();
    }

}
