<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "data_hasil_tinjauan".
 *
 * @property int $id
 * @property int $no_registrasi
 * @property int $id_pemohon_pengajuan
 * @property string $id_tim_teknis
 * @property string $keterangan
 */
class DataHasilTinjauan extends \yii\db\ActiveRecord
{
        public $imgfile;
 
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_hasil_tinjauan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
                   [['imgfile'],'file','skipOnEmpty'=>false],
    [['no_registrasi', 'id_pemohon_pengajuan'], 'integer'],
            [['id_tim_teknis', 'keterangan'], 'required'],
            [['keterangan'], 'string'],
            [['id_tim_teknis'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_registrasi' => 'No Registrasi',
            'id_pemohon_pengajuan' => 'Id Pemohon Pengajuan',
            'id_tim_teknis' => 'Id Tim Teknis',
            'keterangan' => 'Keterangan',
        ];
    }
 
}
