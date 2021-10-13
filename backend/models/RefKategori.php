<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_kategori".
 *
 * @property int $id
 * @property string $nm_kategori
 */
class RefKategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nm_kategori'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_kategori' => 'Nm Kategori',
        ];
    }
}
