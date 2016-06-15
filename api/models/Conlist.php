<?php

namespace api\models;

use Yii;

class Conlist extends \yii\db\ActiveRecord
{	
	
	public function getList()
	{
	
		return $this->hasOne(Condetails::className(), ['Serial' => 'bz']);
		//->viaTable('vod_RoomHisFeeD', ['Serial' => 'bz']);
	}
	
	public function getData()
	{

		return $this->hasMany(Conhisd::className(), ['Serial' => 'bz']);
		//->viaTable('vod_RoomHisFeeD', ['Serial' => 'bz']);
	}

	public function getFeed()
	{
	
		return $this->hasMany(Conhisd::className(), ['Serial' => 'bz']);
		//->viaTable('vod_RoomHisFeeD', ['Serial' => 'bz']);
	}
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vip_XiaoFei';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbvodsy');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'JF'], 'integer'],
            [['KH', 'XFRQ', 'bz', 'JBR', 'CurDay'], 'string'],
            [['XFJE', 'cye', 'xye', 'CYE1', 'XFJE1', 'KJE', 'XYE1'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'KH' => 'Kh',
            'XFRQ' => '☜展开折叠全部',
            'XFJE' => '消费金额：',
            'JF' => 'Jf',
            'bz' => 'Bz',
            'JBR' => 'Jbr',
            'cye' => 'Cye',
            'xye' => 'Xye',
            'CurDay' => 'Cur Day',
            'CYE1' => 'Cye1',
            'XFJE1' => 'Xfje1',
            'KJE' => 'Kje',
            'XYE1' => 'Xye1',
        ];
    }
    
	
    public static function primaryKey()
    {
    	return ['id']; // TODO: Change the autogenerated stub
    }
}
