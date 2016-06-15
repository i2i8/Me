<?php

namespace api\models;

use Yii;

class Condetails extends \yii\db\ActiveRecord
{
	public function getDcc()
	{
	
		return $this->hasMany(Conhisd::className(), ['Serial' => 'Serial']);
		//->viaTable('vod_RoomHisFeeD', ['Serial' => 'bz']);
	}

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vod_RoomHisFeeI';
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
            [['Serial'], 'required'],
            [['Serial', 'inDateTime', 'EndDateTime', 'BZ', 'Opener', 'JieZhang', 'Ext1', 'Ext2', 'Ext3', 'MianDan', 'ydr', 'AllowRebate', 'VIPCard', 'vZone', 'ydrKind', 'ydkind', 'KH_VIP', 'KH_XM', 'KH_Tel', 'KH_inTime', 'KH_Desc', 'ChangCi', 'xnb', 'qdr', 'hzr', 'XieYiMC', 'FPH', 'gz_hkrq', 'gz_hkr', 'gz_jbr', 'gz_bz', 'DJ', 'DayOfWeek', 'zkr', 'ModifyDESC', 'AuthGG', 'SetGG', 'SetGGKind', 'Waiter', 'VIPCard2', 'JiaLi', 'JFList', 'RoomStyle', 'VIPName'], 'string'],
            [['RoomID', 'Rebate', 'jglx', 'JSRebate', 'vLock', 'RoomRebate', 'XieYiID', 'gz_hkje', 'gz_hkmd', 'HFlag', 'ManNum', 'WSTZ', 'RoomJG', 'ZSTime', 'UseJF'], 'integer'],
            [['TotalFee', 'YingShou', 'ShiShou', 'OtherFee1', 'OtherFee2', 'OtherFee3', 'OtherFee4', 'JZ_1', 'JZ_2', 'JZ_3', 'JZ_4', 'JZ_5', 'OtherFee5', 'JSPrice', 'RoomPrice', 'timePrice', 'otherfee6', 'SY_1', 'SY_2', 'SY_3', 'SY_4', 'SY_5', 'SY_6', 'SY_7', 'SY_8', 'TimeFee', 'JZ_6', 'JZ_7', 'JZ_8', 'FPE', 'ZengSong', 'pos_ys', 'DXCE', 'ZKE', 'POSJZ_1', 'POSJZ_2', 'POSJZ_3', 'POSJZ_4', 'POSJZ_5', 'POSJZ_6', 'POSJZ_7', 'POSJZ_8', 'POSSY_1', 'POSSY_2', 'POSSY_3', 'POSSY_4', 'POSSY_5', 'POSSY_6', 'POSSY_7', 'POSSY_8', 'POSOtherFee', 'JZ_9', 'XJ_9', 'RoomXJ_9', 'PosJZ_9', 'HDJE', 'TotalFeeY', 'JZ_10', 'XJ_10', 'RoomXJ_10', 'PosJZ_10', 'JZ_11', 'XJ_11', 'RoomXJ_11', 'PosJZ_11'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Serial' => 'Serial',
            'RoomID' => 'Room ID',
            'inDateTime' => 'In Date Time',
            'EndDateTime' => 'End Date Time',
            'TotalFee' => 'Total Fee',
            'Rebate' => 'Rebate',
            'YingShou' => 'Ying Shou',
            'ShiShou' => 'Shi Shou',
            'BZ' => 'Bz',
            'Opener' => 'Opener',
            'JieZhang' => 'Jie Zhang',
            'Ext1' => 'Ext1',
            'Ext2' => 'Ext2',
            'Ext3' => 'Ext3',
            'OtherFee1' => 'Other Fee1',
            'OtherFee2' => 'Other Fee2',
            'OtherFee3' => 'Other Fee3',
            'OtherFee4' => 'Other Fee4',
            'JZ_1' => 'Jz 1',
            'JZ_2' => 'Jz 2',
            'JZ_3' => 'Jz 3',
            'JZ_4' => 'Jz 4',
            'JZ_5' => 'Jz 5',
            'MianDan' => 'Mian Dan',
            'ydr' => 'Ydr',
            'OtherFee5' => 'Other Fee5',
            'jglx' => 'Jglx',
            'AllowRebate' => 'Allow Rebate',
            'JSPrice' => 'Jsprice',
            'RoomPrice' => 'Room Price',
            'timePrice' => 'Time Price',
            'otherfee6' => 'Otherfee6',
            'SY_1' => 'Sy 1',
            'SY_2' => 'Sy 2',
            'SY_3' => 'Sy 3',
            'SY_4' => 'Sy 4',
            'SY_5' => 'Sy 5',
            'SY_6' => 'Sy 6',
            'SY_7' => 'Sy 7',
            'SY_8' => 'Sy 8',
            'JSRebate' => 'Jsrebate',
            'TimeFee' => 'Time Fee',
            'vLock' => 'V Lock',
            'VIPCard' => 'Vipcard',
            'RoomRebate' => 'Room Rebate',
            'vZone' => 'V Zone',
            'JZ_6' => 'Jz 6',
            'JZ_7' => 'Jz 7',
            'JZ_8' => 'Jz 8',
            'ydrKind' => 'Ydr Kind',
            'ydkind' => 'Ydkind',
            'KH_VIP' => 'Kh  Vip',
            'KH_XM' => 'Kh  Xm',
            'KH_Tel' => 'Kh  Tel',
            'KH_inTime' => 'Kh In Time',
            'KH_Desc' => 'Kh  Desc',
            'ChangCi' => 'Chang Ci',
            'xnb' => 'Xnb',
            'XieYiID' => 'Xie Yi ID',
            'qdr' => 'Qdr',
            'hzr' => 'Hzr',
            'XieYiMC' => 'Xie Yi Mc',
            'FPH' => 'Fph',
            'FPE' => 'Fpe',
            'gz_hkrq' => 'Gz Hkrq',
            'gz_hkje' => 'Gz Hkje',
            'gz_hkmd' => 'Gz Hkmd',
            'gz_hkr' => 'Gz Hkr',
            'gz_jbr' => 'Gz Jbr',
            'gz_bz' => 'Gz Bz',
            'ZengSong' => 'Zeng Song',
            'DJ' => 'Dj',
            'HFlag' => 'Hflag',
            'pos_ys' => 'Pos Ys',
            'DXCE' => 'Dxce',
            'ZKE' => 'Zke',
            'DayOfWeek' => 'Day Of Week',
            'zkr' => 'Zkr',
            'ManNum' => 'Man Num',
            'ModifyDESC' => 'Modify Desc',
            'AuthGG' => 'Auth Gg',
            'SetGG' => 'Set Gg',
            'SetGGKind' => 'Set Ggkind',
            'Waiter' => 'Waiter',
            'POSJZ_1' => 'Posjz 1',
            'POSJZ_2' => 'Posjz 2',
            'POSJZ_3' => 'Posjz 3',
            'POSJZ_4' => 'Posjz 4',
            'POSJZ_5' => 'Posjz 5',
            'POSJZ_6' => 'Posjz 6',
            'POSJZ_7' => 'Posjz 7',
            'POSJZ_8' => 'Posjz 8',
            'POSSY_1' => 'Possy 1',
            'POSSY_2' => 'Possy 2',
            'POSSY_3' => 'Possy 3',
            'POSSY_4' => 'Possy 4',
            'POSSY_5' => 'Possy 5',
            'POSSY_6' => 'Possy 6',
            'POSSY_7' => 'Possy 7',
            'POSSY_8' => 'Possy 8',
            'POSOtherFee' => 'Posother Fee',
            'JZ_9' => 'Jz 9',
            'XJ_9' => 'Xj 9',
            'RoomXJ_9' => 'Room Xj 9',
            'PosJZ_9' => 'Pos Jz 9',
            'VIPCard2' => 'Vipcard2',
            'WSTZ' => 'Wstz',
            'JiaLi' => 'Jia Li',
            'JFList' => 'Jflist',
            'RoomJG' => 'Room Jg',
            'HDJE' => 'Hdje',
            'RoomStyle' => 'Room Style',
            'ZSTime' => 'Zstime',
            'TotalFeeY' => 'Total Fee Y',
            'JZ_10' => 'Jz 10',
            'XJ_10' => 'Xj 10',
            'RoomXJ_10' => 'Room Xj 10',
            'PosJZ_10' => 'Pos Jz 10',
            'UseJF' => 'Use Jf',
            'VIPName' => 'Vipname',
            'JZ_11' => 'Jz 11',
            'XJ_11' => 'Xj 11',
            'RoomXJ_11' => 'Room Xj 11',
            'PosJZ_11' => 'Pos Jz 11',
        ];
    }
    
    public static function primaryKey()
    {
    	return ['Serial']; // TODO: Change the autogenerated stub
    }
}
