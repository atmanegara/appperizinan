<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_jenis_bdn_usaha".
 *
 * @property int $id
 * @property string $nm_jns_bdn_usaha
 */
class RefJenisBdnUsaha extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_jenis_bdn_usaha';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nm_jns_bdn_usaha'], 'required'],
            [['nm_jns_bdn_usaha'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_jns_bdn_usaha' => 'Nm Jns Bdn Usaha',
        ];
    }
    
    public static function getDataJenisBdnUsaha()
    {
        $array = RefJenisBdnUsaha::find()
                ->all();
        return \yii\helpers\ArrayHelper::map($array, 'id', 'nm_jns_bdn_usaha');
    }
}
