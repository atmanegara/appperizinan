<?php

use yii\helpers\Html;
use backend\models\Berita;
use backend\models\BeritaLabel;
use yii\widgets\LinkPager;

$this->title = 'Seach by Label';

?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
      <div class="col-lg-8">
        <ul>
        <?php

        $temp = array();

        if ( count($berita) <= 0 )
        {
            echo '<div class="panel panel-default">
                    <div class="panel-body text-center">No Post Found</div>
                  </div>';
        }
        
        foreach ($berita as $isi)
        {
          if (!in_array($isi['id_label'], $temp)) {
              echo '<h3>' . BeritaLabel::find()->where(['id' => $isi['id_label']])->one()->nama . '</h3>';
              $temp[] = $isi['id_label'];
            }
        ?>
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title"><?= $isi['title'] ?></h3>
            <span class="pull-right"><?= $isi['date'] ?></span>
          </div>
          <div class="box-body">
            <?= $isi['description'] ?>
            <div class="timeline-footer"></div>
          </div>
        </div>
          
        <?php
        }
        ?>
        </ul>
        <?= LinkPager::widget([
            'pagination' => $pages,
        ]) ?>
      </div>

      <div class="col-md-4">
      <h3>Berita</h3>
      <ul class="list-group">
        <?php
            $labels = BeritaLabel::find()->where([])->all();


            foreach ($labels as $label)
            {

              
              $count = Berita::find()->where(['id_label' => $label['id']])->count();
              echo '<li class="list-group-item">'. Html::a($label->nama, ['site/post-label', 'id' => $label->id], ['class' => 'link-black text-sm', 'title' => $label->nama]).'   <span class="badge label-primary">' . $count . '</span></li>';
            }


        ?>
        </ul>

    </div>

    </div>

    </div>
</div>