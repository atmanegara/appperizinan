<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DetailJenisIzin;

/**
 * DetailJenisIzinSearch represents the model behind the search form of `backend\models\DetailJenisIzin`.
 */
class DetailJenisIzinSearch extends DetailJenisIzin
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_jenis_izin', 'id_jenis_permohonan','nm_jenis_izin','nm_jenis_permohonan', 'no_urut'], 'integer'],
            [['nm_dok'], 'safe'],
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
        $query = DetailJenisIzin::find()
                ->alias('a')
                ->select('a.id,a.id_jenis_izin,a.id_jenis_permohonan,a.no_urut,a.nm_dok,b.nm_jenis_izin,c.nm_jenis_permohonan')
                ->innerJoin('ref_jenis_izin b','b.id=a.id_jenis_izin')
                ->innerJoin('ref_jenis_permohonan c','c.id=a.id_jenis_permohonan');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>10
            ]
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
            'id_jenis_izin' => $this->id_jenis_izin,
            'id_jenis_permohonan' => $this->id_jenis_permohonan,
            'no_urut' => $this->no_urut,
        ]);

        $query->andFilterWhere(['like', 'nm_dok', $this->nm_dok]);

        return $dataProvider;
    }
}
