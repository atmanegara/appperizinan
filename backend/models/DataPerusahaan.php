<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "data_perusahaan".
 *
 * @property int $id
 * @property int $id_pemohon
 * @property string $no_npwp
 * @property string $nm_perusahaan
 * @property string $nm_gedung
 * @property string $lantai
 * @property string $alamat
 * @property string $rt
 * @property string $rw
 * @property int $id_prov
 * @property int $id_kab
 * @property int $id_kec
 * @property string $kodepos
 * @property string $telp
 * @property string $fax
 * @property string $email
 * @property string $lat
 * @property string $long
 */
class DataPerusahaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_perusahaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_prov', 'id_kab', 'id_kec','id_ref_jenis_bdn_usaha'], 'integer'],
            [['no_npwp', 'nm_perusahaan', 'nm_gedung', 'lat', 'long'], 'string', 'max' => 50],
            [['no_npwp', 'nm_perusahaan', 'nm_gedung', 'id_ref_jenis_bdn_usaha', 'alamat','telp'], 'required'],
            [['lantai', 'kodepos'], 'string', 'max' => 10],
            [['alamat'], 'string', 'max' => 160],
            [['rt', 'rw'], 'string', 'max' => 5],
            [['telp', 'fax', 'email'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_npwp' => 'No Npwp',
            'nm_perusahaan' => 'Nama Perusahaan',
            'nm_gedung' => 'Nama Gedung',
            'lantai' => 'Lantai',
            'alamat' => 'Alamat',
            'rt' => 'Rt',
            'rw' => 'Rw',
            'id_prov' => 'Provinsi',
            'id_kab' => 'Kabuoaten',
            'id_kec' => 'Kecamatan',
            'kodepos' => 'Kodepos',
            'telp' => 'Telp',
            'fax' => 'Fax',
            'email' => 'Email',
            'lat' => 'Lat',
            'long' => 'Long',
        ];
    }
}
