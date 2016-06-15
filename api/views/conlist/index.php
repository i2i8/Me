<?php

use kartik\grid\GridView;
use api\models\CondetailsSearch;
use yii\helpers\Url;

$this->title = '消费清单';

?>
<div class="conlist-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
    	'pjax'=>true,
    	'pager' => [
    			'firstPageLabel' => '首页',
    			'lastPageLabel'  => '末页',
    			'prevPageLabel'  => '上页',
    			'nextPageLabel'  => '下页',
    			'maxButtonCount' => 3,
    	],
     	'panel' => [
     			'type' => GridView::TYPE_PRIMARY,
     			'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-repeat"></i>  消费清单</h3>',
     	],

		/**隐藏右上角的转换导出按钮*/
    	'toolbar' => [
    			'{toggleData}'
    	],
    	
        'columns' => [

        	['class' => 'kartik\grid\ExpandRowColumn',

             'value' => function ($model, $key, $index, $column){
             	return Gridview::ROW_COLLAPSED;
    			},

         	 'detail' => function ($model, $key, $index, $column){
        	    	$searchModel = new CondetailsSearch();
            	 	$searchModel->Serial = $model->bz;
             		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

         	  return Yii::$app->controller->renderPartial('_condetails',[
           			'model'		   => $model,
           			//'detai'        => $detai,
           			'searchModel'  => $searchModel,
           			'dataProvider' => $dataProvider,
             			
           		]);
    		},
    		//'detailUrl' => Url::to('site/index'),
            ],

            //'id',
           // 'KH',
            'XFRQ',
            //'XFJE',
            //'JF',
            // 'bz',
            // 'JBR',
            // 'cye',
            // 'xye',
            // 'CurDay',
            // 'CYE1',
            // 'XFJE1',
            // 'KJE',
            // 'XYE1',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
