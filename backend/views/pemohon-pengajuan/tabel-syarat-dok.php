<?php
use kartik\grid\GridView;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?=
GridView::widget([
    'dataProvider'=>$dataProvider,
    'columns'=>[
        ['class'=> '\kartik\grid\SerialColumn'],
        ['class'=> '\kartik\grid\CheckboxColumn'],
        'nm_dok'
    ]
])
?>

