<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_header".
 *
 * @property int $id
 * @property string $nama_menu
 * @property string $icon
 * @property string $url
 * @property string $group_menu
 * @property string $sub_menu
 * @property string $group_user
 * @property string $status_menu
 */
class MenuHeader extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_header';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['urutan'],'integer'],
            [['status_menu'], 'string'],
            [['nama_menu','sub_menu', 'icon', 'url', 'group_menu', 'group_user'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_menu' => 'Nama Menu',
            'icon' => 'Icon',
            'url' => 'Url',
            'group_menu' => 'Group Menu',
            'group_user' => 'Group User',
            'status_menu' => 'Status Menu',
        ];
    }
}
