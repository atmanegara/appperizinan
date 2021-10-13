<?php
use kartik\select2\Select2;
use backend\models\RefJenisIzin;
use yii\bootstrap4\Html;
use yii\helpers\Url;
$dataPerizinan = RefJenisIzin::getDataRefJenisIzin();
?>
<div class="panel panel-info" data-sortable-id="ui-widget-16" data-init="true">
			<div class="panel-heading ui-sortable-handle">
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
				<h4 class="panel-title">Lap. Pemohon berdasarakan jenis perizinan</h4>
			</div>
			<div class="panel-body">
                            <p>
                                
                                <?php
                                echo Html::label('Pilih Jenis Perizinan', 'jns_izin');
                                echo Select2::widget([
                                    'name'=>'jns_izin',
                                    'id'=>'jns_izin',
                                    'data'=>RefJenisIzin::getDataRefJenisIzin(),
                                    'options'=>[
                                        'data'=>[
                                            'style'=>'btn-primary'
                                        ],
                                        'placeholder'=>'Pilih Jenis Perizinan'
                                    ],
                                    'pluginOptions'=>[
                                      'multiple'=>true,
                                        'allowClear'=>true
                                    ]
                                ]);
?>
                            </p>
                            <p>
                                <?= Html::button('Cari',[
                                    'class'=>'btn btn-primary',
                                    'onClick'=>'cari_data_perizinan()'
                                ]) ?>
                            </p>
                            <div id="halaman-data-perizinan">
                                
                            </div>
			</div>
			
		</div>

<script>
    function cari_data_perizinan()
    {
        var jns_izin = $("#jns_izin").val();
        //alert(jns_izin);
        
        var posting = $.post("<?= Url::to(['cari-data-perizinan']) ?>",{
            key : jns_izin
        });
        posting.done(function(){
    console.log('done')    
    });
    posting.always(function(html){
         $("#halaman-data-perizinan").html(html);
    })
    }
    </script>