<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'cadmin/plugins/jquery-ui/jquery-ui.min.css',
        'cadmin/plugins/bootstrap/4.0.0/css/bootstrap.min.css',
        'cadmin/plugins/font-awesome/5.0/css/fontawesome-all.min.css',
        'cadmin/plugins/animate/animate.min.css',
        'cadmin/plugins/ionicons/css/ionicons.min.css',
        'cadmin/css/apple/style.min.css',
        'cadmin/css/apple/style-responsive.min.css',
        'cadmin/css/apple/theme/default.css',
        'cadmin/plugins/gritter/css/jquery.gritter.css'
    ];
    public $js = [
        'cadmin/plugins/pace/pace.min.js',
        'cadmin/js/theme/default.min.js',
        'cadmin/js/apps.js',
        'cadmin/plugins/js-cookie/js.cookie.js',
        'cadmin/plugins/jquery-ui/jquery-ui.min.js',
        'cadmin/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js',
        'cadmin/plugins/slimscroll/jquery.slimscroll.min.js',
        'cadmin/plugins/jquery/jquery-migrate-1.1.0.min.js',
        'cadmin/js/demo/dashboard-v2.js',
        'cadmin/plugins/gritter/js/jquery.gritter.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
