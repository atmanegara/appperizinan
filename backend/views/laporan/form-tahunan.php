<?php

use yii\bootstrap\Html;
?>
<div class='panel panel-default'>
    <div class='panel-heading'>Form Laporan Rekap Perizinan</div>
    <div class='panel-body'>

        <div class="row">
            <div class="col-xs-3">

                <p>             
                <div class="input-group m-b-10">
                    <div class="input-group-prepend"><span class="input-group-text">Tahun</span></div>
                    <?=
                    Html::dropDownList('tahun', null, [
                        '2018' => '2018', '2019', '2020', '2021', '2022', '2023', '2024', '2025', '2026', '2027', '2028', '2029'
                            ], ['class' => 'form-control', 'id' => 'tahun', 'required' => true, 'prompt' => "Pilih Tahun"])
                    ?>
                </div>
                </p>

            </div>  
            <div class="col-xs-3">
                <p>
                             <div class="input-group m-b-10">
                    <?php
                    echo Html::button('Cari', [
                        'onClick'=>'cari_tahun()',
                        'class' => 'btn btn-primary'
                    ])
                    ?>                    
                </div>     
                </p>
  

              

            </div>
        </div>

    </div>

</div>
<script>
    function cari_tahun()
    {
       
                   $('#loading-cari-bulanan').show('slow');
      var tahun = $("#tahun").val();
        
        var posting = $.post("<?= yii\helpers\Url::to(['cari-tahunan']) ?>",{
            tahun : tahun
        });
        posting.done(function(){
            console.log('ok done');
        });
        posting.fail(function(error){
            console.log(error.textReponses);
        });
        posting.always(function(html){
                 $('#loading-cari-bulanan').show('none');
         
            $("#halaman-hasil").html(html);
        })
    }
    </script>