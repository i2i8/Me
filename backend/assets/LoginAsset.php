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
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/login/font-awesome.min.css',
        'css/login/simple-line-icons.min.css',
        'css/login/bootstrap.min.css',
        'css/login/uniform.default.css',
        'css/login/bootstrap-switch.min.css',
        'css/login/select2.min.css',
        'css/login/select2-bootstrap.min.css',
        'css/login/components.min.css',
        'css/login/plugins.min.css',
        'css/login/login.css',
    ];
    public $js = [
    ];
    public $depends = [
//         'yii\web\YiiAsset',
  //    'yii\bootstrap\BootstrapAsset',
    ];
}
