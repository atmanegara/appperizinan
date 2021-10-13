<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\RefTipePemohon;
use kartik\select2\Select2;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;

$data = yii\helpers\ArrayHelper::map(RefTipePemohon::find()->all(), 'id', 'nmjenis');
?>
<div class="site-signup">

    <div class="row">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

        <div class="col-lg-7">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Data Pemohon
                </div>
                <div class="panel-body">
                               <?=
            $form->field($modelDataPemohon, 'id_tipe_pemohon')->label('Tipe Pemohon')->widget(Select2::className(), [
                'data' => $data,
                //      'language' => 'de',
                'options' => [
                    'placeholder' => 'Pilih Tipe Pemohon ...',
                    'onChange'=>'tipepemohon(this.value)'
                    ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])
            ?>
   <div id="id-form-registrasi">
         
           <?= $this->render('_form_perorangan',[
               'form'=>$form,
               'modelDataPemohon'=>$modelDataPemohon,
               'getProvinsi'=>$getProvinsi
           ]) ?>
            </div>
      
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Data Akun Pemohon
                </div>
                <div class="panel-body">
                          <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
<?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
      
                </div>
            </div>

        </div>
<?php ActiveForm::end(); ?>
    </div>
</div>
<script>
    function tipepemohon(id_tipe){
        
        var id_tipe = id_tipe;
        
        var posting = $.post('<?= \yii\helpers\Url::to(['tipe-pemohon']) ?>',{
            id_tipe : id_tipe
        });
        posting.always(function(html){
            $("#id-form-registrasi").html(html);
        })
    }
    </script>