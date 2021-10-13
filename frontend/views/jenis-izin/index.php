<?php

use backend\models\DetailJenisIzin;
use backend\models\RefJenisPermohonan;
?>
<div class="panel-group">
<?php foreach ($model as $value) { 
    $id=$value['id'];
    ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse<?= $id ?>"><?=$value['nm_jenis_izin']?></a>
                </h4>
            </div>
            <div id="collapse<?= $id ?>" class="panel-collapse collapse">

                <div class="panel-body">
                    <?php
                    $modelDetailIzin = DetailJenisIzin::find()->where(['id_jenis_izin' => $value['id']])->all();
                    $no = 1;
                    foreach ($modelDetailIzin as $valueDetail) {
                       echo "<p>".$no . '. ' . $valueDetail['nm_dok']."</p>" ;
        $no++;
    } ?>
                </div>
            </div>
        </div>
<?php } ?>
</div> 