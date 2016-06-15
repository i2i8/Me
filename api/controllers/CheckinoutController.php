<?php

namespace api\controllers;

use Yii;
use api\models\Checkinout;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CheckinoutController implements the CRUD actions for Checkinout model.
 */
class CheckinoutController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Checkinout models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Checkinout::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Checkinout model.
     * @param string $CHECKTIME
     * @param integer $USERID
     * @return mixed
     */
    public function actionView($CHECKTIME, $USERID)
    {
        return $this->render('view', [
            'model' => $this->findModel($CHECKTIME, $USERID),
        ]);
    }

    /**
     * Creates a new Checkinout model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Checkinout();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'CHECKTIME' => $model->CHECKTIME, 'USERID' => $model->USERID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Checkinout model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $CHECKTIME
     * @param integer $USERID
     * @return mixed
     */
    public function actionUpdate($CHECKTIME, $USERID)
    {
        $model = $this->findModel($CHECKTIME, $USERID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'CHECKTIME' => $model->CHECKTIME, 'USERID' => $model->USERID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Checkinout model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $CHECKTIME
     * @param integer $USERID
     * @return mixed
     */
    public function actionDelete($CHECKTIME, $USERID)
    {
        $this->findModel($CHECKTIME, $USERID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Checkinout model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $CHECKTIME
     * @param integer $USERID
     * @return Checkinout the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($CHECKTIME, $USERID)
    {
        if (($model = Checkinout::findOne(['CHECKTIME' => $CHECKTIME, 'USERID' => $USERID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
