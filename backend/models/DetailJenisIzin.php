<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detail_jenis_izin".
 *
 * @property int $id
 * @property int $id_jenis_izin
 * @property int $id_jenis_permohonan
 * @property int $no_urut
 * @property string $nm_dok
 */
class DetailJenisIzin extends \yii\db\ActiveRecord
{
    public $nm_jenis_izin;
    public $nm_jenis_permohonan;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_jenis_izin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
          [[ 'id_jenis_izin', 'id_jenis_permohonan','no_urut','nm_dok'], 'required','message'=>'Wajib Di Isi'],
            [[ 'id_jenis_izin', 'id_jenis_permohonan', 'no_urut'], 'integer'],
            [['nm_dok'], 'string', 'max' => 160],
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
            'id_jenis_izin' => 'Id Jenis Izin',
            'id_jenis_permohonan' => 'Id Jenis Permohonan',
            'no_urut' => 'No Urut',
            'nm_dok' => 'Nm Dok',
        ];
    }
}
