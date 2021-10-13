<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\RefBangunan;

/**
 * RefBangunanSearch represents the model behind the search form of `backend\models\RefBangunan`.
 */
class RefBangunanSearch extends RefBangunan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nm_bangunan', 'hak_milik', 'lokasi_bangunan'], 'safe'],
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
        $query = RefBangunan::find();

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
        ]);

        $query->andFilterWhere(['like', 'nm_bangunan', $this->nm_bangunan])
            ->andFilterWhere(['like', 'hak_milik', $this->hak_milik])
            ->andFilterWhere(['like', 'lokasi_bangunan', $this->lokasi_bangunan]);

        return $dataProvider;
    }
}
