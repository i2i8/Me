<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use andrew72ru\datepicker\DatePicker;

?>
<div class="register-formregister-form">
    <h3 class="form-title font-green">Join-Member</h3>

    <div class="login-form">
        <div class="form-group">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
				<!-- 这里使用field方法指把密码赋值给$model里password字段 --> 
                <?= $form->field($model, 'username')->textInput(array('autofocus' => true,'placeholder' => '姓名'))->label('UserName',['class'=>'label-class']) ?>

				<?= $form->field($model, 'gender')->inline()->radioList(['男'=>'男','女'=>'女'],['class'=>'label-group'])->label('Gender'); ?>		
				
				<?= $form->field($model,'birthday')->widget(DatePicker::className(),[
						'options' => [], // Html tag options
					    'pluginOptions' => [
					        'date-start-view' => 'day',
					        'date-format' => 'yyyy-mm-dd',
					        'date' => Yii::$app->formatter->asDate(time(), 'MM/dd/yy'),
					    ],
				]) ?>
				
				<?= $form->field($model, 'phonenum')->textInput(array('autofocus' => true,'placeholder' => '电话'))->label('PhoneNumber',['class'=>'label-class']) ?>
		
				<?= $form->field($model, 'openiden')->hiddenInput(array($model['openiden']))->label('',['class'=>'label-class']) ?>
                
                <div class="form-group">
                	<?= Html::submitButton('注&nbsp;册',['class' => 'btn btn-success uppercase','style'=>'width:300px;height:40px;margin:0 auto;display:block;font-size:1.3em;', 'name' => 'signup-button']) ?> 
                </div>

				
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
