<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "data_pribadi".
 *
 * @property int $id
 * @property int $nik
 * @property string $nama
 * @property string $tmp_lahir
 * @property string $tgl_lahir
 * @property string $jkel
 * @property int $id_agama
 * @property string $alamat
 * @property string $rt
 * @property string $rw
 * @property int $id_prov
 * @property int $id_kab
 * @property int $id_kec
 * @property int $id_kel
 * @property int $kodepos
 * @property string $telp
 */
class DataPribadi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_pribadi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'id_agama', 'id_prov', 'id_kab', 'id_kec', 'id_kel', 'kodepos'], 'integer'],
            [['tgl_lahir'], 'safe'],
            [['jkel'], 'string'],
            [['nama', 'tmp_lahir', 'alamat', 'rt', 'rw', 'telp'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik' => 'Nik',
            'nama' => 'Nama',
            'tmp_lahir' => 'Tmp Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'jkel' => 'Jkel',
            'id_agama' => 'Id Agama',
            'alamat' => 'Alamat',
            'rt' => 'Rt',
            'rw' => 'Rw',
            'id_prov' => 'Id Prov',
            'id_kab' => 'Id Kab',
            'id_kec' => 'Id Kec',
            'id_kel' => 'Id Kel',
            'kodepos' => 'Kodepos',
            'telp' => 'Telp',
        ];
    }
}
