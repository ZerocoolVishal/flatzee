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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'https://fonts.googleapis.com/css?family=Libre+Franklin:100,200,300,400,500,700',
        'lib/bootstrap/css/bootstrap.min.css',
        'lib/font-awesome/css/font-awesome.min.css',
        'lib/animate.css',
        'lib/selectric/selectric.css',
        'lib/swiper/css/swiper.min.css',
        'lib/aos/aos.css',
        'lib/Magnific-Popup/magnific-popup.css',
        'css/style.css'
    ];
    public $js = [
        'lib/jquery-3.2.1.min.js',
        'lib/popper.min.js',
        'lib/bootstrap/js/bootstrap.min.js',
        'lib/selectric/jquery.selectric.js',
        'lib/swiper/js/swiper.min.js',
        'lib/aos/aos.js',
        'lib/Magnific-Popup/jquery.magnific-popup.min.js',
        'lib/sticky-sidebar/ResizeSensor.min.js',
        'lib/sticky-sidebar/theia-sticky-sidebar.min.js',
        'lib/lib.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
