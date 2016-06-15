<?php

namespace api\controllers;

use Yii;
use api\models\Wage;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Staff;
use api\models\Member;

/**
 * WageController implements the CRUD actions for Wage model.
 */
class WageController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    /**
     * @第一步：通过用户点击自定义菜单后，获取code.
     */
    public function getCode()
    {
        $wechat = Yii::$app->wechat;
        $code = Yii::$app->request->get('code');
    
        if ($code === NUll) {
            echo $wechat->errorCode['41008']."<br><hr>";
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
        $gAccTk = $atATOP ['access_token'];
       
        //Yii::$app->cache->set ( 'access_token', $gAccTk, 7200 );    
        //如果真实获取用户openid且不为空，则将用户openid写入缓存
        if (null === $openId) {
    
            echo $wechat->errorCode['41009']."<br><hr>";
        }
        return $openId;
        
    }
	/**
	 * @第三步：员工专用菜单链接到actionIndex()方法
	 * 首先，通过第二步的openid，来比对数据库里是否有与其一样的openid，
	 * 有，则跳转到index并将相关数据传值给view层,
	 * 无，则警告。
	 */
    public function actionIndex()
    {
    	$this->layout = 'index';
        $findOpenid = $this->getOpenid ();
        $dataOpenid = Staff::findOne ( [
                'openid' => $findOpenid
        ] );

		if (null !== $dataOpenid)
		{
        	$result = Wage::find()->count();
        	if ($result === '0')
        	{
        		return '还未导入本月工资数据！';
        	}

        $model = Wage::find()
        		->andWhere(['flag'=>'201605'])
    	        ->where(['name'=>$dataOpenid['name']])
                ->asArray()
        		->one();

//         echo "<pre>";
//         var_dump($model);
//         echo "</pre>";
		}else {
        	//echo "您还未被加入员工名单！";
        	exit('您还未被加入员工名单！');
        }
//                 echo "<pre>";
//                 var_dump($model);
//                 echo "</pre>";
        //var_dump($model);

//         $dataProvider = new ActiveDataProvider([
//             'query' => Wage::find()
//     	        ->where(['name'=>$ckgName])
//                 ->andWhere(['flag'=>'201603']),
//         ]);
//exit();
        return $this->render('index', [
            'model' => $model,
        		//'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Wage model.
     * @param integer $id
     * @return mixed
     */
//     public function actionView($id)
//     {
//         return $this->render('view', [
//             'model' => $this->findModel($id),
//         ]);
//     }

    /**
     * Finds the Wage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Wage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
//     protected function findModel($id)
//     {
//         if (($model = Wage::findOne($id)) !== null) {
//             return $model;
//         } else {
//             throw new NotFoundHttpException('The requested page does not exist.');
//         }
//     }
}
