<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ref_tipe_pemohon".
 *
 * @property int $id
 * @property string $kdjenis
 * @property string $nmjenis
 */
class RefTipePemohon extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_tipe_pemohon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kdjenis', 'nmjenis'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kdjenis' => 'Kdjenis',
            'nmjenis' => 'Nmjenis',
        ];
    }
    
    public static function getDataTipePemohon()
    {
        $array = RefTipePemohon::find()->where(['aktif'=>'Y'])
                ->all();
        return \yii\helpers\ArrayHelper::map($array, 'id','nmjenis');
    }
}
