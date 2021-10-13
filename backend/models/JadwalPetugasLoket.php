<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jadwal_petugas_loket".
 *
 * @property int $id
 * @property int $id_data_petugas_loket
 * @property int $id_ref_loket
 * @property int $tgl_masuk
 * @property string $jam_pagi
 * @property string $jam_siang
 * @property string $jam_sore
 * @property string $id_ref_jenis_izin
 * @property string $aktif
 *
 * @property DataPetugasLoket $dataPetugasLoket
 * @property RefLoket $refLoket
 */
class JadwalPetugasLoket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jadwal_petugas_loket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_data_petugas_loket', 'id_ref_loket'], 'integer'],
            [['tgl_masuk'], 'safe'],
            [['jam_pagi', 'jam_siang', 'jam_sore','aktif'], 'string'],
      //      [['id_ref_jenis_izin'], 'string', 'max' => 50],
            [['id_data_petugas_loket'], 'exist', 'skipOnError' => true, 'targetClass' => DataPetugasLoket::className(), 'targetAttribute' => ['id_data_petugas_loket' => 'id']],
            [['id_ref_loket'], 'exist', 'skipOnError' => true, 'targetClass' => RefLoket::className(), 'targetAttribute' => ['id_ref_loket' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_data_petugas_loket' => 'Id Data Petugas Loket',
            'id_ref_loket' => 'Id Ref Loket',
            'tgl_masuk' => 'Tgl Masuk',
            'jam_pagi' => 'Jam Pagi',
            'jam_siang' => 'Jam Siang',
            'jam_sore' => 'Jam Sore',
            'id_ref_jenis_izin' => 'Id Ref Jenis Izin',
            'aktif' => 'Aktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataPetugasLoket()
    {
        return $this->hasOne(DataPetugasLoket::className(), ['id' => 'id_data_petugas_loket']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefLoket()
    {
        return $this->hasOne(RefLoket::className(), ['id' => 'id_ref_loket']);
    }
}
