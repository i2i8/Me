<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Wage */

// $this->title = $model->name;
// $this->params['breadcrumbs'][] = ['label' => 'Wages', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="wage-view">

<table class="table table-bordered">

<p class="text-center bg-info h4"><samp><?= "2016年五月份工资条"; ?></samp></p>
	<tr>
	  <td class="info">员工姓名</td>
	  <td class="active"><?= $model['name']?></td>
	  <td class="info">现任职务</td>
	  <td class="active"><?= $model['zhiWu']?></td>
	</tr>
	<tr>
	  <td class="info">基本工资</td>
	  <td class="active"><?= $model['baseGZ'] . "元";?></td>
	  <td class="info">职务工资</td>
	  <td class="active"><?= $model['jobGZ'] . "元";?></td>
	</tr>
	<tr>
	  <td class="info">应出勤天</td>
	  <td class="active"><?= $model['yCQ'] . "天";?></td>
	  <td class="info">实出勤天</td>
	  <td class="active"><?= $model['yCQ'] . "天";?></td>
	</tr>
	
	<tr>
	  <td class="info">全勤奖励</td>
	  <td class="active"><?= $model['fullWork'] . "元";?></td>
	  <td class="info">迟到罚款</td>
	  <td class="active"><?= $model['late'] . "元";?></td>
	</tr>
	
	<tr>
	  <td class="info">售卡提成</td>
	  <td class="active"><?= $model['salesCard'] . "元";?></td>
	  <td class="info">售酒提成</td>
	  <td class="active"><?= $model['salesDrink'] . "元";?></td>
	</tr>
	
	<tr>
	  <td class="info">杯子损耗</td>
	  <td class="active"><?= $model['cups'] . "元";?></td>
	  <td class="info">节日奖金</td>
	  <td class="active"><?= $model['holidays'] . "元";?></td>
	</tr>
	
	<tr>
	  <td class="info">扣退奖罚</td>
	  <td class="active"><?= $model['others'] . "元";?></td>
	  <td class="info">销售提成</td>
	  <td class="active"><?= $model['salesFood'] . "元";?></td>
	</tr>

</table>
<table class="bg-primary">备注描述：<?= $model['des'];?></table>
<hr style="height: 2px; border: none; border-top: 2px double red;" />
	<blockquote class="blockquote-reverse">
		实发工资：<span style= "color: red;font-size:1.5em;font-weight:bold;"><?= $model['total'];?></span>&nbsp元<br>
	</blockquote>
</div>
