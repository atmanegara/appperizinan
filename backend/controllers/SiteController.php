<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\db\Query;
use backend\models\DataPetugasLoket;
use backend\models\JadwalPetugasLoket;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','home','perorangan-dashboard','admin','fo-dashboard','bo-dashboard','cari-noreg'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get','post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
  
 public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionHome()
    {
        $querAll=0;
       $queryOnline = 0;
       $persenOnline =0;
       $queryOffline =0;
       $persenOffline =0;
       
        //semua pendaftar
          $sql = "SELECT count(*) FROM pemohon_pengajuan a ";
        $queryAll = Yii::$app->db->createCommand($sql)->queryScalar();
       if($querAll>0){
        //Pendaftaran Online
        $sql = "SELECT count(*) FROM pemohon_pengajuan a WHERE a.id_status_daftar=1;";
        $queryOnline = Yii::$app->db->createCommand($sql)->queryScalar();
        $persenOnline = Yii::$app->formatter->asPercent($queryOnline/$queryAll);
             //Pendaftaran Offline
        $sql = "SELECT count(*) FROM pemohon_pengajuan a WHERE a.id_status_daftar=2;";
        $queryOffline = Yii::$app->db->createCommand($sql)->queryScalar();
        $persenOffline = Yii::$app->formatter->asPercent($queryOffline/$queryAll);
       } 
        //Pemohon yang sudah verifikasi berkas perizinan yang diajukan
             $sql = "SELECT COUNT(*) FROM pemohon_pengajuan a WHERE a.status_verifikasi=1  AND date(a.tgl_pengajuan)=now()";
        $queryBerkasVerifikasi = Yii::$app->db->createCommand($sql)->queryScalar();
          //jadwal Petugas
        $model = (new Query())
                ->select('a.nama_petugas,b.jam_pagi,b.jam_siang,b.jam_sore')
                ->from('data_petugas_loket a')
                ->innerJoin('jadwal_petugas_loket b','a.id=b.id_data_petugas_loket')
                ->where('a.aktif="Y"')
                ->andWhere(['b.tgl_masuk'=>date('Y-m-d')])->all();
        
        //Data pemohon yang baru daftar seminggu ini (range 7 hari)
               $sql = "SELECT no_ktp,nm_pemohon,foto_profil FROM data_pemohon a WHERE date(a.create_date) between CURRENT_DATE() and DATE(CURRENT_DATE() + INTERVAL 1 WEEK);";
        $queryPemohonBaru = Yii::$app->db->createCommand($sql)->queryAll();
      //Jumlah pemohon perizinan per perizinan
            $sql = "call sp_lap_rekap_tahunan(:tahun)";
        $params=[
             ':tahun'=>date('Y')
        ];
        
        $queryIzin = Yii::$app->db->createCommand($sql, $params)->queryAll();
        return $this->renderAjax('home',[
            'model'=>$model,
            'queryOnline'=>$queryOnline,
            'persenOnline'=> $persenOnline,
            'queryOffline'=>$queryOffline,
            'persenOffline'=> $persenOffline,
            'queryBerkasVerifikasi'=>$queryBerkasVerifikasi,
            'queryAll'=>$queryAll,
            'queryPemohonBaru'=>$queryPemohonBaru,
            'queryIzin'=>$queryIzin
        ]);
    }
    //Dashboard Admin
      public function actionAdmin()
    {
        return $this->renderAjax('admin');
    }
    //Dashboard Pemohon
    public function actionPeroranganDashboard(){
        
        $id_pemohon = Yii::$app->user->identity->nip;
        
        $pengajuanbaru = \backend\models\PemohonPengajuan::find()
                ->where(['id_data_pemohon'=>$id_pemohon,'status_pengajuan'=>'0'])->count();
        $verifikasi = \backend\models\PemohonPengajuan::find()
                ->where(['id_data_pemohon'=>$id_pemohon,'status_pengajuan'=>'1'])->count();
        $selesai = \backend\models\PemohonPengajuan::find()
                ->where(['id_data_pemohon'=>$id_pemohon,'status_selesai'=>'1'])->count();
        $tolak = \backend\models\PemohonPengajuan::find()
                ->where(['id_data_pemohon'=>$id_pemohon])
                ->andWhere(['or',['status_pengajuan'=>'2'],['status_verifikasi'=>'2'],['status_selesai'=>'2']])->count();
      
        return $this->renderAjax('perorangan-dashboard',[
            'pengajuanbaru'=>$pengajuanbaru,
            'verifikasi'=>$verifikasi,
            'selesai'=>$selesai,
            'tolak'=>$tolak
        ]);
    }
    public function actionCariNoreg()
    {
        $noreg= Yii::$app->request->post('no_reg');
      $data = \backend\models\PemohonPengajuan::find()->where(['no_registrasi'=>$noreg])->all();
           
//           $dataProvider = new \yii\data\ActiveDataProvider([
//               'query'=>$pengajuanizn
//           ]);
                   return $this->renderPartial('timeline',[
                       'data'=>$data
                   ]);
                   
    }
    
     public function actionFoDashboard(){
          $pengajuanbaru = \backend\models\PemohonPengajuan::find()
                ->where(['status_pengajuan'=>'0'])->count();
        $verifikasi = \backend\models\PemohonPengajuan::find()
                ->where(['status_pengajuan'=>'1','status_verifikasi'=>'1'])->count();
        $selesai = \backend\models\PemohonPengajuan::find()
                ->where(['status_pengajuan'=>'1','status_verifikasi'=>'1','status_selesai'=>'1'])->count();
        $tolak = \backend\models\PemohonPengajuan::find()
                ->orWhere(['status_pengajuan'=>'2','status_verifikasi'=>'2','status_selesai'=>'2'])->count();
        
        $datapemohonoffline = (new \yii\db\Query())
                ->select('a.no_registrasi,b.nm_pemohon,c.nm_perusahaan,b.no_ktp')
                ->from('pemohon_pengajuan a')
                ->leftJoin('data_pemohon b','a.id_data_pemohon=b.id')
                ->leftJoin('data_perusahaan c','c.id_pemohon=a.id_data_pemohon')->where(['id_status_daftar'=>'2']);
        
        $dataProvideroff = new \yii\data\ActiveDataProvider([
            'query'=>$datapemohonoffline,
        ]);
        
                $datapemohononline = (new \yii\db\Query())
                ->select('a.no_registrasi,b.nm_pemohon,c.nm_perusahaan,b.no_ktp')
                ->from('pemohon_pengajuan a')
                ->leftJoin('data_pemohon b','a.id_data_pemohon=b.id')
                ->leftJoin('data_perusahaan c','c.id_pemohon=a.id_data_pemohon')->where(['id_status_daftar'=>'1']);
        
        $dataProvideron = new \yii\data\ActiveDataProvider([
            'query'=>$datapemohononline,
        ]);
        return $this->renderAjax('fo-dashboard',[
            'pengajuanbaru'=>$pengajuanbaru,
            'verifikasi'=>$verifikasi,
            'selesai'=>$selesai,
            'tolak'=>$tolak,
            'dataProvideroff'=>$dataProvideroff,
            'dataProvideron'=>$dataProvideron
        ]);
    }
     public function actionBoDashboard(){
         
         //Permohonan via pusat
         $dataPermohonanPusat = \backend\models\PemohonPengajuan::find()->where([
             'id_status_daftar'=>'2'
         ])->count();
         //Permohonan via online
         $dataPermohonanOnline = \backend\models\PemohonPengajuan::find()->where([
             'id_status_daftar'=>'1'
         ])->count();
         
                  //Permohonan Selesai
         $dataPermohonanSelesai = \backend\models\PemohonPengajuan::find()->where([
             'status_selesai'=>'1'
         ])->count();
         //Permohonan di tolak
         $dataPermohonanTolak = \backend\models\PemohonPengajuan::find()->where([
             'status_selesai'=>'2'
         ])->count();
         
         $tglnow = date('Ymd');
//Status SK Perizinan berlaku
         $skBerkalu = \backend\models\PenetapanNomor::find()->andWhere(['>',
             'tgl_tempo_sk',$tglnow,
         ])->count();
         //SK Habis izin
           $skHabis = \backend\models\PenetapanNomor::find()->andWhere(['<',
             'tgl_tempo_sk',$tglnow,
         ])->count();
           //SK dicabut
           $skCabut = \backend\models\PenetapanNomor::find()->where([
             'status_perizinan'=>'1',
         ])->count();
        return $this->renderAjax('bo-dashboard',[
            'dataPermohonanPusat'=>$dataPermohonanPusat,
            'dataPermohonanOnline'=>$dataPermohonanOnline,
            'dataPermohonanSelesai'=>$dataPermohonanSelesai,
            'dataPermohonanTolak'=>$dataPermohonanTolak,
            'skBerlaku'=>$skBerkalu,
            'skHabis'=>$skHabis,
            'skCabut'=>$skCabut,
        ]);
    }
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
             $this->layout="main-login";
   
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

       return $this->redirect(['login']);
    }
}
