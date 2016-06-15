<?php

namespace api\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use api\models\Conlist;

/**
 * ConlistSearch represents the model behind the search form about `frontend\models\Conlist`.
 */
class ConlistSearch extends Conlist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'JF'], 'integer'],
            [['KH', 'XFRQ', 'bz', 'JBR', 'CurDay'], 'safe'],
            [['XFJE', 'cye', 'xye', 'CYE1', 'XFJE1', 'KJE', 'XYE1'], 'number'],
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
        $query = Conlist::find();

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
            'id' => $this->id,
            'XFJE' => $this->XFJE,
            'JF' => $this->JF,
            'cye' => $this->cye,
            'xye' => $this->xye,
            'CYE1' => $this->CYE1,
            'XFJE1' => $this->XFJE1,
            'KJE' => $this->KJE,
            'XYE1' => $this->XYE1,
        ]);

        $query->andFilterWhere(['like', 'KH', $this->KH])
            ->andFilterWhere(['like', 'XFRQ', $this->XFRQ])
            ->andFilterWhere(['like', 'bz', $this->bz])
            ->andFilterWhere(['like', 'JBR', $this->JBR])
            ->andFilterWhere(['like', 'CurDay', $this->CurDay]);

        return $dataProvider;
    }
}
