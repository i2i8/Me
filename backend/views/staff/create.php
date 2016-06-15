<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Staff */

$this->title = '添加新员工';
$this->params['breadcrumbs'][] = ['label' => '员工列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
