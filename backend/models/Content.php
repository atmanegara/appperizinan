<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property integer $id
 * @property string $type
 * @property integer $position
 * @property string $title
 * @property string $content
 * @property integer $id_user
 * @property string $timestamp
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'position'], 'required'],
            [['type', 'content'], 'string'],
            [['position', 'id_user'], 'integer'],
            [['id_user', 'timestamp'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'position' => 'Position',
            'title' => 'Title',
            'content' => 'Content',
            'id_user' => 'Id User',
            'timestamp' => 'Timestamp',
        ];
    }
}
