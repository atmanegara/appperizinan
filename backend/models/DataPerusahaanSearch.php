<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DataPerusahaan;

/**
 * DataPerusahaanSearch represents the model behind the search form of `backend\models\DataPerusahaan`.
 */
class DataPerusahaanSearch extends DataPerusahaan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_prov', 'id_kab', 'id_kec'], 'integer'],
            [['no_npwp', 'nm_perusahaan', 'nm_gedung', 'lantai', 'alamat', 'rt', 'rw', 'kodepos', 'telp', 'fax', 'email', 'lat', 'long'], 'safe'],
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
        $user_id = \Yii::$app->user->identity->nip;
        $hak_user = \Yii::$app->user->identity->kode_group_user;
        $query = DataPerusahaan::find();
        if (in_array($hak_user,['PORG','BDNUS'])){
            $query = $query->where(['id_pemohon'=>$user_id]);
        }
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
            'id_prov' => $this->id_prov,
            'id_kab' => $this->id_kab,
            'id_kec' => $this->id_kec,
        ]);

        $query->andFilterWhere(['like', 'no_npwp', $this->no_npwp])
            ->andFilterWhere(['like', 'nm_perusahaan', $this->nm_perusahaan])
            ->andFilterWhere(['like', 'nm_gedung', $this->nm_gedung])
            ->andFilterWhere(['like', 'lantai', $this->lantai])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'rt', $this->rt])
            ->andFilterWhere(['like', 'rw', $this->rw])
            ->andFilterWhere(['like', 'kodepos', $this->kodepos])
            ->andFilterWhere(['like', 'telp', $this->telp])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'long', $this->long]);

        return $dataProvider;
    }
}
