<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DataPemohon */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Pemohons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$hak_user = Yii::$app->user->identity->kode_group_user;
?>
<div class="data-pemohon-view">

  
    <p>
        <?= Html::a('Kembali', ['#data-pemohon/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['#data-pemohon/update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Delete', ['#data-pemohon/delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Data Perusahaan',['#data-perusahaan/create','id'=>$model->id],[
            'class'=>'btn btn-warning'
        ])?>
    </p>
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h4 class="panel-title">
                Data Pemohon
            </h4>
        </div>
            <div class="panel-body">
                    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
          //  'id_tipe_pemohon',
            'no_ktp',
            'no_npwp',
            'id_jns_bdn_usaha',
            'nm_pemohon',
            'nm_pmilik_bu',
            'alamat_pemohon',
          [
              'label'=>'Kabupaten Kota',
              'attribute'=>'id_kabkot',
            'value'=>function($model)use($datkab){
        $id_kab=$model['id_kabkot'];
            $datkabX=array_filter($datkab,function($ar)use($id_kab){
                 return ($ar['id'] == $id_kab);
            });
            $nama = array_column($datkabX,'nama');
               return $nama[0];
            }  
         
          ],
//            'email_pemohon:email',
//            'telp_pemohon',
        ],
    ]) ?>
            </div>
        </div>
    </div>

<?php 
if (in_array($hak_user, ['FO','BO'])){
   $modeluser =  \common\models\User::find()
           ->where(['nip'=>$model['id']])->one();
 ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            Akun Online Pemohon
        </div>
        <div class="panel-body">
    <?= DetailView::widget([
        'model'=>$modeluser,
        'attributes'=>[
            'username',
            [
                'label'=>'Password',
                'format'=>'html',
                'value'=>function($model){
                    return $model['password_hash'].'<hr>'.'Default Password : '.$model['username'];
                }
            ]
            
        ]
    ]) ?>
            
        </div>
    </div>
    <?php
}
?>
</div>
