<?php

namespace api\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use api\models\Condetails;

/**
 * CondetailsSearch represents the model behind the search form about `frontend\models\Condetails`.
 */
class CondetailsSearch extends Condetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Serial', 'inDateTime', 'EndDateTime', 'BZ', 'Opener', 'JieZhang', 'Ext1', 'Ext2', 'Ext3', 'MianDan', 'ydr', 'AllowRebate', 'VIPCard', 'vZone', 'ydrKind', 'ydkind', 'KH_VIP', 'KH_XM', 'KH_Tel', 'KH_inTime', 'KH_Desc', 'ChangCi', 'xnb', 'qdr', 'hzr', 'XieYiMC', 'FPH', 'gz_hkrq', 'gz_hkr', 'gz_jbr', 'gz_bz', 'DJ', 'DayOfWeek', 'zkr', 'ModifyDESC', 'AuthGG', 'SetGG', 'SetGGKind', 'Waiter', 'VIPCard2', 'JiaLi', 'JFList', 'RoomStyle', 'VIPName'], 'safe'],
            [['RoomID', 'Rebate', 'jglx', 'JSRebate', 'vLock', 'RoomRebate', 'XieYiID', 'gz_hkje', 'gz_hkmd', 'HFlag', 'ManNum', 'WSTZ', 'RoomJG', 'ZSTime', 'UseJF'], 'integer'],
            [['TotalFee', 'YingShou', 'ShiShou', 'OtherFee1', 'OtherFee2', 'OtherFee3', 'OtherFee4', 'JZ_1', 'JZ_2', 'JZ_3', 'JZ_4', 'JZ_5', 'OtherFee5', 'JSPrice', 'RoomPrice', 'timePrice', 'otherfee6', 'SY_1', 'SY_2', 'SY_3', 'SY_4', 'SY_5', 'SY_6', 'SY_7', 'SY_8', 'TimeFee', 'JZ_6', 'JZ_7', 'JZ_8', 'FPE', 'ZengSong', 'pos_ys', 'DXCE', 'ZKE', 'POSJZ_1', 'POSJZ_2', 'POSJZ_3', 'POSJZ_4', 'POSJZ_5', 'POSJZ_6', 'POSJZ_7', 'POSJZ_8', 'POSSY_1', 'POSSY_2', 'POSSY_3', 'POSSY_4', 'POSSY_5', 'POSSY_6', 'POSSY_7', 'POSSY_8', 'POSOtherFee', 'JZ_9', 'XJ_9', 'RoomXJ_9', 'PosJZ_9', 'HDJE', 'TotalFeeY', 'JZ_10', 'XJ_10', 'RoomXJ_10', 'PosJZ_10', 'JZ_11', 'XJ_11', 'RoomXJ_11', 'PosJZ_11'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        $query = Condetails::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'RoomID' => $this->RoomID,
            'TotalFee' => $this->TotalFee,
            'Rebate' => $this->Rebate,
            'YingShou' => $this->YingShou,
            'ShiShou' => $this->ShiShou,
            'OtherFee1' => $this->OtherFee1,
            'OtherFee2' => $this->OtherFee2,
            'OtherFee3' => $this->OtherFee3,
            'OtherFee4' => $this->OtherFee4,
            'JZ_1' => $this->JZ_1,
            'JZ_2' => $this->JZ_2,
            'JZ_3' => $this->JZ_3,
            'JZ_4' => $this->JZ_4,
            'JZ_5' => $this->JZ_5,
            'OtherFee5' => $this->OtherFee5,
            'jglx' => $this->jglx,
            'JSPrice' => $this->JSPrice,
            'RoomPrice' => $this->RoomPrice,
            'timePrice' => $this->timePrice,
            'otherfee6' => $this->otherfee6,
            'SY_1' => $this->SY_1,
            'SY_2' => $this->SY_2,
            'SY_3' => $this->SY_3,
            'SY_4' => $this->SY_4,
            'SY_5' => $this->SY_5,
            'SY_6' => $this->SY_6,
            'SY_7' => $this->SY_7,
            'SY_8' => $this->SY_8,
            'JSRebate' => $this->JSRebate,
            'TimeFee' => $this->TimeFee,
            'vLock' => $this->vLock,
            'RoomRebate' => $this->RoomRebate,
            'JZ_6' => $this->JZ_6,
            'JZ_7' => $this->JZ_7,
            'JZ_8' => $this->JZ_8,
            'XieYiID' => $this->XieYiID,
            'FPE' => $this->FPE,
            'gz_hkje' => $this->gz_hkje,
            'gz_hkmd' => $this->gz_hkmd,
            'ZengSong' => $this->ZengSong,
            'HFlag' => $this->HFlag,
            'pos_ys' => $this->pos_ys,
            'DXCE' => $this->DXCE,
            'ZKE' => $this->ZKE,
            'ManNum' => $this->ManNum,
            'POSJZ_1' => $this->POSJZ_1,
            'POSJZ_2' => $this->POSJZ_2,
            'POSJZ_3' => $this->POSJZ_3,
            'POSJZ_4' => $this->POSJZ_4,
            'POSJZ_5' => $this->POSJZ_5,
            'POSJZ_6' => $this->POSJZ_6,
            'POSJZ_7' => $this->POSJZ_7,
            'POSJZ_8' => $this->POSJZ_8,
            'POSSY_1' => $this->POSSY_1,
            'POSSY_2' => $this->POSSY_2,
            'POSSY_3' => $this->POSSY_3,
            'POSSY_4' => $this->POSSY_4,
            'POSSY_5' => $this->POSSY_5,
            'POSSY_6' => $this->POSSY_6,
            'POSSY_7' => $this->POSSY_7,
            'POSSY_8' => $this->POSSY_8,
            'POSOtherFee' => $this->POSOtherFee,
            'JZ_9' => $this->JZ_9,
            'XJ_9' => $this->XJ_9,
            'RoomXJ_9' => $this->RoomXJ_9,
            'PosJZ_9' => $this->PosJZ_9,
            'WSTZ' => $this->WSTZ,
            'RoomJG' => $this->RoomJG,
            'HDJE' => $this->HDJE,
            'ZSTime' => $this->ZSTime,
            'TotalFeeY' => $this->TotalFeeY,
            'JZ_10' => $this->JZ_10,
            'XJ_10' => $this->XJ_10,
            'RoomXJ_10' => $this->RoomXJ_10,
            'PosJZ_10' => $this->PosJZ_10,
            'UseJF' => $this->UseJF,
            'JZ_11' => $this->JZ_11,
            'XJ_11' => $this->XJ_11,
            'RoomXJ_11' => $this->RoomXJ_11,
            'PosJZ_11' => $this->PosJZ_11,
        ]);

        $query->andFilterWhere(['like', 'Serial', $this->Serial])
            ->andFilterWhere(['like', 'inDateTime', $this->inDateTime])
            ->andFilterWhere(['like', 'EndDateTime', $this->EndDateTime])
            ->andFilterWhere(['like', 'BZ', $this->BZ])
            ->andFilterWhere(['like', 'Opener', $this->Opener])
            ->andFilterWhere(['like', 'JieZhang', $this->JieZhang])
            ->andFilterWhere(['like', 'Ext1', $this->Ext1])
            ->andFilterWhere(['like', 'Ext2', $this->Ext2])
            ->andFilterWhere(['like', 'Ext3', $this->Ext3])
            ->andFilterWhere(['like', 'MianDan', $this->MianDan])
            ->andFilterWhere(['like', 'ydr', $this->ydr])
            ->andFilterWhere(['like', 'AllowRebate', $this->AllowRebate])
            ->andFilterWhere(['like', 'VIPCard', $this->VIPCard])
            ->andFilterWhere(['like', 'vZone', $this->vZone])
            ->andFilterWhere(['like', 'ydrKind', $this->ydrKind])
            ->andFilterWhere(['like', 'ydkind', $this->ydkind])
            ->andFilterWhere(['like', 'KH_VIP', $this->KH_VIP])
            ->andFilterWhere(['like', 'KH_XM', $this->KH_XM])
            ->andFilterWhere(['like', 'KH_Tel', $this->KH_Tel])
            ->andFilterWhere(['like', 'KH_inTime', $this->KH_inTime])
            ->andFilterWhere(['like', 'KH_Desc', $this->KH_Desc])
            ->andFilterWhere(['like', 'ChangCi', $this->ChangCi])
            ->andFilterWhere(['like', 'xnb', $this->xnb])
            ->andFilterWhere(['like', 'qdr', $this->qdr])
            ->andFilterWhere(['like', 'hzr', $this->hzr])
            ->andFilterWhere(['like', 'XieYiMC', $this->XieYiMC])
            ->andFilterWhere(['like', 'FPH', $this->FPH])
            ->andFilterWhere(['like', 'gz_hkrq', $this->gz_hkrq])
            ->andFilterWhere(['like', 'gz_hkr', $this->gz_hkr])
            ->andFilterWhere(['like', 'gz_jbr', $this->gz_jbr])
            ->andFilterWhere(['like', 'gz_bz', $this->gz_bz])
            ->andFilterWhere(['like', 'DJ', $this->DJ])
            ->andFilterWhere(['like', 'DayOfWeek', $this->DayOfWeek])
            ->andFilterWhere(['like', 'zkr', $this->zkr])
            ->andFilterWhere(['like', 'ModifyDESC', $this->ModifyDESC])
            ->andFilterWhere(['like', 'AuthGG', $this->AuthGG])
            ->andFilterWhere(['like', 'SetGG', $this->SetGG])
            ->andFilterWhere(['like', 'SetGGKind', $this->SetGGKind])
            ->andFilterWhere(['like', 'Waiter', $this->Waiter])
            ->andFilterWhere(['like', 'VIPCard2', $this->VIPCard2])
            ->andFilterWhere(['like', 'JiaLi', $this->JiaLi])
            ->andFilterWhere(['like', 'JFList', $this->JFList])
            ->andFilterWhere(['like', 'RoomStyle', $this->RoomStyle])
            ->andFilterWhere(['like', 'VIPName', $this->VIPName]);

        return $dataProvider;
    }
}
