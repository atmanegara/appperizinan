<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


?>


<!-- begin login -->
<div class="login login-with-news-feed" ng-controller="loginV3Controller">
	<!-- begin login -->
	<div class="login login-with-news-feed">
		<!-- begin news-feed -->
		<div class="news-feed">
			<div class="news-image" style="background-image: url(<?= Yii::getAlias('@web').'/cadmin' ?>/img/login-bg/login-bg-11.jpg)"></div>
			<div class="news-caption">
				<h4 class="caption-title"><b>Color</b> Admin App</h4>
				<p>
					Download the Color Admin app for iPhone®, iPad®, and Android™. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				</p>
			</div>
		</div>
		<!-- end news-feed -->
		<!-- begin right-content -->
		<div class="right-content">
			<!-- begin login-header -->
			<div class="login-header">
				<div class="brand">
					<span class="logo"></span> <b>Color</b> Admin
					<small>responsive bootstrap 3 admin template</small>
				</div>
				<div class="icon">
					<i class="fa fa-sign-in"></i>
				</div>
			</div>
			<!-- end login-header -->
			<!-- begin login-content -->
			<div class="login-content">
				
    <?php 
    

    $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"form-group m-b-15\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->label(false)->textInput(['autofocus' => true,'class'=>'form-control form-control-lg',
            'placeholder'=>"Email Address",]) ?>

        <?= $form->field($model, 'password')->label(false)->passwordInput([
            'placeholder'=>"Password",
            'class'=>'form-control form-control-lg']) ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"checkbox checkbox-css m-b-30\">{input} {label}</div>\n<div class=\"col-lg-12\">{error}</div>",
        ]) ?>

        <div class="login-buttons">
                 <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-block btn-lg', 'name' => 'login-button']) ?>
         </div>

    <?php ActiveForm::end(); ?>

   
			</div>
			<!-- end login-content -->
		</div>
		<!-- end right-container -->
	</div>
	<!-- end login -->
</div>
<!-- end login -->