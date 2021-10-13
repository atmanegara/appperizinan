<?php

use yii\helpers\Html;
use backend\models\File;
use backend\models\Berita;
use backend\models\BeritaLabel;
use common\models\User;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */

$this->title = $post['title'];
?>

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-8">

      <!-- Title -->
      <h1 class="mt-4"><?= $post['title'] ?></h1>

      <!-- Author -->
     

      <hr>

      <!-- Date/Time -->
      <p>Posted on <?= $post['date'] ?> | label: 


	      <?php 

	      		$label = BeritaLabel::find()->where(['id' => $post['id_label']])->one();
	      			
	      		echo Html::a($label['nama'], ['site/post-label', 'id' => $label['id']], ['class' => 'link-black text-sm', 'title' => $label['nama']]) 

	      ?>
      	
      </p>

      <hr>

      <!-- Post Content -->
      <p class="lead">
      		<?= $post['content'] ?>
      </p>

  	
	    <?php
	    $attachment = File::find()->where(['id_post' => $post['id']])->all();

	    if ( count($attachment) > 0 )
	    {
	    	echo '<h3>File Attachment</h3>';
	    	echo '<ul class="list-group">';
	    	foreach ($attachment as $file)
		    {
		    	echo '<li class="list-group-item"><strong>' . $file->title . '</strong> ' . $file->description . ' (' .  Html::a($file->filename, ['../admin/upload/' . $file->filename], ['target' => '_blank', 'class' => 'link-black text-sm', 'title' => $file->filename]) . ')</li>';
		    }
    		echo '</ul>';
	    }
	    ?>
    
    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">
    	<h3>Label Berita</h3>
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
  <!-- /.row -->

</div>
<!-- /.container -->
