<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pemohon_sewa".
 *
 * @property int $id
 * @property string $no_reg_sewa
 * @property int $id_data_pemohon
 * @property int $id_bangunan
 * @property int $biaya_sewa
 * @property string $hari
 * @property string $tgl_sewa
 * @property string $jam_awal
 * @property string $jam_akhir
 * @property string $kegunaan
 * @property string $nm_pnggung_jwb
 * @property string $telp
 */
class PemohonSewa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemohon_sewa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'no_reg_sewa'], 'required'],
            [['id', 'id_data_pemohon', 'id_bangunan', 'biaya_sewa'], 'integer'],
            [['tgl_sewa', 'jam_awal', 'jam_akhir'], 'safe'],
            [['kegunaan'], 'string'],
            [['no_reg_sewa', 'hari', 'nm_pnggung_jwb', 'telp'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_reg_sewa' => 'No Reg Sewa',
            'id_data_pemohon' => 'Id Data Pemohon',
            'id_bangunan' => 'Nama Bangunan',
            'biaya_sewa' => 'Biaya Sewa',
            'hari' => 'Hari',
            'tgl_sewa' => 'Tgl Sewa',
            'jam_awal' => 'Jam Awal',
            'jam_akhir' => 'Jam Akhir',
            'kegunaan' => 'Di Gunakan Untuk',
            'nm_pnggung_jwb' => 'Penanggung Jawab Kegiatan / Panitia Acara / Pimpinan',
            'telp' => 'Telp (Aktif)',
        ];
    }
}
