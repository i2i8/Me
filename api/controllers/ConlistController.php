<?php

namespace api\controllers;

use Yii;
use api\models\Conlist;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;

/**
 * ConlistController implements the CRUD actions for Conlist model.
 */
class ConlistController extends Controller
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
     * Lists all Conlist models.
     * @return mixed
     */
    public function actionIndex()
    {
    	$session = Yii::$app->session;
    	$vipNum  = $session['vip_iden'];
    	if (null == $vipNum)
    	{
    		exit("<hr>Ꭿ！此乃火星地带，勿再探索！Ꭿ ！(*+﹏+*)~<hr>");
    	}
    	$this->layout = 'conlist';    	

        $dataProvider = new ActiveDataProvider([
            'query' => Conlist::find()->where(['KH'=>$vipNum])->orderBy('id desc'),
        	'pagination' => [
        	'pageSize' 	 => 8,
        	],
 
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Finds the Conlist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Conlist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Conlist::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
