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
class IndexAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    	/**Custome CSS*/
    	'css/index/custom.css',
    	/**CORE CSS*/
        'css/index/materialize.min.css',
        'css/index/style.min.css',
    	/**INCLUDED PLUGIN CSS ON THIS PAGE*/
        'css/index/perfect-scrollbar.css',
        'css/index/jquery-jvectormap.css',
        'css/index/chartist.min.css',
            
    ];
    public $js = [
    	/**jQuery Library*Feei会报错*/
        //'scripts/index/jquery-1.11.2.min.js',
    	/**materialize js*/
        'scripts/index/materialize.min.js',
    	/**scrollbar*/
        'scripts/index/perfect-scrollbar.min.js',
    	/**chartist*/
        'scripts/index/chartist.min.js',
    	/**chartjs*index会报错*/
        //'scripts/index/chart.min.js',
        //'scripts/index/chart-script.js',
    	/**sparkline*/
        'scripts/index/jquery.sparkline.min.js',
        'scripts/index/sparkline-script.js',
    	/**plugins*/
        'scripts/index/plugins.min.js',
        /**Toast Notification*/
        //'scripts/index/custom-script.js',
        //'scripts/index/jquery-2.2.3.js',
    ];
    public $depends = [
     	'yii\web\YiiAsset',
     	'yii\bootstrap\BootstrapAsset',
    ];
}
