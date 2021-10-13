<?php

use yii\helpers\Html;
use backend\models\File;
use backend\models\BeritaLabel;
use common\models\User;
use yii\widgets\LinkPager;

$this->title = 'News';

?>

<?php

foreach ($berita as $isi)
{

?>
<div class="post" style="background: #fff;padding: 10px">
  <div class="user-block">
        <span class="username">
          <a href="#"><?= $isi['title'] ?></a>
        </span>
  </div>
  <!-- /.user-block -->
  <p>
    <?= $isi['content'] ?>
  </p>

  
  <ul class="list-inline">
            
  <?php

    $attachment = File::find()->where(['id_post' => $isi['id']])->all();

    foreach ($attachment as $file)
    {

      echo '<li>' . $file->title . ' [' . Html::a($file->filename, ['/upload/' . $file->filename], ['target' => '_blank', 'class' => 'link-black text-sm', 'title' => $file->description]) . ']</li>';
    }


  ?>
  </ul>
  
</div>
<?php
}
echo LinkPager::widget([
    'pagination' => $pages,
]) ?>