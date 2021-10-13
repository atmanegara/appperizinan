<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;
use yii\widgets\LinkPager;
use backend\models\BeritaLabel;
use backend\models\Berita;

$this->title = 'SIPT Online';
?>
<?php
$img = './uploads/' . 'la.jpg';
?>
<div class="site-index">

    <div class="row">
        <div class="col-md-8">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">

                    <?php
                    $no = 0;

                    foreach ($slide as $data) {
                        echo '<li data-target="#myCarousel" data-slide-to="' . $no . '"></li>';

                        $no++;
                    }
                    ?>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">


                    <?php
                    $active = 0;


                    foreach ($slide as $data) {

                        echo '<div class="item ' . ($active == 0 ? 'active' : '' ) . '">
                          <img src="' . Yii::$app->params['dirUpload'] . $data['filename'] . '" alt="' . $data['title'] . '" style="height: 300px; width: 100%">
                          <div class="carousel-caption">
                              <h3>' . Html::a($data['title'], ['site/post', 'id' => $data['id_post']], ['class' => '', 'title' => $data['title']]) . '</h3>
                              <p>' . $data['description'] . '</p>
                          </div>

                        </div>';

                        $active++;
                    }
                    ?>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div> 
        <div class="col-md-4">
            <div class="thumbnail ">

                <div class="list-group">
<?php foreach ($dataPerizinan as $value) { ?>
                        <a href="#" class="list-group-item list-group-item-warning"><?= $value['nm_jenis_izin'] ?></a>
<?php } ?>
                </div>

            </div>
        </div>
    </div>

    <br>
    <div class="body-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-warning">
                    <div class="panel-body">
<?= '$runtek' ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
<?php
foreach ($berita as $isi) {
    ?>
                    <div class="media ">
                        <div class="media-left media-middle ">
                            <a href="#">
                                <img class="media-object" src="<?= Yii::getAlias('@web') ?>/img/avatar.png" alt="NO PICT" style="width: 50px;height: 50px">
                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">       <?= Html::a($isi['title'], ['site/post', 'id' => $isi['id']], ['class' => 'link-black text-sm', 'title' => $isi['title']]) ?>
                            </h5>
    <?= $isi['description'] ?>
                        </div>
                    </div>



                            <?php
                        }
                        ?>



                <?php
                echo LinkPager::widget([
                    'pagination' => $pages,
                ])
                ?>

            </div>
            <div class="col-md-4">
                
                <h3>Kategori Berita</h3>
                <ul class="list-group">
<?php
$labels = BeritaLabel::find()->where([])->all();


foreach ($labels as $label) {


    $count = Berita::find()->where(['id_label' => $label['id']])->count();
    echo '<li class="list-group-item">' . Html::a($label->nama, ['site/post-label', 'id' => $label->id], ['class' => 'link-black text-sm', 'title' => $label->nama]) . '   <span class="badge label-primary">' . $count . '</span></li>';
}
?>
                </ul>


            </div>
        </div>
                  
    </div>


</div>
        <?php
        $this->registerCss("
.list-special .list-group-item:first-child {
  border-top-right-radius: 0px !important;
  border-top-left-radius: 0px !important;
}

.list-special .list-group-item:last-child {
  border-bottom-right-radius: 0px !important;
  border-bottom-left-radius: 0px !important;
}
");
        ?>