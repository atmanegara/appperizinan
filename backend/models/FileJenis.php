<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "file_jenis".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $active
 *
 * @property File[] $ejafungFiles
 */
class FileJenis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file_jenis';
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
            'nama' => 'Nama',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['id_file_jenis' => 'id']);
    }

    public static function name ($id)
    {
        $model = FileJenis::find()
                ->where(['id'=>$id])
                ->one();

        return $model['nama'];
    }
}
