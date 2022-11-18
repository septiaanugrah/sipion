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
        'css/site.css',
        'css/fix-layout.css',
        'css/fix-select2.css',
        'css/fix-buttonGroup.css',
        'css/fix-tabx.css',
        'css/fix-blink.css',
    ];
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.min.js',
        'js/real-time.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
