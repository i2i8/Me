<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MetAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/index/materialize.min.css',
        'css/index/style.min.css',
        //'css/index/custom.min.css',
        'css/index/perfect-scrollbar.css',
        'css/index/jquery-jvectormap.css',
        'css/index/chartist.min.css',
            
    ];
    public $js = [
        //'scripts/index/jquery-1.11.2.min.js',
//         'scripts/index/materialize.min.js',
//         'scripts/index/perfect-scrollbar.min.js',
//         'scripts/index/chartist.min.js',
//         'scripts/index/chart.min.js',
//         'scripts/index/chart-script.js',
        //'scripts/index/jquery.sparkline.min.js',
//         'scripts/index/sparkline-script.js',
//         'scripts/index/plugins.min.js',
        'scripts/index/jquery-2.2.3.js',
        'scripts/index/custom-script.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
