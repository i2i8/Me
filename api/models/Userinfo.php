<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "USERINFO".
 *
 * @property integer $USERID
 * @property string $BADGENUMBER
 * @property string $SSN
 * @property string $NAME
 * @property string $GENDER
 * @property string $TITLE
 * @property string $PAGER
 * @property string $BIRTHDAY
 * @property string $HIREDDAY
 * @property string $STREET
 * @property string $CITY
 * @property string $STATE
 * @property string $ZIP
 * @property string $OPHONE
 * @property string $FPHONE
 * @property integer $VERIFICATIONMETHOD
 * @property integer $DEFAULTDEPTID
 * @property integer $SECURITYFLAGS
 * @property integer $ATT
 * @property integer $INLATE
 * @property integer $OUTEARLY
 * @property integer $OVERTIME
 * @property integer $SEP
 * @property integer $HOLIDAY
 * @property string $MINZU
 * @property string $PASSWORD
 * @property integer $LUNCHDURATION
 * @property string $MVerifyPass
 * @property resource $PHOTO
 * @property resource $Notes
 * @property integer $privilege
 * @property integer $InheritDeptSch
 * @property integer $InheritDeptSchClass
 * @property integer $AutoSchPlan
 * @property integer $MinAutoSchInterval
 * @property integer $RegisterOT
 * @property integer $InheritDeptRule
 * @property integer $EMPRIVILEGE
 * @property string $CardNo
 * @property integer $FaceGroup
 * @property integer $AccGroup
 * @property integer $UseAccGroupTZ
 * @property integer $VerifyCode
 * @property integer $Expires
 * @property integer $ValidCount
 * @property string $ValidTimeBegin
 * @property string $ValidTimeEnd
 * @property integer $TimeZone1
 * @property integer $TimeZone2
 * @property integer $TimeZone3
 * @property string $IDCardNo
 * @property string $IDCardValidTime
 */
class Userinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'USERINFO';
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
            [['BADGENUMBER'], 'required'],
            [['BADGENUMBER', 'SSN', 'NAME', 'GENDER', 'TITLE', 'PAGER', 'STREET', 'CITY', 'STATE', 'ZIP', 'OPHONE', 'FPHONE', 'MINZU', 'PASSWORD', 'MVerifyPass', 'PHOTO', 'Notes', 'CardNo', 'IDCardNo', 'IDCardValidTime'], 'string'],
            [['BIRTHDAY', 'HIREDDAY', 'ValidTimeBegin', 'ValidTimeEnd'], 'safe'],
            [['VERIFICATIONMETHOD', 'DEFAULTDEPTID', 'SECURITYFLAGS', 'ATT', 'INLATE', 'OUTEARLY', 'OVERTIME', 'SEP', 'HOLIDAY', 'LUNCHDURATION', 'privilege', 'InheritDeptSch', 'InheritDeptSchClass', 'AutoSchPlan', 'MinAutoSchInterval', 'RegisterOT', 'InheritDeptRule', 'EMPRIVILEGE', 'FaceGroup', 'AccGroup', 'UseAccGroupTZ', 'VerifyCode', 'Expires', 'ValidCount', 'TimeZone1', 'TimeZone2', 'TimeZone3'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USERID' => '编号',
            'BADGENUMBER' => '工号',
            'SSN' => 'Ssn',
            'NAME' => 'Name',
            'GENDER' => 'Gender',
            'TITLE' => 'Title',
            'PAGER' => 'Pager',
            'BIRTHDAY' => 'Birthday',
            'HIREDDAY' => 'Hiredday',
            'STREET' => 'Street',
            'CITY' => 'City',
            'STATE' => 'State',
            'ZIP' => 'Zip',
            'OPHONE' => 'Ophone',
            'FPHONE' => 'Fphone',
            'VERIFICATIONMETHOD' => 'Verificationmethod',
            'DEFAULTDEPTID' => 'Defaultdeptid',
            'SECURITYFLAGS' => 'Securityflags',
            'ATT' => 'Att',
            'INLATE' => 'Inlate',
            'OUTEARLY' => 'Outearly',
            'OVERTIME' => 'Overtime',
            'SEP' => 'Sep',
            'HOLIDAY' => 'Holiday',
            'MINZU' => 'Minzu',
            'PASSWORD' => 'Password',
            'LUNCHDURATION' => 'Lunchduration',
            'MVerifyPass' => 'Mverify Pass',
            'PHOTO' => 'Photo',
            'Notes' => 'Notes',
            'privilege' => 'Privilege',
            'InheritDeptSch' => 'Inherit Dept Sch',
            'InheritDeptSchClass' => 'Inherit Dept Sch Class',
            'AutoSchPlan' => 'Auto Sch Plan',
            'MinAutoSchInterval' => 'Min Auto Sch Interval',
            'RegisterOT' => 'Register Ot',
            'InheritDeptRule' => 'Inherit Dept Rule',
            'EMPRIVILEGE' => 'Emprivilege',
            'CardNo' => 'Card No',
            'FaceGroup' => 'Face Group',
            'AccGroup' => 'Acc Group',
            'UseAccGroupTZ' => 'Use Acc Group Tz',
            'VerifyCode' => 'Verify Code',
            'Expires' => 'Expires',
            'ValidCount' => 'Valid Count',
            'ValidTimeBegin' => 'Valid Time Begin',
            'ValidTimeEnd' => 'Valid Time End',
            'TimeZone1' => 'Time Zone1',
            'TimeZone2' => 'Time Zone2',
            'TimeZone3' => 'Time Zone3',
            'IDCardNo' => 'Idcard No',
            'IDCardValidTime' => 'Idcard Valid Time',
        ];
    }
}
