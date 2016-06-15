<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace api\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BalanceAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		'css/index/materialize.css',
		'css/index/style.css',
		//'css/index/custom-style.css',
		//'css/index/prism.css',
		//'css/index/perfect-scrollbar.css',
		//'css/index/chartist.min.css',
    	'css/index/reset.css',
    	'css/index/ck.css',
    	'css/index/creset.css',
    ];
    public $js = [
    	'scripts/chunk.js',
// 		'scripts/index/cuz.js',
// 		'scripts/index/materialize.js',
// 		'scripts/index/prism.js',
// 		'scripts/index/perfect-scrollbar.min.js',
// 		'scripts/index/chartist.min.js',
// 		'scripts/index/jquery.sparkline.min.js',
// 		'scripts/index/sparkline-script.js',
// 		'scripts/index/plugins.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
