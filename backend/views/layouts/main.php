<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use app\assets\AppAsset;

!empty($viewPath) || $viewPath = '@app/views/layouts';
!empty($viewHeader) || $viewHeader = $viewPath . '/_header';
!empty($viewSidebar) || $viewSidebar = $viewPath . '/_sidebar';
//!empty($viewContent) || $viewContent = $viewPath . '/_content';
//AceAsset::register($this);
AppAsset::register($this);
if (!Yii::$app->user->isGuest) {
    $kode_group_user = Yii::$app->user->identity->kode_group_user;
    $dataMenu = \backend\models\RefGroupUser::findOne(['kode' => $kode_group_user]);
    $url = $dataMenu['url'];
} else {
    $url = '/site/home';
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        
        <?php $this->head() ?>
    </head>

    <?php $this->beginBody() ?>
    <body>

        <?php if (Yii::$app->controller->action->id == 'login') { ?>
            <div class="login-content" >    
                <?= $content ?>
            </div>
            <?php
        } else {
            ?>
            <div id="page-loader" class="fade show"><span class="spinner"></span></div>
            <!-- begin #page-container -->
            <div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">

                <?= $this->renderAjax($viewHeader) ?>
                <?= $this->renderAjax($viewSidebar) ?>
                <!-- begin #content -->
                <div class="content" id="content">    
                    <?= $content ?>
                </div>
            </div>     <!-- end #content -->

        <?php } ?>
    </body>

    <?php $this->endBody() ?>
</html>
<?php 
$this->endPage();

?>
<?php
yii\bootstrap\Modal::begin([
'headerOptions' => ['id' => 'modalHeader'],
'id' => 'modal',
'size' => 'modal-lg',
'clientOptions' => ['backdrop' => 'static', 'keyboard' => true]
]);
echo "<div id='modalContent'></div>";
yii\bootstrap\Modal::end();
?>
<script>
    $(document).ready(function () {
        
        App.init({
            ajaxMode: true,
            ajaxDefaultUrl: '<?= \yii\helpers\Url::to([$url]) ?>',
            ajaxType: 'POST',
            ajaxDataType: 'html'
        });
         
    //    handleDashboardGritterNotification('Selamat Datang Kembali, Sanak!', 'Kamu urang baik ganting tidak sumbung rajin sulat rajin babasuh', '');

    });
</script>
