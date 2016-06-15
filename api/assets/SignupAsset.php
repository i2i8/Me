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
class SignupAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    	//布局配色
    	'css/signup/bootstrap.min.css',
		//背景布局
    	'css/signup/login.css',
    	
    ];
    public $js = [
    	//字段验证
//       	'scripts/signup/jquery.min.js',
//      	'scripts/moment.min.js',
    	'scripts/chunk.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
