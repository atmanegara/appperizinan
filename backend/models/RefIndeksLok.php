<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_indeks_lok".
 *
 * @property int $id
 * @property string $nm_jns_index
 * @property int $nilai_index
 */
class RefIndeksLok extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_indeks_lok';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nilai_index'], 'integer'],
            [['nm_jns_index'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_jns_index' => 'Nm Jns Index',
            'nilai_index' => 'Nilai Index',
        ];
    }
}
