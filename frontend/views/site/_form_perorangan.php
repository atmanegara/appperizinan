<?php
use kartik\select2\Select2;
$dataProv = yii\helpers\ArrayHelper::map($getProvinsi, 'id', 'nama');
?>
            <?= $form->field($modelDataPemohon, 'no_ktp')->label('No KTP')->textInput(['maxlength' => true]) ?>

            <?= $form->field($modelDataPemohon, 'no_npwp')->label('No. NPWP Pemohon')->textInput(['maxlength' => true]) ?>

         
            <?= $form->field($modelDataPemohon, 'nm_pemohon')->label('Nama Pemohon')->textInput(['maxlength' => true]) ?>

     <?= $form->field($modelDataPemohon, 'id_prov')->label('Provinsi')->widget(Select2::class,[
        'data'=> $dataProv,
        'options'=>[
            'placeholder'=>'Pilih Provinsi ...',
            'onChange'=>'getKab(this.value)'
        ]
    ]) ?>
     <?= $form->field($modelDataPemohon, 'id_kabkot')->label('Kabupaten')->widget(Select2::class,[
       // 'data'=> $dataProv,
        'options'=>[
         'id'=>'id_kabkot',
            'placeholder'=>'Pilih Kabupaten ...',
            'onChange'=>'getKec(this.value)'
        ]
    ]) ?>
     <?= $form->field($modelDataPemohon, 'id_kec')->label('Kecamatan')->widget(Select2::class,[
       // 'data'=> $dataProv,
        'options'=>[
         'id'=>'id_kec',
            'placeholder'=>'Pilih Kecamatan ...',
                        'onChange'=>'getDesa(this.value)'

        ]
    ]) ?>
     <?= $form->field($modelDataPemohon, 'id_desa')->label('Desa')->widget(Select2::class,[
       // 'data'=> $dataProv,
        'options'=>[
         'id'=>'id_desa',
            'placeholder'=>'Pilih Desa ...'
        ]
    ]) ?>         
         
            <?= $form->field($modelDataPemohon, 'alamat_pemohon')->label('Alamat Pemohon')->textInput(['maxlength' => true]) ?>

        
            <?= $form->field($modelDataPemohon, 'email_pemohon')->label('Email Pemohon (Aktif)')->textInput(['maxlength' => true]) ?>

<?= $form->field($modelDataPemohon, 'telp_pemohon')->label('No. Telp Pemohon (Aktif)')->textInput(['maxlength' => true]) ?>

<script>
    
    function getKab(id_prov){
        var wilayah = 'kabupaten';
        var posting = $.post("<?= \yii\helpers\Url::to(['get-data-wilayah']) ?>",{
        wilayah : wilayah,    
        id_parent : id_prov
        });
        posting.done(function(){
            console.log('done')
        })
        posting.always(function(oHtml){
            $("#id_kabkot").html(oHtml);
        })
    }
        function getKec(id_kab){
            var wilayah = 'kecamatan';
        var posting = $.post("<?= \yii\helpers\Url::to(['get-data-wilayah']) ?>",{
            wilayah : wilayah,
            id_parent : id_kab
        });
        posting.done(function(){
            console.log('done')
        })
        posting.always(function(oHtml){
            $("#id_kec").html(oHtml);
        })
    }
        function getDesa(id_kec){
            var wilayah = 'desa';
        var posting = $.post("<?= \yii\helpers\Url::to(['get-data-wilayah']) ?>",{
            wilayah : wilayah,
            id_parent : id_kec
        });
        posting.done(function(){
            console.log('done')
        })
        posting.always(function(oHtml){
            $("#id_desa").html(oHtml);
        })
    }
    </script>