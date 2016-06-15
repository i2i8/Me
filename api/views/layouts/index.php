<?php
use api\assets\IndexAsset;
use yii\helpers\Html;
// echo 'layout';
// exit();
IndexAsset::register ( $this );
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, mininum-scale=1.0, maximum-scale=1.0, user-scalable=yes"">
<meta content="application/xhtml+xml;charset=UTF-8"	http-equiv="Content-Type">
<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta content="no-cache" http-equiv="pragma">
<meta content="0" http-equiv="expires">
<meta content="telephone=no, address=no" name="format-detection">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <?= Html::csrfMetaTags()?>
<title><?= Html::encode($this->title) ?></title>
    <?php $this->head()?>
</head>
<body>
<?php $this->beginBody()?>
<div class=container>

	<?= $content?>
	
</div>
<!-- 
<footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
        Copyright(©) 2015-<?php echo date('Y') ;?> Www.73ChunK.Com.
      </div>
    </div>
</footer>
 -->
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
