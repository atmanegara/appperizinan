<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_media_alat".
 *
 * @property int $id
 * @property string $jenis_alat
 * @property string $aktf
 */
class RefMediaAlat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_media_alat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aktf'], 'string'],
            [['jenis_alat'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_alat' => 'Jenis Alat',
            'aktf' => 'Aktf',
        ];
    }
}
