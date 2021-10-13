<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "data_biaya_sewa".
 *
 * @property int $id
 * @property int $id_bangunan
 * @property int $biaya
 * @property int $lama
 */
class DataBiayaSewa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_biaya_sewa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'id_bangunan', 'biaya', 'lama'], 'integer'],
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
            'id_bangunan' => 'Id Bangunan',
            'biaya' => 'Biaya',
            'lama' => 'Lama',
        ];
    }
    public static function getDataSewa($id_bangunan)
    {
        $sewa = (new \yii\db\Query())
                ->select('a.id,b.nm_bangunan,b.biaya')
                ->from('data_biaya_sewa a')
                ->innerJoin(['ref_bangunan b','a.id_bangunan=b.id'])->where([
                    'a.id_bangunan'=>$id_bangunan
                ])->one();
        return $sewa['biaya'];
    }
}
