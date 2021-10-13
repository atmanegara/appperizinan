<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TarifJnsTl;

/**
 * TarifJnsTlSearch represents the model behind the search form of `backend\models\TarifJnsTl`.
 */
class TarifJnsTlSearch extends TarifJnsTl
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_ref_jns_tl', 'id_lok_jns_tl'], 'integer'],
            [['awal_luas_t', 'akhir_luas_t', 'tarif'], 'number'],
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
        $query = TarifJnsTl::find();

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
            'id_ref_jns_tl' => $this->id_ref_jns_tl,
            'id_lok_jns_tl' => $this->id_lok_jns_tl,
            'awal_luas_t' => $this->awal_luas_t,
            'akhir_luas_t' => $this->akhir_luas_t,
            'tarif' => $this->tarif,
        ]);

        return $dataProvider;
    }
}
