<?php

namespace api\models;

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
            [['NO', 'name', 'gender', 'birthday', 'phone', 'ED', 'flag', 'BC', 'openid'], 'required'],
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
            'id' => 'ID',
            'NO' => 'No',
            'name' => 'Name',
            'gender' => 'Gender',
            'birthday' => 'Birthday',
            'phone' => 'Phone',
            'ED' => 'Ed',
            'flag' => 'Flag',
            'BC' => 'Bc',
            'openid' => 'Openid',
        ];
    }
}
