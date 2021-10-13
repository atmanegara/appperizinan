<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PenetapanNomor;

/**
 * PenetapanNomorSearch represents the model behind the search form of `backend\models\PenetapanNomor`.
 */
class PenetapanNomorSearch extends PenetapanNomor
{
    public $no_registrasi;
    public $no_ktp;
    public $no_sk;
    public $tgl_sk;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','no_registrasi','no_sk','no_ktp', 'id_pemohon_pengajuan', 'id_tanda_tangan'], 'integer'],
            [['no_sk', 'tgl_sk', 'tgl_tempo_sk'], 'safe'],
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
        $query = (new \yii\db\Query())
                ->select('f.id,f.no_sk,f.tgl_sk,a.no_registrasi,a.id_data_pemohon,a.id_jenis_izin,a.id_jenis_permohonan,
b.no_ktp,b.nm_pemohon,c.nm_jenis_izin,d.nm_jenis_permohonan,e.nm_perusahaan,e.alamat,
a.status_pengajuan,a.status_verifikasi,a.status_selesai')
                ->from('pemohon_pengajuan a')
                ->innerJoin('data_pemohon b','a.id_data_pemohon=b.id')
                ->innerJoin('data_perusahaan e','e.id_pemohon=a.id_data_pemohon')
                ->innerJoin('ref_jenis_izin c','a.id_jenis_izin=c.id')
                ->innerJoin('ref_jenis_permohonan d','a.id_jenis_permohonan=d.id')
                ->innerJoin('penetapan_nomor f','f.id_pemohon_pengajuan=a.id')
                ->groupBy('a.no_registrasi'); //PenetapanNomor::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>'20'
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
            'id_pemohon_pengajuan' => $this->id_pemohon_pengajuan,
            'tgl_sk' => $this->tgl_sk,
            'tgl_tempo_sk' => $this->tgl_tempo_sk,
            'id_tanda_tangan' => $this->id_tanda_tangan,
        ]);

        $query->andFilterWhere(['like', 'no_sk', $this->no_sk]);

        return $dataProvider;
    }
}
