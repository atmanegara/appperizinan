<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DataPemohon;

/**
 * DataPemohonSearch represents the model behind the search form of `backend\models\DataPemohon`.
 */
class DataPemohonSearch extends DataPemohon
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_tipe_pemohon'], 'integer'],
            [['no_ktp', 'no_npwp', 'id_jns_bdn_usaha', 'nm_pemohon', 'nm_pmilik_bu', 'alamat_pemohon', 'id_desa', 'id_kec', 'email_pemohon', 'telp_pemohon'], 'safe'],
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
        $kode_group_user  = \Yii::$app->user->identity->kode_group_user;
        $nip = \Yii::$app->user->identity->nip;
        $query =(new \yii\db\Query())
                ->select('a.id,a.id_tipe_pemohon,a.no_ktp,a.no_npwp,a.id_jns_bdn_usaha,a.nm_pemohon,a.nm_pmilik_bu,a.alamat_pemohon,a.id_desa,a.id_kec,a.email_pemohon,a.telp_pemohon,'
                        . 'b.nm_perusahaan')
                ->from('data_pemohon a')
                ->leftJoin('data_perusahaan b','a.id=b.id_pemohon');
        switch ($kode_group_user){
            case ('PORG'):
                $query->where(['a.id'=>$nip]);
                break;
             case ('BDNUS'):
                $query->where(['a.id'=>$nip]);
                break;
        }
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'key'=>'id'
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
            'id_tipe_pemohon' => $this->id_tipe_pemohon,
        ]);

        $query->andFilterWhere(['like', 'no_ktp', $this->no_ktp])
            ->andFilterWhere(['like', 'no_npwp', $this->no_npwp])
            ->andFilterWhere(['like', 'id_jns_bdn_usaha', $this->id_jns_bdn_usaha])
            ->andFilterWhere(['like', 'nm_pemohon', $this->nm_pemohon])
            ->andFilterWhere(['like', 'nm_pmilik_bu', $this->nm_pmilik_bu])
            ->andFilterWhere(['like', 'alamat_pemohon', $this->alamat_pemohon])
            ->andFilterWhere(['like', 'id_desa', $this->id_desa])
            ->andFilterWhere(['like', 'id_kec', $this->id_kec])
            ->andFilterWhere(['like', 'email_pemohon', $this->email_pemohon])
            ->andFilterWhere(['like', 'telp_pemohon', $this->telp_pemohon]);

        return $dataProvider;
    }
}
