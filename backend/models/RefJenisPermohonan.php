<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_jenis_permohonan".
 *
 * @property int $id
 * @property string $nm_jenis_permohonan
 */
class RefJenisPermohonan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_jenis_permohonan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nm_jenis_permohonan'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_jenis_permohonan' => 'Nama Jenis Permohonan',
        ];
    }
    
    public static function getDataJenisPermohonan()
    {
        $array = RefJenisPermohonan::find()->all();
        
        return \yii\helpers\ArrayHelper::map($array, 'id', 'nm_jenis_permohonan');
    }
}
