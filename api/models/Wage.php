<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "wage".
 *
 * @property integer $id
 * @property string $name
 * @property string $zhiWu
 * @property double $yCQ
 * @property double $sCQ
 * @property integer $flag
 * @property integer $baseGZ
 * @property integer $fullWork
 * @property integer $jobGZ
 * @property integer $salesFood
 * @property integer $salesCard
 * @property integer $salesDrink
 * @property integer $holidays
 * @property integer $cups
 * @property integer $late
 * @property integer $others
 * @property integer $tatal
 * @property string $des
 */
class Wage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'zhiWu', 'yCQ', 'sCQ', 'flag', 'baseGZ', 'fullWork', 'tatal'], 'required'],
            [['yCQ', 'sCQ'], 'number'],
            [['flag', 'baseGZ', 'fullWork', 'jobGZ', 'salesFood', 'salesCard', 'salesDrink', 'holidays', 'cups', 'late', 'others', 'tatal'], 'integer'],
            [['name'], 'string', 'max' => 16],
            [['zhiWu'], 'string', 'max' => 4],
            [['des'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'zhiWu' => '职务',
            'yCQ' => '应出勤天数',
            'sCQ' => '实出勤天数',
            'flag' => '工资月份',
            'baseGZ' => '基本工资',
            'fullWork' => '全勤奖励',
            'jobGZ' => '职务工资',
            'salesFood' => '销售提成',
            'salesCard' => '售卡提成',
            'salesDrink' => '售酒提成',
            'holidays' => '节日奖',
            'cups' => '杯子损耗',
            'late' => '迟到',
            'others' => '扣/退/罚',
            'tatal' => '实发工资',
            'des' => '备注',
        ];
    }
}
