<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\select2\Select2;
$this->title = 'Dokumen';
$this->params['breadcrumbs'][] = $this->title;
$tahun = \yii\helpers\ArrayHelper::map(backend\models\TblTahun::find()->select('kd_tahun,tahun')->asArray()->all(),'kd_tahun','tahun');
$jenis_dok = \yii\helpers\ArrayHelper::map(backend\models\RefJnsPeraturan::find()->select('id_jns_atur,nm_jns_atur')->asArray()->all(),'id_jns_atur','nm_jns_atur');
?>
<div class="site-about">
    <div class="row">
       <div class="col-md-4">
   
            <?= yii\bootstrap\Html::label('Jenis Dokumen','jenis_dok') ?>
     <?= Select2::widget([
            'name'=>'jenis_dok',
            'id'=>'jenis_dok',
            'data'=>$jenis_dok,
            'options'=>[
                'multiple'=>true,
                'placeholder'=>'Jenis Dokumen ..'
            ]
        ]) ?>    
        </div>
        <div class="col-md-4">
            <?= yii\bootstrap\Html::label('Tahun Terbit','tahun') ?>
        <?= yii\bootstrap\Html::dropDownList('tahun', null, $tahun,['class'=>'form-control','prompt'=>'Tahun Terbit ..','id'=>'tahun']) ?>  
        </div>
       
        <div class="col-md-4">
            <p>
         <?= yii\bootstrap\Html::label('Kata / Judul Dokumen','kata') ?>
           <?= yii\bootstrap\Html::textInput('kata',null,['class'=>'form-control','placeholder'=>'Pencarian Judul ..','id'=>'kata']) ?>
            </p>
            <p>
<?= yii\bootstrap\Html::button('Cari',[
    'onClick'=>'cari()',
    'class'=>'btn btn-primary'
]) ?>       
<?= yii\bootstrap\Html::a('Reset',['dokumen-all'],['class'=>'btn btn-warning']) ?>                
            </p>
            
        </div>
 
    </div>
    <div id="dok-tabel">
        <?= $this->render('dok-tabel',[
            'dataprovider'=>$dataprovider
        ]) ?>
    </div>

</div>

<script>
    function cari()
    {
        var jenis_dok = $("#jenis_dok").val();
        var tahun = $("#tahun").val();
        var kata = $("#kata").val();
        
        var posting = $.get("<?= \yii\helpers\Url::to(['cari-kata']) ?>",{
            jenis_dok : jenis_dok,
            tahun : tahun,
            kata : kata
        });
        posting.always(function(html){
            $("#dok-tabel").html(html);
        })
    }
    </script>