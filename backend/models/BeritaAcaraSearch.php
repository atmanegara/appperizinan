<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BeritaAcara;

/**
 * BeritaAcaraSearch represents the model behind the search form of `backend\models\BeritaAcara`.
 */
class BeritaAcaraSearch extends BeritaAcara
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['no_berita', 'tgl_berita', 'isi_berita'], 'safe'],
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
                ->select('a.id,a.id_pemohon_pengajuan,a.no_berita,a.tgl_berita,a.isi_berita,a.file_berita,b.status_verifikasi,b.catatan') //BeritaAcara::find();
->from('berita_acara a')
                ->leftJoin('verifikasi_bap_tim b','a.id=b.id_berita_acara');
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
            'tgl_berita' => $this->tgl_berita,
           
        ]);

        $query->andFilterWhere(['like', 'no_berita', $this->no_berita])
            ->andFilterWhere(['like', 'isi_berita', $this->isi_berita]);

        return $dataProvider;
    }
}
