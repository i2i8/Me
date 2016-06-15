<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property integer $id
 * @property string $NO
 * @property string $name
 * @property string $gender
 * @property string $birthday
 * @property string $phone
 * @property string $ED
 * @property integer $flag
 * @property string $BC
 * @property string $openid
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NO', 'name', 'flag', 'openid'], 'required'],
//         	['NO', 'unique', 'targetClass' => '\common\models\Staff', 'message' => '工号重复.'],
//         	['name', 'unique', 'targetClass' => '\common\models\Staff', 'message' => '姓名重复.'],
//         	['openid', 'unique', 'targetClass' => '\common\models\Staff', 'message' => 'openid重复.'],
            [['birthday', 'ED'], 'safe'],
            [['flag'], 'integer'],
            [['NO', 'gender'], 'string', 'max' => 8],
            [['name'], 'string', 'max' => 16],
            [['phone'], 'string', 'max' => 11],
            [['BC'], 'string', 'max' => 19],
            [['openid'], 'string', 'max' => 28],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '序号',
            'NO' => '工号',
            'name' => '姓名',
            'gender' => '性别',
            'birthday' => '生日',
            'phone' => '电话',
            'ED' => '入职时间',
            'flag' => '是否在职',
            'BC' => '银行卡号',
            'openid' => 'OpenID',
        ];
    }
}
