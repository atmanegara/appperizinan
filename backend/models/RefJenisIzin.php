<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_jenis_izin".
 *
 * @property int $id
 * @property string $kd_jenis_izin
 * @property string $nm_jenis_izin
 */
class RefJenisIzin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_jenis_izin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_jenis_izin'], 'required'],
            [['kd_jenis_izin', 'nm_jenis_izin'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kd_jenis_izin' => 'Kode Jenis Izin',
            'nm_jenis_izin' => 'Nama Jenis Izin',
        ];
    }
    
    public static function getDataRefJenisIzin()
    {
        $array = RefJenisIzin::find()
                ->all();
        return \yii\helpers\ArrayHelper::map($array, 'id','nm_jenis_izin');
    }
}
