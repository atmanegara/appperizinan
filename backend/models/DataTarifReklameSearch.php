<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DataTarifReklame;

/**
 * DataTarifReklameSearch represents the model behind the search form of `backend\models\DataTarifReklame`.
 */
class DataTarifReklameSearch extends DataTarifReklame
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_ref_reklame'], 'integer'],
            [['alat_media', 'waktu'], 'safe'],
            [['tarif'], 'number'],
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
        $query = DataTarifReklame::find();

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
            'id_ref_reklame' => $this->id_ref_reklame,
            'tarif' => $this->tarif,
        ]);

        $query->andFilterWhere(['like', 'alat_media', $this->alat_media])
            ->andFilterWhere(['like', 'waktu', $this->waktu]);

        return $dataProvider;
    }
}
