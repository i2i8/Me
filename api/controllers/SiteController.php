<?php
namespace api\controllers;

use Yii;
use yii\web\Controller;
use api\models\SignupForm;
use api\models\Member;
use api\models\VipMember;

/**
 * Site controller
 */
class SiteController extends Controller
{
	/**
	 * @第一步：通过用户点击自定义菜单后，获取code.
	 */
	public function getCode() 
	{
		$wechat = Yii::$app->wechat;
		$code = Yii::$app->request->get('code');
		
		if ($code === NUll) {
			return $this->redirect('index.php?r=site/signup');
		}
		
		return $code;
	}
	/**
	 * @第二步：通过code，获取用户openid.
	 */
	public function getOpenid() 
	{
		
		$wechat = Yii::$app->wechat;
		$atATOP = $wechat->getOauth2AccessToken ( $this->getCode (), $grantType = 'authorization_code' );
		$openId = $atATOP ['openid'];

		if (null === $openId) {

			echo $wechat->errorCode['41009']."<br><hr>";
		}

		return $openId;
		
	}
	/**
	 * @第三步：此为关键，用户的自定义菜单是直接链接到actionVip()方法的
	 * 首先，通过第二步的openid，来比对数据库里是否有与其一样的openid，
	 * 有，则跳转到index并将此openid传值给index,
	 * 无，则跳转到signup并将此openid传值给signup.
	 */
	public function actionVip() 
	{
		$findOpenid = $this->getOpenid ();

		$dataOpenid = Member::findOne ( [ 
				'openiden' => $findOpenid 
		] );

		if (isset ( $dataOpenid ) ) {
			$uid = $dataOpenid['id'];

			//这样直接跳转也可以
			//return $this->redirect('index.php?r=site/index');
			return $this->redirect(array('index','openid'=>$findOpenid));
		} else {
			//注意，这一步以及以上一步，都要用return返回，而不能直接用诸如$this之类的。
			return $this->redirect(array('signup','openid'=>$findOpenid));
		}
	}
	/**
	 * @第四步第一小步：此时，由上面的actionVip方法跳转而来，并且随其一并将openid也传了过来。
	 * 	 */
	public function actionIndex() 
	{

		/**接收全局传来的openid*/
		$findOpenid = Yii::$app->request->get('openid');
		
		if (null == $findOpenid)
		{
			return $this->redirect('index.php?r=site/signup');
		}

		/**通过openid查询会员信息*/
		$dataOpenid = Member::findOne ( [
				'openiden' => $findOpenid
		] );
		$wechat = Yii::$app->wechat;
		$member = $wechat->getMemberInfo($findOpenid, $lang = 'zh_CN');

		$session = Yii::$app->session;
		/**无需要执行session开启，当使用session组件访问session数据时候，如果session没有开启会自动开启，$session->open()*/

		/**将用户卡号存入session*/
 		$session['vip_iden']  = $dataOpenid['vip_iden'];
 		$session['phone']	  = $dataOpenid['phonenum'];
 		
		$this->layout = 'index';
		$model =[];
		$model ['nickname']   = $member['nickname'];
		$model ['sex']        = $member['sex'];
		$model ['city'] 	  = $member['city'];
		$model ['province']   = $member['province'];
		$model ['headimgurl'] = $member['headimgurl'];
		$model ['phonenum']	  = $dataOpenid ['phonenum'];
		$model ['username']	  = $dataOpenid ['username'];
		$model ['vip_iden']	  = $dataOpenid ['vip_iden'];
		$model ['birthday']   = $dataOpenid ['birthday'];
		$model ['created_at'] = $dataOpenid ['created_at'];
		return $this->render ( 'index', [ 
				'model' => $model 
		] );
	}
	/**
	 * @第四步第二小步：此时，由上面的actionVip方法跳转而来，并且随其一并将openid也传了过来。
	 * */
	public function actionSignup() 
	{
		$findOpenid = Yii::$app->request->get ( 'openid' );

		$this->layout = 'signup';
		$model = new SignupForm ();
		//将openid赋值给model的openiden元素，随前台post过来的数据一并入库
		$model['openiden'] = $findOpenid;
		//将会员号码赋值给model的vip_iden元素，随前台post过来的数据一并入库
		$model['vip_iden'] = $this->getNextKH();
		$session = Yii::$app->session;
		$session['KH']=$model['vip_iden'];
		if ($model->load ( Yii::$app->request->post () )) {

			if ($user = $model->signup()) {
				//通过session中的卡号获取刚刚注册会员信息
				//$uBase  = Member::find()->where(['vip_iden' => $session['KH']])->one();
				$uBase  = Member::find()->where(['vip_iden' => $model['vip_iden']])->one();
				
				$vodsy  = new VipMember();
				$mbr_id = VipMember::find()->max('id');

				$id    	= $mbr_id;
				$id	   	= $id+1;
				$KH    	= $uBase['vip_iden'];
				$KL    	= "0000";

				$KFRQ  	= date("Y-m-d H:i");
				$YXQ   	= "2099-01-01";

				$XM    	= iconv('utf-8','gbk',$uBase['username']);
 				$XB    	= iconv('utf-8','gbk',$uBase['gender']);
				$ZT    	= iconv('utf-8','gbk','可用');
				$CSRQ  = $uBase['birthday'];
				$YDDH  	= $uBase['phonenum'];
				$JFQL  	= '';

				$rqkind	= 0;
				$CurDay	= date("Y-m-d");
				$vodsy->id = $id;
				//卡号
				$vodsy->KH = $KH;
				$vodsy->YKH = '';
				$vodsy->XKH = '';
				$vodsy->MM = '';
				//卡类型：0000(普通卡)，0001（SVIP卡）
				$vodsy->KL = $KL;
				$vodsy->KJ = '';
				$vodsy->JF = '0';
				$vodsy->LJJF = '0';
				$vodsy->ZK = '0';
				$vodsy->JE = '0.0';
				$vodsy->ljck = '0.0';
				$vodsy->XFCS = '0';
				//开房日期
				$vodsy->KFRQ = $KFRQ;
				$vodsy->SCXF = '';
				//状态
				$vodsy->ZT = $ZT;
				//有效期
				$vodsy->YXQ = $YXQ;
				//卡备注
				$vodsy->KBZ = '';
				//姓名
				$vodsy->XM = $XM;
				//性别
				$vodsy->XB = $XB;
				//出生日期
				$vodsy->CSRQ = $CSRQ;
				//单位
				$vodsy->DW = '';
				//移动电话
				$vodsy->YDDH = $YDDH;
				//固定电话
				$vodsy->GDDH = '';
				//电子邮件
				$vodsy->DZYJ = '';
				//证件类型
				$vodsy->ZJLX = '';
				//证件号码
				$vodsy->ZJHM = '';
				//联系地址
				$vodsy->LXDZ = '';
				//所属星座
				$vodsy->SSXZ = '-';
				//所属属相
				$vodsy->SSSX = '-';
				//所属国籍
				$vodsy->SSGJ = '';
				//所属地区
				$vodsy->SSDQ = '';
				$vodsy->JSR = '';
				//身高
				$vodsy->SG = '';
				//体重
				$vodsy->TZ = '';
				//车牌号码
				$vodsy->CPHM = '';
				//个人爱好
				$vodsy->GRAH = '';
				//备注
				$vodsy->BZ = '';
				$vodsy->JFQL = $JFQL;
				$vodsy->cyjf = '';
				$vodsy->kkh = '';
				$vodsy->rqKind = $rqkind;
				//第二生日
				$vodsy->csrq2 = '';
				$vodsy->CurDay = $CurDay;
				$vodsy->JE1 = '0.0';
				$vodsy->OpenJE = '0.0';
				$vodsy->OpenJE1 = '0.0';
				$vodsy->OpenJE0 = '0.0';
				$vodsy->kh_1 = '';
				$vodsy->kh_2 = '';
				$vodsy->kh_3 = '';
				$vodsy->kh_4 = '';
				$vodsy->kh_5 = '';

				$vodsy->save() ? $vodsy : null;
				//此时，如果执行了signup方法，也就是说用户提交了注册按钮后，下一步返回到index方法，并将openid一并传过去
				$this->redirect(array('index','openid'=>$findOpenid));

			}

		}

		return $this->render ( 'signup', [ 
				'model' => $model 
		] );
	}
	


	public function getNextKH()
	{
		//找到符合自动注册条件的id
		$vid    = Member::find()
						->andWhere(['flag' => '1'])
						->max('id');
		
		$uBase  = Member::find()->where(['id' => $vid])->one();

		$KH    = $uBase['vip_iden'];
		$nextKH   = $KH += 1;

		while(!empty(strstr($nextKH,"4"))){
			
			$nextKH++;
		}

		return $nextKH;

	}
	

	public function actionRemind() 
	{
		$this->layout = 'remind';
		return $this->render ( 'remind' );
	}
	
	public function actionBalance()
	{
		$this->layout = 'balance';
		$session = Yii::$app->session;
		/**无需要执行session开启，当使用session组件访问session数据时候，如果session没有开启会自动开启**/
		$vip_iden = $session['vip_iden'];
		$balance  = new VipMember();
		$vodIden  = VipMember::find()
				->where(['KH'=>$vip_iden])
				->one();
		$model 		  = [];
		$model ['JE'] = $vodIden['JE'];

		return $this->render ( 'balance', [
				'model' => $model
		] );
	}
}
