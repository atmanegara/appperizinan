<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "persetujuan_permohonan".
 *
 * @property int $id
 * @property string $no_registrasi
 * @property string $pilih
 */
class PersetujuanPermohonan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'persetujuan_permohonan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pilih'], 'string'],
            [['no_registrasi'], 'string', 'max' => 50],
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
            'pilih' => 'Pilih',
        ];
    }
}
