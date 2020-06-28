<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Goods;

/**
 * GoodsSearch represents the model behind the search form of `app\models\Goods`.
 */
class GoodsSearch extends Goods
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'price'], 'integer'],
            [['title', 'tab_1_title', 'tab_1_content', 'tab_2_title', 'tab_2_content', 'tab_3_title', 'tab_3_content'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Goods::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'tab_1_title', $this->tab_1_title])
            ->andFilterWhere(['like', 'tab_1_content', $this->tab_1_content])
            ->andFilterWhere(['like', 'tab_2_title', $this->tab_2_title])
            ->andFilterWhere(['like', 'tab_2_content', $this->tab_2_content])
            ->andFilterWhere(['like', 'tab_3_title', $this->tab_3_title])
            ->andFilterWhere(['like', 'tab_3_content', $this->tab_3_content]);

        return $dataProvider;
    }
}
