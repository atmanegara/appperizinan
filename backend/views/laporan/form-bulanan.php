<?php

use yii\bootstrap\Html;
?>
<div class='panel panel-warning'>
    <div class='panel-heading'>Form Laporan Rekap Perizinan</div>
    <div class='panel-body'>

        <div class="row">
            <div class="col-xs-3">

                <p>             
                <div class="input-group m-b-10">
                    <div class="input-group-prepend"><span class="input-group-text">Bulan</span></div>
                    <?=
                    Html::dropDownList('bulan', null, [
                        '1' => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                            ], ['class' => 'form-control', 'id' => 'bulan', 'required' => true, 'prompt' => "Pilih Bulan"])
                    ?>
                </div>
                </p>

            </div>  
            <div class="col-xs-3">
                <p>
                             <div class="input-group m-b-10">
                    <?php
                    echo Html::button('Cari', [
                        'onClick'=>'cari_bulanan()',
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
    function cari_bulanan()
    {
       
                   $('#loading-cari-bulanan').show('slow');
      var bulanan = $("#bulan").val();
        
        var posting = $.post("<?= yii\helpers\Url::to(['cari-bulanan']) ?>",{
            bulan : bulanan
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