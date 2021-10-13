<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_jenis_reklame".
 *
 * @property int $id
 * @property string $jenis_reklame
 * @property string $aktif
 *
 * @property DataTarifReklame[] $dataTarifReklames
 */
class RefJenisReklame extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_jenis_reklame';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aktif'], 'string'],
            [['jenis_reklame'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_reklame' => 'Jenis Reklame',
            'aktif' => 'Aktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataTarifReklames()
    {
        return $this->hasMany(DataTarifReklame::className(), ['id_ref_reklame' => 'id']);
    }
}
