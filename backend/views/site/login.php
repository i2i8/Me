<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>


        <div class="login-form">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
			<div class="form-group">
                <?= $form->field($model, 'username')->input('text',['style'=>'width:280px','autofocus' => true]) ?>
			</div>
			
			<div class="form-group">
                <?= $form->field($model, 'password')->input('password',['style'=>'width:280px']) ?>
            </div>
            <div class="form-actions" style="margin:0 20px;float:right;">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>


                    <?= Html::submitButton('登陆', ['class' => 'class="btn btn-success uppercase pull-right"', 'name' => 'login-button']) ?>

			</div>
            <?php ActiveForm::end(); ?>
        </div>

</div>
