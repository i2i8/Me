<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '会员列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // echo  Html::a('Create Member', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    
	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'vip_iden',
            'username',
            'gender',
            'phonenum',
            'openiden',
            'birthday',
            // 'flag',
            // 'modified',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'auth_key',
            // 'password_hash',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>

</div>
