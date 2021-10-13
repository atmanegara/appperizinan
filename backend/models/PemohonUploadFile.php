<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pemohon_upload_file".
 *
 * @property int $id
 * @property int $tahun
 * @property int $no_registrasi
 * @property int $id_jenis_izin
 * @property int $id_jenis_permohonan
 * @property int id_detail_jenis_izin
 * @property string $data_file_upload
 * @property int $status_berkas
 */
class PemohonUploadFile extends \yii\db\ActiveRecord
{
    public $filedoc;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemohon_upload_file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filedoc'],'file','skipOnEmpty'=>false],
            [['tahun','id_detail_jenis_izin','status_berkas'], 'integer'],
            [['data_file_upload'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tahun' => 'Tahun',
            'no_registrasi' => 'No Registrasi',
            'id_jenis_izin' => 'Id Jenis Izin',
            'id_jenis_permohonan' => 'Id Jenis Permohonan',
            'data_file_upload' => 'Data File Upload',
        ];
    }
}
