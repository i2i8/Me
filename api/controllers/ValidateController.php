<?php

namespace api\controllers;

use Yii;
use api\models\Member;
use api\models\Staff;
use api\models\Userinfo;
use api\models\Checkinout;
use api\models\VipMember;
use yii\web\Controller;

class ValidateController extends Controller
{
	
	public $enableCsrfValidation = false;

    public function actionIndex()
    {
//     	Yii::getLogger()->log(print_r($GLOBALS['HTTP_RAW_POST_DATA'], true), \yii\log\Logger::LEVEL_ERROR);
//     	Yii::getLogger()->log(print_r(Yii::$app->request->post(), true), \yii\log\Logger::LEVEL_ERROR);
    	//获取参数 token signature timestamp nonce  echostr
    	$token 		= 'ChunK';
    	$signature 	= Yii::$app->request->get('msg_signature');    	
    	$timestamp 	= Yii::$app->request->get('timestamp');
    	$nonce 		= Yii::$app->request->get('nonce');
    	$echostr 	= Yii::$app->request->get('echostr');
    	//创建数据，然后按字典序列排序
    	$array = array();
    	$array = array($nonce, $timestamp, $token);
    	sort($array);
    	//拼接成字符串，sha1加密，然后与signature进行校验
    	$str = sha1(implode($array));
    	if ($str == $signature && $echostr)
    	{
    		//第一次接入WeiXin api 接口验证
    		echo $echostr;
    		exit();
    	}else {
    		$this->reponseMsg();
    		//echo 'Ꭿ1Ꭿ';
    	}

    }

    //接收事件推送并回复
    
    private function reponseMsg()
    {
//     	if (null == Yii::$app->request->get('signature')){
//     		exit("<hr>Ꭿ！此乃火星地带，勿再探索！Ꭿ ！(*+﹏+*)~<hr>");
//     	}
    	//Yii::error("日志内容");
    	$wechat 	= Yii::$app->wechat;
    	$postArr	= $wechat->parseRequestData($xml = null);
    	$creTime	= date("Y-m-d H:i:s",$postArr['CreateTime']);

    	$cardUrl     = 'http://wechat.73chunk.com/api/frontend/web/index.php?r=site/vip';
    	$cardSvr 	 = $wechat->getOauth2AuthorizeUrl($cardUrl, $state = '73ChunVip', $scope = 'snsapi_base');
    	$articles = array([
    		      'title' => 'Welcome to 73ChunK KaraOKe.',
    		      'description' => "点我加入73唇K会员，尊享会员特权！\n-----------------------------------\n无线：73ChunK\n密码：88987373\n-----------------------------------\n回复73显示更多...",
    		      'url' => $cardSvr,
    		      'picurl' => 'http://wechat.73chunk.com/adv/api/web/images/public/sendNews.png'
    			 ]);
    	
    	//Yii::getLogger()->log(print_r($GLOBALS['HTTP_RAW_POST_DATA'], true), \yii\log\Logger::LEVEL_ERROR);
    	//Yii::getLogger()->log(print_r(Yii::$app->request->post(), true), \yii\log\Logger::LEVEL_ERROR);

    	$content	= "欢迎关注73唇K公众号！"."\n"."------------------------------"."\n".'WiFi:73ChunK'."\n".'密码:88987373'."\n"."------------------------------"."\n".$creTime;

    	if (strtolower($postArr['MsgType']) == 'event')
    	{
    		//如果是关注 subscribe 事件
    	   	if (strtolower($postArr['Event'] == 'subscribe'))
    	   	{
    	   		//回复用户消息
    	   		//$wechat->sendText($postArr['FromUserName'], $content);
    	   		return $wechat->sendNews($postArr['FromUserName'], $articles);

    	   	}
    	   	
    	}
    	$selTime	= date("Y-m-d H:i:s");
    	if (strtolower(trim($postArr['MsgType']) == 'text'))
    	{
 
    		switch ($postArr['Content'])
    		{
    			case "1":
    				return $wechat->sendText($postArr['FromUserName'], '当前暂无优惠活动.');
    				break;
    			case "5":
    				return $wechat->sendText($postArr['FromUserName'], $this->balance());
    				break;
    			case "6":
    				return $wechat->sendText($postArr['FromUserName'], "0311-88967373\n0311-88987373");    				
    				break;
    			case "7":
    				return $wechat->sendText($postArr['FromUserName'], '石家庄市裕华区槐安路育才街交汇怀特商业广场四层东邻.');
    				break;
    			case "8":
    				return $wechat->sendText($postArr['FromUserName'], '槐安路育才街往西约10米右转入地库，至负二层，右转往东至A079停车位附近电梯，直接上四楼.');
    				break;
    			case "9":
    				return $wechat->sendNews($postArr['FromUserName'], $articles);
    				break;
    			case "73":
    				return $wechat->sendText($postArr['FromUserName'], "请回复如下纯数字\n------------------------\n① ：最新优惠.\n⑤ ：查询会员余额.\n⑥ ：联系电话.\n⑦ ：详细地址.\n⑧ ：停车地库至73唇K.\n⑨ ：返回公众号主屏\n------------------------\n$selTime");
    				break;
    			//请求任意字符串，回复单图文.
    			/**
    			default:
    				return $wechat->sendText($postArr['FromUserName'], "请回复如下纯数字\n------------------------\n① ：最新优惠.\n⑤ ：查询会员余额.\n⑥ ：联系电话.\n⑦ ：详细地址.\n⑧ ：停车地库至73唇K.\n⑨ ：返回公众号主屏\n------------------------\n$selTime");
    				break; 
				*/
    		}

    		$validateOpenid = Staff::findOne ( [
    				'openid' => $postArr['FromUserName']
    		] );

    		$session = Yii::$app->session;
   		
    		/**将用户卡号存入session*/
    		$session['NO']  = $validateOpenid['NO'];
    		$session['name']  = $validateOpenid['name'];
  		
    		if (null != $validateOpenid){
    			
    			switch ($postArr['Content'])
    			{
    				case "a":
    					//return $wechat->sendText($postArr['FromUserName'], '➲=====----'.$session['name'].'----====='."\n".'------------------------------'."\n".'↟：'.$this->inToday()."\n".'↡：'.$this->outToday()."\n".'------------------------------');
    					//return $wechat->sendText($postArr['FromUserName'], '====---❤'.$session['name'].'♥---===='."\n".'------------------------------'."\n".'↟：'.$this->inToday()."\n".'↡：'.$this->outToday()."\n".'------------------------------');
    					return $wechat->sendText($postArr['FromUserName'], '===---❤'.$session['name'].'♥---==='."\n".'---------------------------'."\n".'↟：'.$this->inToday()."\n".$this->validateToday()."\n".'---------------------------');
    					break;
    				case "本月":
    					return $wechat->sendText($postArr['FromUserName'], $this->reMonth());
    					break;
//     				case "6":
//     					return $wechat->sendText($postArr['FromUserName'], "0311-88967373\n0311-88987373");
//     					break;
//     				case "7":
//     					return $wechat->sendText($postArr['FromUserName'], '石家庄市裕华区槐安路育才街交汇怀特商业广场四层东邻.');
//     					break;
//     				case "8":
//     					return $wechat->sendText($postArr['FromUserName'], '槐安路育才街往西约10米右转入地库，至负二层，右转往东至A079停车位附近电梯，直接上四楼.');
//     					break;
//     				case "9":
//     					return $wechat->sendNews($postArr['FromUserName'], $articles);
//     					break;
//     					//请求任意字符串，回复单图文.
//     				default:
//     					return $wechat->sendText($postArr['FromUserName'], "请回复如下纯数字\n------------------------\n① ：最新优惠.\n⑤ ：查询会员余额.\n⑥ ：联系电话.\n⑦ ：详细地址.\n⑧ ：停车地库至73唇K.\n⑨ ：返回公众号主屏\n------------------------\n$selTime");
//     					break;
    			}
    		}
			if ($postArr['FromUserName'] == 'oGD8IuNM61CuSymDi_vkT-ks8U1M'){
				
				switch ($postArr['Content'])
				{
					case "c":
						return $wechat->sendText($postArr['FromUserName'], $this->ckger());
						break;
					case "本月":
						return $wechat->sendText($postArr['FromUserName'], $this->reMonth());
						break;
						//     				case "6":
						//     					return $wechat->sendText($postArr['FromUserName'], "0311-88967373\n0311-88987373");
						//     					break;
						//     				case "7":
						//     					return $wechat->sendText($postArr['FromUserName'], '石家庄市裕华区槐安路育才街交汇怀特商业广场四层东邻.');
						//     					break;
						//     				case "8":
						//     					return $wechat->sendText($postArr['FromUserName'], '槐安路育才街往西约10米右转入地库，至负二层，右转往东至A079停车位附近电梯，直接上四楼.');
						//     					break;
						//     				case "9":
						//     					return $wechat->sendNews($postArr['FromUserName'], $articles);
						//     					break;
						//     					//请求任意字符串，回复单图文.
						//     				default:
						//     					return $wechat->sendText($postArr['FromUserName'], "请回复如下纯数字\n------------------------\n① ：最新优惠.\n⑤ ：查询会员余额.\n⑥ ：联系电话.\n⑦ ：详细地址.\n⑧ ：停车地库至73唇K.\n⑨ ：返回公众号主屏\n------------------------\n$selTime");
						//     					break;
				}
			}

    	}
    	
    	


   }
	//查询卡上余额   
	private function balance()
	{
		$selTime	= date("Y-m-d H:i:s");
		$wechat 	= Yii::$app->wechat;
		$postArr	= $wechat->parseRequestData($xml = null);
		
		$ckerInfo = Member::findOne ( [
				'openiden' => $postArr['FromUserName']
		] );
		if (null == $ckerInfo)
		{
			
			return "您还未注册成为我们的会员.";
			
		}else {
		$vip_iden = $ckerInfo['vip_iden'];
		$vodIden  = VipMember::find()
				->where(['KH'=>$vip_iden])
				->one();

		return '卡上余额'.'  '.$vodIden['JE'].'  元'."\n".$selTime;
		//return '暂未开放.';
		}
	}

	private function inToday()
	{
		$session = Yii::$app->session;
	
		$NO = $session['NO'];
	
		$kUser  = Userinfo::find()
							->where(['BADGENUMBER'=>$NO])
							->one();
		//上班时间大于前一天晚上的八点，即算上班，主要针对于夜班的上班打卡
		$uxDate   = strtotime(date("Y-m-d 00:00:00"))-4*3600;
		$date	  = date("Y-m-d H:i:s",$uxDate);
		$retime = Checkinout::find()
							->andWhere(['USERID' => $kUser['USERID']])
							->andWhere(['CHECKTYPE' => 'I'])
							->andWhere (['>=','CHECKTIME',$date])
							->max('CHECKTIME');
		
// 		$beforeTime = Checkinout::find()
// 							->andWhere(['USERID' => $kUser['USERID']])
// 							->andWhere(['CHECKTYPE' => 'I'])
// 							->max('CHECKTIME');
		//return $retime ? $retime : '今天没打上班卡';
		return $retime;
	
	}
	
	private function outToday()
	{
		$session = Yii::$app->session;

		$NO = $session['NO'];		
	
		$kUser  = Userinfo::find()
							->where(['BADGENUMBER'=>$NO])
							->one();

		$retime = Checkinout::find()
							->andWhere(['USERID' => $kUser['USERID']])
							->andWhere(['CHECKTYPE' => 'O'])
							->andWhere(['>=','CHECKTIME',date("Y-m-d 00:00:00")])
							->max('CHECKTIME');
		//如果下班时间减去上班时间小于8小时，则显示上班时长，反之，显示上班时间及下班时间……		
		//return ((strtotime($retime)-strtotime($this->inToday())) <= 8*3600) ? '上班中……' : $retime;
		return $retime;
				
	}
	
	private function validateToday()
	{
		$in   = $this->inToday();
		$ou   = $this->outToday();
		$uxIn = strtotime($this->inToday());
		$uxOu = strtotime($this->outToday());

		if (null === $uxOu && null !== $uxIn  && strtotime("now") > $uxOu)
				{
					$workLong = ($uxOu-$uxIn);
				}else {
					$uxIn ? $workLong = (strtotime("now")-$uxIn) : '没打上班考勤，无工作时长.' ;
				}				
			
				$hour    = floor($workLong/3600); 	//从这个时间戳中换算出剩余的小时数
				$long    = $workLong-$hour*3600; 	//从时间戳中去掉小时的秒数，就剩下分的秒数
				$minute  = floor($long/60); 		//从这个时间戳中换算出剩余的分数
				$second1 = $long-$minute*60; 		//最后只有剩余的秒数了
				
				$elsTimes = '↡：'.$hour.'小时'.$minute.'分钟'.$second1.'秒';

			
				$longTimes  = $elsTimes."\n".'↡：'.$ou;	
				
				
		//return $ou;
		return ($uxOu-$uxIn) >= 8*3600 ? $longTimes : $elsTimes."\n".'↡：还没打下班考勤.';

	}
	
	public function actionCkger()
	{
		
		$model =[];
		$model ['duanyawei']   = '73007356';
		$model ['lishengmian'] = '73005097';
		//$model ['qifei']   	   = '73005062';
		$model ['liyijun']     = '99999999';
		$model ['wangshua']    = '73006915';
		
		$result = Staff::find()
						->where(['NO' => $model])->asArray()
						->all();

						
		$kUser  = Userinfo::find()
						->where(['BADGENUMBER' => $model])->asArray()
						->all();
		
		
// 		$retime = Checkinout::find()
// 						->andWhere(['USERID' => $kUser[1]['USERID']])
// 						->andWhere(['CHECKTYPE' => 'I'])
// 						->max('CHECKTIME');
			echo "<pre>";
			var_dump($kUser);
			echo "</pre>";
						
// 		return [
// 				"ToUserName"=>(string)$postObject->FromUserName,
// 				"FromUserName"=>(string)$postObject->ToUserName,
// 				// ...
// 		];
	}
}