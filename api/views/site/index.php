<?php

use yii\helpers\Url;

$this->title = '会员中心';
?>

<div class="main_center">

	<div class="vip_card analyze_parent">
		<img src=<?= Url::to('@web/images/index/card.png'); ?> class="member_card_img">
	  <div class="line_gold">
	  <h5><?= $model['username'];?></h5>

	  <div class="Uname">
	    <div class="jibie">
	    <div class="contant clear_fix">
	    	<span id="erweima"><canvas width="60" height="60"></canvas></span>
		    <p>
			    <span id="level"><var class="star"></var><var class="star"></var><var class="star"></var><var class="star"></var><var class="star"></var><a class="question" href="toMemberNoticePage.action"></a></span>
		    </p>
		    <p style="font-size:3.9em">

		    <?= $model['vip_iden'];?>

		    </p>
	      </div>
	     </div>
	   </div>
	  <p class="line_gold2"><img src=<?= Url::to('@web/images/index/line_gold.png'); ?>></p>
	  </div>

	</div>

    <a class="member_know" href="<?= Url::to(['#']); ?>"><img src=<?= Url::to('@web/images/index/arrow_r.png'); ?> class="arrow"><p>会员须知</p></a>
	<table class="personal_table" >
		<tbody>
			<tr>
				<td class="analyze_parent"><a href="<?= Url::to(['conlist/index']); ?>"><img src=<?= Url::to('@web/images/index/dingdan.png'); ?>><br>消费明细</a></td>
				<td class="analyze_parent"><a href="#"><img	id="paihao" src=<?= Url::to('@web/images/index/paihao.png'); ?>><br>寄存单</a></td>
				<td id="redPacket" class="analyze_parent"><a href=""><img src=<?= Url::to('@web/images/index/youhuijuan.png'); ?>><br>代金券</a></td>
				<td class="analyze_parent"><a href=<?= Url::to(['site/balance']); ?>><img	src=<?= Url::to('@web/images/index/jifen.png'); ?>><br>余额查询</a></td>
			</tr>

		</tbody>
	</table>
	
	<hr>
	<div style="text-align:left;">
	<p><!-- 
		<span>昵称：<?= $model['nickname'];?></span><br>
		<span>来自：<?= $model['province'];?> <?= $model['city'];?></span><br>
		 
		<span>电话：<?= $model['phonenum'];?></span>
		-->
	</p>
	<hr />
    </div>
    </div>


<!--/ profile-page-header -->  