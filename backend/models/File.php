<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property integer $id
 * @property integer $id_file_jenis
 * @property integer $id_post
 * @property integer $position
 * @property string $title
 * @property string $description
 * @property string $filename
 * @property string $timestamp
 *
 * @property FileJenis $idFileJenis
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position', 'title', 'description', 'filename'], 'required'],
            [['id', 'id_file_jenis', 'id_post', 'position'], 'integer'],
            [['id', 'id_file_jenis', 'id_post', 'timestamp'], 'safe'],
            [['title', 'filename'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
            [['id_file_jenis'], 'exist', 'skipOnError' => true, 'targetClass' => FileJenis::className(), 'targetAttribute' => ['id_file_jenis' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_file_jenis' => 'File Jenis',
            'id_post' => 'Post',
            'position' => 'Position',
            'title' => 'Title',
            'description' => 'Description',
            'filename' => 'Filename',
            'timestamp' => 'Timestamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFileJenis()
    {
        return $this->hasOne(FileJenis::className(), ['id' => 'id_file_jenis']);
    }
}
