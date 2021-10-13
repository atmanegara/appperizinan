<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sub_menu".
 *
 * @property int $id
 * @property int $id_menu_header
 * @property string $nama_menu
 * @property string $icon
 * @property string $url
 * @property string $group_user
 * @property int $level_menu
 * @property string $status_menu
 */
class SubMenu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_menu_header', 'level_menu'], 'integer'],
            [['status_menu'], 'string'],
            [['nama_menu', 'icon', 'url', 'group_user'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_menu_header' => 'Id Menu Header',
            'nama_menu' => 'Nama Menu',
            'icon' => 'Icon',
            'url' => 'Url',
            'group_user' => 'Group User',
            'level_menu' => 'Level Menu',
            'status_menu' => 'Status Menu',
        ];
    }
}
