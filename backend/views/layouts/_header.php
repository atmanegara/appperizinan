<div id="header" class="header navbar-default">
    <!-- begin navbar-header -->
    <div class="navbar-header">
        <a href="index.php" class="navbar-brand"><span class="navbar-logo"></span>SIPT Online</a>
        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- end navbar-header -->

    <!-- begin header-nav -->
    <ul class="navbar-nav navbar-right">

        <?php if (!Yii::$app->user->isGuest) { ?>
            <li class="dropdown navbar-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?= Yii::getAlias('@web') . '/cadmin' ?>/img/user/user-13.jpg" alt="" /> 
                    <span class="d-none d-md-inline"><?= Yii::$app->user->identity->username ?></span> <b class="caret"></b>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:;" class="dropdown-item">Edit Profile</a>
                           <a href="javascript:;" class="dropdown-item">Setting</a>
                    <div class="dropdown-divider"></div>
                    <a href="site/logout" data-method="post" class="dropdown-item">Log Out</a>
                </div>
            </li>
        <?php } else { ?>
            <li class="dropdown navbar-user">
                <a href="<?= \yii\helpers\Url::to(['site/login']) ?>">
                    <span class="d-none d-md-inline"><i class="ion-ios-locked-outline"> </i>Login</span>
                </a>

            </li>
        <?php } ?>
    </ul>
    <!-- end header navigation right -->
</div>