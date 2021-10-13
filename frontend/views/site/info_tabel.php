<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use kartik\grid\GridView;

$this->title = 'Dokumen';
$this->params['breadcrumbs'][] = $this->title;
$tahun = \yii\helpers\ArrayHelper::map(backend\models\TblTahun::find()->select('kd_tahun,tahun')->asArray()->all(),'kd_tahun','tahun');
$jenis_dok = \yii\helpers\ArrayHelper::map(backend\models\RefJnsPeraturan::find()->select('id_jns_atur,nm_jns_atur')->asArray()->all(),'id_jns_atur','nm_jns_atur');
?>
<div class="site-about">
    <div class="row">
       <div class="col-md-4">
        <?= yii\bootstrap\Html::dropDownList('jenis_dok', null, $jenis_dok,['class'=>'form-control','prompt'=>'Jenis Dokumen','id'=>'jenis_dok']) ?>
            
        </div>
        <div class="col-md-4">
        <?= yii\bootstrap\Html::dropDownList('tahun', null, $tahun,['class'=>'form-control','prompt'=>'Tahun terbit','id'=>'tahun']) ?>
            
        </div>
       
        <div class="col-md-4">
            <p>
        <?= yii\bootstrap\Html::textInput('kata',null,['class'=>'form-control','placeholder'=>'Pencarian Kata','id'=>'kata']) ?>
            </p>
            <p>
<?= yii\bootstrap\Html::button('Cari',[
    'onClick'=>'cari()',
    'class'=>'btn btn-primary'
]) ?>                
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
        
        var posting = $.post("<?= \yii\helpers\Url::to(['cari-kata']) ?>",{
            jenis_dok : jenis_dok,
            tahun : tahun,
            kata : kata
        });
        posting.always(function(html){
            $.("#dok-tabel").html(html)
        })
    }
    </script>