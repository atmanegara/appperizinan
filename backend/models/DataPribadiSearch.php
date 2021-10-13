<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DataPribadi;

/**
 * DataPribadiSearch represents the model behind the search form of `backend\models\DataPribadi`.
 */
class DataPribadiSearch extends DataPribadi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nik', 'id_agama', 'id_prov', 'id_kab', 'id_kec', 'id_kel', 'kodepos'], 'integer'],
            [['nama', 'tmp_lahir', 'tgl_lahir', 'jkel', 'alamat', 'rt', 'rw', 'telp'], 'safe'],
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
        
        $query = DataPribadi::find();
  if (in_array($hak_user,['PORG','BDNUS'])){
            $query = $query->where(['id'=>$user_id]);
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
            'nik' => $this->nik,
            'tgl_lahir' => $this->tgl_lahir,
            'id_agama' => $this->id_agama,
            'id_prov' => $this->id_prov,
            'id_kab' => $this->id_kab,
            'id_kec' => $this->id_kec,
            'id_kel' => $this->id_kel,
            'kodepos' => $this->kodepos,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'tmp_lahir', $this->tmp_lahir])
            ->andFilterWhere(['like', 'jkel', $this->jkel])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'rt', $this->rt])
            ->andFilterWhere(['like', 'rw', $this->rw])
            ->andFilterWhere(['like', 'telp', $this->telp]);

        return $dataProvider;
    }
}
