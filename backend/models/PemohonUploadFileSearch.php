<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PemohonUploadFile;

/**
 * PemohonUploadFileSearch represents the model behind the search form of `backend\models\PemohonUploadFile`.
 */
class PemohonUploadFileSearch extends PemohonUploadFile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tahun', 'no_registrasi', 'id_jenis_izin', 'id_jenis_permohonan'], 'integer'],
            [['data_file_upload'], 'safe'],
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
        $query = PemohonUploadFile::find();

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
            'tahun' => $this->tahun,
            'no_registrasi' => $this->no_registrasi,
            'id_jenis_izin' => $this->id_jenis_izin,
            'id_jenis_permohonan' => $this->id_jenis_permohonan,
        ]);

        $query->andFilterWhere(['like', 'data_file_upload', $this->data_file_upload]);

        return $dataProvider;
    }
}
