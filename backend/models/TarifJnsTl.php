<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tarif_jns_tl".
 *
 * @property int $id
 * @property int $id_ref_jns_tl
 * @property int $id_lok_jns_tl
 * @property double $awal_luas_t
 * @property double $akhir_luas_t
 * @property double $tarif
 */
class TarifJnsTl extends \yii\db\ActiveRecord
{
    public $nm_jns_lok_tl;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tarif_jns_tl';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ref_jns_tl', 'id_lok_jns_tl'], 'integer'],
            [['awal_luas_t', 'akhir_luas_t', 'tarif'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_ref_jns_tl' => 'Id Ref Jns Tl',
            'id_lok_jns_tl' => 'Id Lok Jns Tl',
            'awal_luas_t' => 'Awal Luas T',
            'akhir_luas_t' => 'Akhir Luas T',
            'tarif' => 'Tarif',
        ];
    }
}
