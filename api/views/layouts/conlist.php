<?php

use yii\helpers\Html;
use api\assets\ConlistAsset;

ConlistAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
       
    <div class="container">
    <hr>
		<?= $content ?>
    <hr>
    </div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
