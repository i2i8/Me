<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "ckger".
 *
 * @property integer $id
 * @property integer $cCard
 * @property string $cName
 * @property string $bankInfo
 */
class Ckger extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ckger';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cCard', 'cName', 'bankInfo'], 'required'],
            [['cCard'], 'integer'],
            [['cName'], 'string', 'max' => 10],
            [['bankInfo'], 'string', 'max' => 19]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cCard' => 'C Card',
            'cName' => 'C Name',
            'bankInfo' => 'Bank Info',
        ];
    }
}
