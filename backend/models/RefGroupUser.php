<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_group_user".
 *
 * @property int $id
 * @property string $kode
 * @property string $uraian
 * @property string $url
 * @property string $layout_menu
 */
class RefGroupUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_group_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode'], 'required'],
            [['kode'], 'string', 'max' => 10],
            [['uraian'], 'string', 'max' => 50],
            [['url'], 'string', 'max' => 160],
            [['layout_menu'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'uraian' => 'Uraian',
            'url' => 'Url',
            'layout_menu' => 'Layout Menu',
        ];
    }
}
