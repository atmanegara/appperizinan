<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "daftar_formulir".
 *
 * @property int $id
 * @property string $nm_formulir
 * @property string $file_formulir
 */
class DaftarFormulir extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'daftar_formulir';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['nm_formulir', 'file_formulir'], 'string', 'max' => 50],
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
            'nm_formulir' => 'Nm Formulir',
            'file_formulir' => 'File Formulir',
        ];
    }
}
