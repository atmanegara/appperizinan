<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "data_petugas_loket".
 *
 * @property int $id
 * @property string $no_id
 * @property string $nama_petugas
 * @property string $alamat
 * @property string $jkel
 * @property string $aktif
 *
 * @property JadwalPetugasLoket[] $jadwalPetugasLokets
 */
class DataPetugasLoket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_petugas_loket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aktif'], 'string'],
            [['no_id', 'nama_petugas', 'alamat', 'jkel'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_id' => 'No ID',
            'nama_petugas' => 'Nama Petugas',
            'alamat' => 'Alamat',
            'jkel' => 'Jkel',
            'aktif' => 'Aktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwalPetugasLokets()
    {
        return $this->hasMany(JadwalPetugasLoket::className(), ['id_data_petugas_loket' => 'id']);
    }
}
