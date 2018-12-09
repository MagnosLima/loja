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
class AgencyAsset extends AssetBundle
{
    public $basePath = '@webroot/agency';
    public $baseUrl = '@web/agency';
    public $css = [
        'vendor/bootstrap/css/bootstrap.min.css',
        'css/agency.min.css',
        'vendor/fontawesome-free/css/all.min.css',
        'css/fonts_googleapis_com_css1.css',
        'css/fonts_googleapis_com_css2.css',
        'css/fonts_googleapis_com_css3.css',
        'css/fonts_googleapis_com_css4.css'
    ];
    public $js = [        
        'vendor/jquery/jquery.min.js',
        'vendor/bootstrap/js/bootstrap.bundle.min.js',
        'vendor/jquery-easing/jquery.easing.min.js',
        'js/jqBootstrapValidation.js',
        'js/contact_me.js',
        'js/agency.min.js'
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
