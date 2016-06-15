<?php

namespace api\controllers;

use Yii;
use yii\web\Controller;

class MenuController extends Controller
{

    public function actionIndex()
    {

    	$wechat = Yii::$app->wechat;
    	/**会员卡*/
    	$cardUrl     = 'http://wechat.73chunk.com/final/api/web/index.php?r=site/vip';
    	$cardSvr 	 = $wechat->getOauth2AuthorizeUrl($cardUrl, $state = '73ChunVip', $scope = 'snsapi_base');

    	/**工资条*/
    	$stafUrl     = 'http://wechat.73chunk.com/final/api/web/index.php?r=wage/index';
    	$stafSvr     = $wechat->getOauth2AuthorizeUrl($stafUrl, $state = '73ChunStaf', $scope = 'snsapi_base');
    	
    	/**ChunK*/
    	$chunkUrl    = 'http://wechat.73chunk.com/final/frontend/web/index.php?r=catalog/list';
    	$chunkSvr    = $wechat->getOauth2AuthorizeUrl($chunkUrl, $state = '73ChunK', $scope = 'snsapi_base');
    	/********************************************************************************************************/
    	$menuButtons = array(
    			[
    					'type' => 'view',
    					'name' => '会员卡',
    					'url'  => $cardSvr
    			],
    			
    			[
		    			'type' => 'view',
		    			'name' => '员工专用',
		    			'url'  => $stafSvr
    			],
    	
//     			[
//     					'name' => '自助服务',
//     					'sub_button' => array(
    	
// //     							[
// //     									'type' => 'view',
// //     									'name' => '员工专用',
// //     									'url'  => $stafSvr,
// //     							],
    							 
//     							[
//     									'type' => 'view',
//     									'name' => 'think',
//     									'url'  => $chunkSvr,
//     							],
//     					),
    	
//     			]
    	);

    	$gDele = $wechat->deleteMenu();
    	$gCrem = $wechat->createMenu($menuButtons);
    	$gList = $wechat->getMenuList();
    	echo "<hr>";
    	echo date("Y-m-d H:i:s").'     =====>普通菜单重建执行完毕……'."<br><hr>";
    	echo "<pre>";
    	var_dump($gList);
    	echo "</pre>";
    	echo "<hr>"; 

    	$button = array(
    			[
    					'type' => 'view',
    					'name' => '会员卡',
    					'url'  => $cardSvr
    			],
    			
    			[
		    			'type' => 'view',
		    			'name' => '工资条',
		    			'url'  => $stafSvr
    			],
    			
    			[
		    			'type' => 'view',
		    			'name' => 'ThinK',
		    			'url'  => $chunkSvr
    			],
    	
//     			[
//     					'name' => 'ThinK',
//     					'sub_button' => array(
    	
//     							//     							[
//     							//     									'type' => 'view',
//     							//     									'name' => 'debug',
//     							//     									'url'  => $stafSvr,
//     							//     							],
    							 
//     							[
//     									'type' => 'view',
//     									'name' => 'test',
//     									'url'  => $chunkSvr,
//     							],
//     					),
    	
//     			]
    	);
    	$matchrule = array('group_id' => "102",
//     			'sex' => '1',
//     			'country' => '中国',
//     			'province' => '河北',
//     			'city' => '石家庄',
//     			'client_platform_type' =>'IOS'
    	);
 	 
    	    	echo "<pre>";
    	    	var_dump($this->createSytleMenu($button, $matchrule));
    	    	echo "</pre>";
    	    	echo "<hr>";
    }
    
    public function createSytleMenu($button, $matchrule)
    {
    	$wechat = Yii::$app->wechat;
 
    	foreach ($button as &$item){
    	
    		foreach ($item as $k => $v){
    	
    			if (is_array($v)){
    				//echo '我找到有二级菜单'."<hr>";
    				/**如果是一个多维数据，则罗列出二级菜单*/
    				foreach ($item[$k] as &$subitem){
    					foreach ($subitem as $k2 => $v2){
    						/**摘出二级菜单的type，name，url*/
    						$subitem[$k2] = urlencode($v2);
    					}
    				}
    			}else {
    				/**否则，就是没有找到二级菜单，直接显示一级菜单type,name,url*/
    				//echo '我找到了顶级菜单'."<hr>";
    				$item[$k] = urlencode($v);
    			}
    		}
    	}

    	if (isset($matchrule) && !is_null($matchrule)){

    		foreach ($matchrule as $k => $v){
    			$matchrule[$k] = urlencode($v);
    		}
    		$data = urldecode(json_encode(array('button' => $button,'matchrule' => $matchrule)));
    		$url = "https://api.weixin.qq.com/cgi-bin/menu/addconditional?access_token=".$wechat->getAccessToken($force = false);
    	}else {
    		echo 'I do not found matchrule';
    		$data = urldecode(json_encode(array('button' => $button)));
    		$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$wechat->getAccessToken($force = false);
    	}
    	$durl = "https://api.weixin.qq.com/cgi-bin/menu/delconditional?access_token=".$wechat->getAccessToken($force = false);
    	$res = $this->http_request($url,$data);
    	return json_decode($res, true);

    }
 
   
    function http_request($url, $data = null)
    {
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL, $url);
    	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    	if (!empty($data)){
    		curl_setopt($curl, CURLOPT_POST, 1);
    		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    	}
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    	$output = curl_exec($curl);
    	curl_close($curl);
    	return $output;
    }

}