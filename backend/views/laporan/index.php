<?php

use yii\bootstrap\Html;
?>
<div class="row">
    <div class="col-lg-3">


        <div class="panel panel-info">
            <div class="panel-heading">Laporan</div>
            <div class="panel-body">

                <p>
                    <button class="btn btn-warning btn-block" onclick="lap_bulanan()"><i class="fa fa-list pull-left"></i> Bulanan</button>
                </p>
                <p>
                    <button class="btn btn-default btn-block" onclick="lap_tahunan()"><i class="fa fa-list pull-left"></i> Tahunan</button>
                </p>
            </div>
        </div>


    </div>
    <div class="col-lg-9">

        <div id="halaman-laporan">

        </div>

    </div>
</div>
<hr>


<div class="panel panel-inverse" data-sortable-id="ui-widget-1">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="#" class="btn btn-xs btn-icon btn-circle btn-default" 
               data-click="panel-expand">
                <i class="fa fa-expand"></i>
            </a>
        </div>
        <h4 class="panel-title">Panel Title</h4>
    </div>
    <div class="panel-body">
        <div id="halaman-hasil">
            <?=
            Html::img('@web/img/loading.gif', [
                'width' => '300px',
                'height' => '300px',
                'style' => 'display : none',
                'id' => 'loading-cari-bulanan'
            ]);
            ?>
        </div>

    </div>
</div>

<script>
    function lap_bulanan() {
        var posting = $.post('<?= yii\helpers\Url::to(['form-bulanan']) ?>');

        posting.always(function (html) {
            $("#halaman-laporan").html(html)
        })
    }
     function lap_tahunan() {
        var posting = $.post('<?= yii\helpers\Url::to(['form-tahunan']) ?>');

        posting.always(function (html) {
            $("#halaman-laporan").html(html)
        })
    }
</script>