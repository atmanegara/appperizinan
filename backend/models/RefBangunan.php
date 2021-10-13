<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_bangunan".
 *
 * @property int $id
 * @property string $nm_bangunan
 * @property string $hak_milik
 * @property string $lokasi_bangunan
 */
class RefBangunan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_bangunan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['lokasi_bangunan'], 'string'],
            [['nm_bangunan', 'hak_milik'], 'string', 'max' => 50],
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
            'nm_bangunan' => 'Nm Bangunan',
            'hak_milik' => 'Hak Milik',
            'lokasi_bangunan' => 'Lokasi Bangunan',
        ];
    }
    
    public  static function getDataBangunan(){
        $array = RefBangunan::find()
                ->all();
        return \yii\helpers\ArrayHelper::map($array, 'id','nm_bangunan');
    } 
}
