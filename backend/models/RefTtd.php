<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_ttd".
 *
 * @property int $id
 * @property string $kode_rpt
 * @property string $nip_ttd
 * @property string $nm_ttd
 * @property string $jbt_ttd
 * @property string $status
 */
class RefTtd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_ttd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'string'],
            [['kode_rpt', 'nip_ttd', 'nm_ttd', 'jbt_ttd'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_rpt' => 'Kode Rpt',
            'nip_ttd' => 'Nip Ttd',
            'nm_ttd' => 'Nm Ttd',
            'jbt_ttd' => 'Jbt Ttd',
            'status' => 'Status',
        ];
    }
}
