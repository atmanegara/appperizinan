<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "file_hasil_tinjauan".
 *
 * @property int $id
 * @property int $tahun
 * @property string $no_registrasi
 * @property string $tgl_upload
 * @property string $file_tinjauan
 */
class FileHasilTinjauan extends \yii\db\ActiveRecord
{
    public $imgfile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file_hasil_tinjauan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imgfile'],'file','skipOnEmpty'=>false],
            [['id'], 'required'],
            [['id', 'tahun'], 'integer'],
            [['tgl_upload'], 'safe'],
            [['no_registrasi'], 'string', 'max' => 50],
            [['file_tinjauan'], 'string', 'max' => 70],
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
            'tahun' => 'Tahun',
            'no_registrasi' => 'No Registrasi',
            'tgl_upload' => 'Tgl Upload',
            'file_tinjauan' => 'File Tinjauan',
        ];
    }
    public function getNewTitle()
    {
        return 'New:' . $this->no_registrasi;
    }
}
