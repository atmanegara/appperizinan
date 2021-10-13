<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DataIzin;

/**
 * DataIzinSearch represents the model behind the search form of `backend\models\DataIzin`.
 */
class DataIzinSearch extends DataIzin
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_penetapan_nomor', 'id_ref_ttd'], 'integer'],
            [['tgl_surat', 'isi_surat', 'file_surat'], 'safe'],
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
        $query =(new \yii\db\Query())
                ->select('a.id,a.id_penetapan_nomor,a.tgl_surat,a.id_ref_ttd,'
                        . 'b.no_sk,b.tgl_sk ')//DataIzin::find();
                ->from('data_izin a')
                ->innerJoin('penetapan_nomor b','a.id_penetapan_nomor=b.id');

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
            'id_penetapan_nomor' => $this->id_penetapan_nomor,
            'tgl_surat' => $this->tgl_surat,
            'id_ref_ttd' => $this->id_ref_ttd,
        ]);

        $query->andFilterWhere(['like', 'isi_surat', $this->isi_surat])
            ->andFilterWhere(['like', 'file_surat', $this->file_surat]);

        return $dataProvider;
    }
}
