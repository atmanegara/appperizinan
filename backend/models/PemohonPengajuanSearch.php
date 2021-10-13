<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PemohonPengajuan;

/**
 * PemohonPengajuanSearch represents the model behind the search form of `backend\models\PemohonPengajuan`.
 */
class PemohonPengajuanSearch extends PemohonPengajuan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_data_pemohon', 'id_jenis_izin', 'id_jenis_permohonan', 'id_jenis_bdn_usaha', 'status_pengajuan', 'status_verifikasi', 'status_selesai'], 'integer'],
            [['no_registrasi', 'tgl_pengajuan', 'tgl_verifikasi', 'tgl_selesai', 'status_kunci'], 'safe'],
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
                ->select('c.no_registrasi,c.id,c.id_data_pemohon,a.no_ktp,a.nm_pemohon,a.no_ktp,b.nm_perusahaan,d.nm_jenis_izin,e.nm_jenis_permohonan,f.status_daftar,c.tgl_pengajuan')
                ->from('data_pemohon a')
->innerJoin('data_perusahaan b','a.id=b.id_pemohon')
->innerJoin('pemohon_pengajuan c','a.id=c.id_data_pemohon')
->innerJoin('ref_jenis_izin d','c.id_jenis_izin=d.id')
->innerJoin('ref_jenis_permohonan e','c.id_jenis_permohonan=e.id')
->innerJoin('ref_status_daftar f','c.id_status_daftar=f.id');//PemohonPengajuan::find();

        // add conditions that should always apply here
      $query->groupBy('c.no_registrasi')->orderBy('c.tgl_pengajuan');
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
            'id_user' => $this->id_user,
            'id_data_pemohon' => $this->id_data_pemohon,
            'id_jenis_izin' => $this->id_jenis_izin,
            'id_jenis_permohonan' => $this->id_jenis_permohonan,
            'id_jenis_bdn_usaha' => $this->id_jenis_bdn_usaha,
            'status_pengajuan' => $this->status_pengajuan,
            'status_verifikasi' => $this->status_verifikasi,
            'status_selesai' => $this->status_selesai,
            'tgl_pengajuan' => $this->tgl_pengajuan,
            'tgl_verifikasi' => $this->tgl_verifikasi,
            'tgl_selesai' => $this->tgl_selesai,
        ]);

        $query->andFilterWhere(['like', 'no_registrasi', $this->no_registrasi])
            ->andFilterWhere(['like', 'status_kunci', $this->status_kunci]);

        return $dataProvider;
    }
}
