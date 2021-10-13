<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "data_izin".
 *
 * @property int $id
 * @property int $id_penetapan_nomor
 * @property string $tgl_surat
 * @property string $isi_surat
 * @property string $file_surat
 * @property int $id_ref_ttd
 */
class DataIzin extends \yii\db\ActiveRecord
{
      public $imageFile;
   
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_izin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
                  [['imageFile'], 'required'],
            [['imageFile'],'file','skipOnEmpty'=>false],
            [['id_penetapan_nomor', 'tgl_surat', 'isi_surat', 'file_surat', 'id_ref_ttd'], 'required'],
            [['id_penetapan_nomor', 'id_ref_ttd'], 'integer'],
            [['tgl_surat'], 'safe'],
            [['isi_surat'], 'string'],
            [['file_surat'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_penetapan_nomor' => 'Id Penetapan Nomor',
            'tgl_surat' => 'Tgl Surat',
            'isi_surat' => 'Isi Surat',
            'file_surat' => 'File Surat',
            'id_ref_ttd' => 'Id Ref Ttd',
        ];
    }
}
