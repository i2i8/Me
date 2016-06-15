<hr>
<div class="col s12 m6 l3">
	<div class="card">
		<div class="card-content purple white-text">
			<p class="card-stats-title" style="align:center">
				当前储值余额				
			</p>
			<br>
			<h4 class="card-stats-number"></h4>
			<p class="card-stats-compare" style="font-size: 2em">
				<?= $model['JE'];?>元<span
					class="purple-text text-lighten-5"></span>
			</p>
		</div>
		<div class="card-action purple darken-2">
			<div id="sales-compositebar" class="center-align" style="color:white">
				<canvas width="214" height="25"
					style="display: inline-block; width: 214px; height: 25px; vertical-align: top;"></canvas>
					<br>查询时间：<?= date('Y-m-d H:i:s');?>
			</div>
			
		</div>
	</div>
</div>
<hr>