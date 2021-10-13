<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "berita_acara".
 *
 * @property int $id
 * @property string $id_pemohon_pengajuan
 * @property string $no_berita
 * @property string $tgl_berita
 * @property string $isi_berita
 * @property string $file_berita

 */
class BeritaAcara extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'berita_acara';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imageFile'], 'required'],
            [['id','id_pemohon_pengajuan'], 'integer'],
            [['imageFile'],'file','skipOnEmpty'=>false],
            [['tgl_berita'], 'safe'],
            [['isi_berita','file_berita'], 'string'],
            [['no_berita'], 'string', 'max' => 50],
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
            'no_berita' => 'No Berita',
            'tgl_berita' => 'Tgl Berita',
            'isi_berita' => 'Isi Berita',
            'id_tim_teknis' => 'Id Tim Teknis',
            'id_pemohon_pengajuan' => 'Id Pemohon Pengajuan',
        ];
    }
    
    
public function beforeSave($insert) {
    $this->tgl_berita = \Yii::$app->formatter->asDate($this->tgl_berita, 'yyyy-MM-dd');
           return parent::beforeSave($insert);
          }
}
