<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "izin_ho".
 *
 * @property int $id
 * @property int $id_data_pemohon
 * @property int $jns_tl Jenis Tarif Lingkungan
 * @property int $kawasan
 * @property int $luas_tinggi
 * @property int $jns_jalan Jenis Jalan (Index Lokasi)
 * @property int $id_ref_nilai_skala
 * @property double $nilai_investasi
 * @property int $tarif_retribusi
 *
 * @property DataPemohon $dataPemohon
 * @property PemohonPengajuan $pemohonPengajuan
 */
class IzinHo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'izin_ho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_data_pemohon', 'jns_tl', 'kawasan', 'luas_tinggi', 'jns_jalan', 'id_ref_nilai_skala', 'tarif_retribusi'], 'integer'],
            [['nilai_investasi'], 'number'],
            [['no_registrasi'],'string'],
            [['id_data_pemohon'], 'exist', 'skipOnError' => true, 'targetClass' => DataPemohon::className(), 'targetAttribute' => ['id_data_pemohon' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_data_pemohon' => 'Id Data Pemohon',
            'jns_tl' => 'Jns Tl',
            'kawasan' => 'Kawasan',
            'luas_tinggi' => 'Luas Tinggi',
            'jns_jalan' => 'Jns Jalan',
            'id_ref_nilai_skala' => 'Id Ref Nilai Skala',
            'nilai_investasi' => 'Nilai Investasi',
            'tarif_retribusi' => 'Tarif Retribusi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataPemohon()
    {
        return $this->hasOne(DataPemohon::className(), ['id' => 'id_data_pemohon']);
    }
     public function getPemohonPengajuan()
    {
        return $this->hasOne(PemohonPengajuan::className(), ['no_registrasi' => 'no_registrasi']);
    }
}
