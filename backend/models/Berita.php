<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "berita".
 *
 * @property integer $id
 * @property integer $id_label
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $slug
 * @property integer $id_user
 * @property string $date
 * @property string $timestamp
 *
 * @property BeritaLabel $idLabel
 */
class Berita extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'berita';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_label', 'title', 'content'], 'required'],
            [['id_label', 'id_user'], 'integer'],
            [['content'], 'string'],
            [['date', 'timestamp', 'slug', 'id_user'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 255],
            [['slug'], 'string', 'max' => 128],
            [['id_label'], 'exist', 'skipOnError' => true, 'targetClass' => BeritaLabel::className(), 'targetAttribute' => ['id_label' => 'id']],
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
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'slug' => 'Slug',
            'id_user' => 'Id User',
            'date' => 'Date',
            'timestamp' => 'Timestamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLabel()
    {
        return $this->hasOne(BeritaLabel::className(), ['id' => 'id_label']);
    }
    
    public static function getDescription($content)
    {
      $words = 30;
      if(\yii\helpers\StringHelper::countWords($content)>$words){
          return \yii\helpers\StringHelper::truncateWords($content, $words);
      }
    }
}
