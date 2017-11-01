<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    		'webAssets/plugins/ladda-bootstrap/dist/ladda-themeless.min.css',
    		'webAssets/plugins/sweet-alert/sweetalert.css',
    		'webAssets/css/site.css'
    ];
    public $js = [
    		'webAssets/plugins/ladda-bootstrap/dist/spin.min.js',
    		'webAssets/plugins/ladda-bootstrap/dist/ladda.min.js',
    		'webAssets/plugins/sweet-alert/sweetalert.min.js',
    		'webAssets/js/site.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        
    ];
}
