<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "data_tarif_reklame".
 *
 * @property int $id
 * @property int $id_ref_reklame
 * @property string $alat_media isinya jenis_reklame + alat/media reklame
 * @property string $waktu
 * @property string $tarif
 *
 * @property RefJenisReklame $refReklame
 */
class DataTarifReklame extends \yii\db\ActiveRecord
{
    public $model_alatmedia;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_tarif_reklame';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ref_reklame'], 'integer'],
            [['model_alatmedia'],'safe'],
       //  [['alat_media'], 'string'],
            [['tarif'], 'number'],
            [['waktu'], 'string', 'max' => 50],
            [['id_ref_reklame'], 'exist', 'skipOnError' => true, 'targetClass' => RefJenisReklame::className(), 'targetAttribute' => ['id_ref_reklame' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_ref_reklame' => 'Id Ref Reklame',
            'alat_media' => 'Alat Media',
            'waktu' => 'Waktu',
            'tarif' => 'Tarif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefReklame()
    {
        return $this->hasOne(RefJenisReklame::className(), ['id' => 'id_ref_reklame']);
    }
}
