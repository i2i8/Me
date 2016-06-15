<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "CHECKINOUT".
 *
 * @property integer $USERID
 * @property string $CHECKTIME
 * @property string $CHECKTYPE
 * @property integer $VERIFYCODE
 * @property string $SENSORID
 * @property string $Memoinfo
 * @property string $WorkCode
 * @property string $sn
 * @property integer $UserExtFmt
 */
class Checkinout extends \yii\db\ActiveRecord
{
	public function getUserinfo()
	{
		// 员工考勤记录和基本信息通过USERID => USERID 关联建立多对一关系
		return $this->hasOne(Userinfo::className(), ['USERID' => 'USERID']);
	}
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CHECKINOUT';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbaction');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USERID'], 'required'],
            [['USERID', 'VERIFYCODE', 'UserExtFmt'], 'integer'],
            [['CHECKTIME'], 'safe'],
            [['CHECKTYPE', 'SENSORID', 'Memoinfo', 'WorkCode', 'sn'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USERID' => 'Userid',
            'CHECKTIME' => 'Checktime',
            'CHECKTYPE' => 'Checktype',
            'VERIFYCODE' => 'Verifycode',
            'SENSORID' => 'Sensorid',
            'Memoinfo' => 'Memoinfo',
            'WorkCode' => 'Work Code',
            'sn' => 'Sn',
            'UserExtFmt' => 'User Ext Fmt',
        ];
    }
}
