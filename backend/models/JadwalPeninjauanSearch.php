<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\JadwalPeninjauan;

/**
 * JadwalPeninjauanSearch represents the model behind the search form of `backend\models\JadwalPeninjauan`.
 */
class JadwalPeninjauanSearch extends JadwalPeninjauan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_pemohon_pengajuan', 'id_tim_teknis'], 'integer'],
            [['tgl_peninjauan', 'ket'], 'safe'],
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
        $query = JadwalPeninjauan::find();

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
            'id_pemohon_pengajuan' => $this->id_pemohon_pengajuan,
            'id_tim_teknis' => $this->id_tim_teknis,
            'tgl_peninjauan' => $this->tgl_peninjauan,
        ]);

        $query->andFilterWhere(['like', 'ket', $this->ket]);

        return $dataProvider;
    }
}
