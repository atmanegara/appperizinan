<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_tanda_tangan".
 *
 * @property int $id
 * @property string $nip
 * @property string $nm_pejabat
 * @property string $jabatan
 * @property string $status_ttd
 */
class RefTandaTangan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_tanda_tangan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_ttd'], 'string'],
            [['nip', 'nm_pejabat', 'jabatan'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nip' => 'Nip',
            'nm_pejabat' => 'Nm Pejabat',
            'jabatan' => 'Jabatan',
            'status_ttd' => 'Status Ttd',
        ];
    }
}
