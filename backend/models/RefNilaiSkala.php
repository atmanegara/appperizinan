<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_nilai_skala".
 *
 * @property int $id
 * @property int $kd_gol
 * @property int $id_ref_kategori
 * @property double $skala_1
 * @property double $skala_2
 * @property double $tarif
 */
class RefNilaiSkala extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_nilai_skala';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_gol', 'id_ref_kategori'], 'integer'],
            [['skala_1', 'skala_2', 'tarif'], 'number'],
            [['ket'],'string']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kd_gol' => 'Kd Gol',
            'id_ref_kategori' => 'Id Ref Kategori',
            'skala_1' => 'Skala 1',
            'skala_2' => 'Skala 2',
            'tarif' => 'Tarif',
        ];
    }
    public static function getKetById($id){
        $ket = RefNilaiSkala::findOne($id);
        return $ket['ket'];
    }
}
