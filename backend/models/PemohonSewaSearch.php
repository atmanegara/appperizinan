<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PemohonSewa;

/**
 * PemohonSewaSearch represents the model behind the search form of `backend\models\PemohonSewa`.
 */
class PemohonSewaSearch extends PemohonSewa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_bangunan'], 'integer'],
            [['no_reg_sewa'], 'safe'],
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
        $hakuser = \Yii::$app->user->identity->kode_group_user;
        
        $query =(new \yii\db\Query())//PemohonSewa::find();
                ->select('a.no_reg_sewa,a.id_data_pemohon,a.id_bangunan,c.nm_bangunan,a.kegunaan,a.tgl_sewa,d.status_konfir')
                ->from('pemohon_sewa a')
                ->innerJoin('ref_bangunan b','b.id=a.id_bangunan')
                ->innerJoin('data_biaya_sewa c','c.id_bangunan=b.id')
                ->leftJoin('konfir_byr_sewa d','a.no_reg_sewa=d.no_reg_sewa');

        // add conditions that should always apply here
        if (in_array($hakuser, ['PORG','BDNUS'])){
            $id_pemohon = \Yii::$app->user->identity->nip;
            $query->where(['a.id_data_pemohon'=>$id_pemohon]);
        }
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
        //    'id_data_pemohon' => $this->id_data_pemohon,
            'id_bangunan' => $this->id_bangunan,
       //     'biaya_sewa' => $this->biaya_sewa,
       //     'tgl_sewa' => $this->tgl_sewa,
       //     'jam_awal' => $this->jam_awal,
       //     'jam_akhir' => $this->jam_akhir,
        ]);

        $query->andFilterWhere(['like', 'no_reg_sewa', $this->no_reg_sewa]);
          //  ->andFilterWhere(['like', 'hari', $this->hari])
          //  ->andFilterWhere(['like', 'kegunaan', $this->kegunaan])
          //  ->andFilterWhere(['like', 'nm_pnggung_jwb', $this->nm_pnggung_jwb])
          //  ->andFilterWhere(['like', 'telp', $this->telp]);

        return $dataProvider;
    }
}
