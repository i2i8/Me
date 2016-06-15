<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property integer $id
 * @property string $vip_iden
 * @property string $username
 * @property string $gender
 * @property string $phonenum
 * @property string $openiden
 * @property string $birthday
 * @property double $flag
 * @property double $modified
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $auth_key
 * @property string $password_hash
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vip_iden', 'username', 'gender', 'phonenum', 'openiden', 'birthday', 'created_at', 'updated_at', 'auth_key', 'password_hash'], 'required'],
            [['birthday'], 'safe'],
            [['flag', 'modified'], 'number'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['vip_iden', 'gender'], 'string', 'max' => 8],
            [['username'], 'string', 'max' => 16],
            [['phonenum'], 'string', 'max' => 11],
            [['openiden'], 'string', 'max' => 28],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '序号',
            'vip_iden' => '卡号',
            'username' => '姓名',
            'gender' => '性别',
            'phonenum' => '电话',
            'openiden' => 'OpenID',
            'birthday' => '生日',
            'flag' => 'Flag',
            'modified' => 'Modified',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
        ];
    }
}
