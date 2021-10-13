<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "data_pemohon".
 *
 * @property int $id
 * @property int $id_tipe_pemohon
 * @property string $no_ktp
 * @property string $no_npwp
 * @property string $id_jns_bdn_usaha
 * @property string $nm_pemohon
 * @property string $nm_pmilik_bu nama pemilik badan usaha
 * @property string $alamat_pemohon
 * @property string $id_prov
 * @property string $id_kabkot
 * @property string $id_desa
 * @property string $id_kec
 * @property string $email_pemohon
 * @property string $telp_pemohon
 */
class DataPemohon extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_pemohon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tipe_pemohon','id_prov','id_kabkot', 'id_desa', 'id_kec'], 'integer'],
            [['no_ktp', 'no_npwp', 'id_jns_bdn_usaha', 'nm_pemohon', 'nm_pmilik_bu', 'alamat_pemohon', 'email_pemohon', 'telp_pemohon'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_tipe_pemohon' => 'Id Tipe Pemohon',
            'no_ktp' => 'No Ktp',
            'no_npwp' => 'No Npwp',
            'id_jns_bdn_usaha' => 'Id Jns Bdn Usaha',
            'nm_pemohon' => 'Nm Pemohon',
            'nm_pmilik_bu' => 'Nm Pmilik Bu',
            'alamat_pemohon' => 'Alamat Pemohon',
            'id_desa' => 'Id Desa',
            'id_kec' => 'Id Kec',
            'email_pemohon' => 'Email Pemohon',
            'telp_pemohon' => 'Telp Pemohon',
        ];
    }
}
