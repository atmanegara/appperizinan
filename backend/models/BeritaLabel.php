<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "berita_label".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $active
 *
 * @property Berita[] $ejafungBeritas
 * @property Qanda[] $ejafungQandas
 */
class BeritaLabel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'berita_label';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['active'], 'integer'],
            [['nama'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_label' => 'Id Label',
            'nama' => 'Nama',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeritas()
    {
        return $this->hasMany(Berita::className(), ['id_label' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQandas()
    {
        return $this->hasMany(Qanda::className(), ['id_label' => 'id']);
    }
}
