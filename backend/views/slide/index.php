<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use backend\models\FileJenis;
use backend\models\Berita;

$this->title = 'Upload Slide';
$this->params['breadcrumbs'][] = ['label' => 'Berita', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Upload File';

$id_file_jenis = ArrayHelper::map(FileJenis::find()->where(['active' => 1, 'nama' => 'slides'])->asArray()->all(),'id','nama');
$id_post = ArrayHelper::map(Berita::find()->where([])->asArray()->all(),'id','title');

?>
<div class="peserta-upload" >


<div class="panel">
        <div class="panel-body">

	<div class="col-md-12">


		<div class="row">
			<div class="alert alert-<?= $alert['type'] ?> alert-dismissible" style="display:<?= $alert['display'] ?>" >
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa <?= $alert['icon'] ?>"></i> Alert!</h4>
				<?= $alert['messages'] ?>
			</div>
		</div>


		<div class="row">


			<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

				<?= $form->field($model, 'id_post')->dropdownList(['value'=> $id_post]) ?>
				<?= $form->field($model, 'title')->textInput(['value'=>'']) ?>
				<?= $form->field($model, 'description')->textInput(['value'=>'']) ?>
				<?= $form->field($model, 'position')->textInput(['value'=>'']) ?>
				<?= $form->field($model, 'id_file_jenis')->dropdownList($id_file_jenis, ['prompt'=>'Pilih Jenis File']) ?>
				<?= $form->field($model, 'file')->fileInput() ?>

				<button class="btn btn-success">Submit</button>

			<?php ActiveForm::end() ?>
		</div>

		<div class="row">
			<h3>Data File Upload</h3>
			<?= GridView::widget([
		        'dataProvider' => $dataProvider,
		        'layout' => '{items}',

		        'columns' => [
		            //['class' => 'yii\grid\SerialColumn'],

					/*[
						'attribute' => 'id_file_jenis',
						'label' => 'Jenis File',
						'value' => function ($model) {
					        return EjafungFileJenis::name($model->id_file_jenis);
					    },
					],*/
					'position',
					'title',
					'description',
					[
						'attribute' => 'filename',
						'label' => 'Thumbnail',
						'format' => 'raw',
						'value' => function ($model) {

							$ext = pathinfo($model->filename, PATHINFO_EXTENSION);

							$gambar = array('jpg', 'png', 'jpeg');

							if (in_array($ext, $gambar))
							{
								return Html::img('@web/upload/' . $model->filename , ['class' => 'pull-left img-responsive', 'height'=>'100px', 'width'=>'100px', 'alt' => $model->filename]);
							}
							else
							{
								return 'File ' . strtoupper($ext);
							}
					    },
					],
		            // 'timestamp',

		            [
		            	'header' => 'Action',
			            'class' => 'yii\grid\ActionColumn',
			            'template' => '{edit} | {delete} | {view}',
			            'buttons' => [
//			            	'edit' => function($url, $model, $key) {
//			                    return Html::a('Update', ['file/update', 'id' => $model->id]);
//			                },
			                'delete' => function($url, $model, $key) {
			             //   	$idpost = $model['id_post'];
			                    return Html::a('Delete', ['slide/delete', 'id' => $key],// 'id_file_jenis' => $model->id_file_jenis],
                                                   [ 'data'=>[
                                                        'method'=>'post'
                                                    ]]);
			                },
			                'view' => function($url, $model, $key) {

			                	$ext = pathinfo($model->filename, PATHINFO_EXTENSION);

								$gambar = array('jpg', 'png', 'jpeg');

			                	return Html::a(in_array($ext, $gambar) == true ? 'View' : 'Download', ['/upload/' . $model->filename], ['target' => '_blank']);


			                }
			            ]
			        ]
		        ],
		    ]); ?>
		</div>

	</div>
</div>
</div>
</div>