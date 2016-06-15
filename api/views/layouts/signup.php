<?php

use yii\helpers\Html;
use api\assets\SignupAsset;

/**
 * 此处注册的Signup资源包供自身layout和actionSignup对应的视图渲染文件使用
 * 因此前，在SiteController控制器的actionSignup中有指定。
 */
SignupAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class=" login">
<?php $this->beginBody() ?>

<div class="content">
    <div class="login-form">
        <?= $content ?>
    </div>
</div>

<div class="copyright">Copyright(©) 2015-<?php echo date('Y') ;?> @ www.73ChunK.Com .</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
