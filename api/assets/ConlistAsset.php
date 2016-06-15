<?php

namespace api\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class ConlistAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

    ];
    public $js = [
    	'scripts/chunk.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
