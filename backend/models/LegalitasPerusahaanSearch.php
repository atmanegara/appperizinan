<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\LegalitasPerusahaan;

/**
 * LegalitasPerusahaanSearch represents the model behind the search form of `backend\models\LegalitasPerusahaan`.
 */
class LegalitasPerusahaanSearch extends LegalitasPerusahaan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_data_perusahaan'], 'integer'],
            [['no_akta', 'tgl_berdiri', 'nm_notaris', 'no_sk_pengesahan', 'tgl_pengesahan'], 'safe'],
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
        $query = LegalitasPerusahaan::find();

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
            'id_data_perusahaan' => $this->id_data_perusahaan,
            'tgl_berdiri' => $this->tgl_berdiri,
            'tgl_pengesahan' => $this->tgl_pengesahan,
        ]);

        $query->andFilterWhere(['like', 'no_akta', $this->no_akta])
            ->andFilterWhere(['like', 'nm_notaris', $this->nm_notaris])
            ->andFilterWhere(['like', 'no_sk_pengesahan', $this->no_sk_pengesahan]);

        return $dataProvider;
    }
}
