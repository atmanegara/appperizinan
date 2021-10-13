<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "legalitas_perusahaan".
 *
 * @property int $id
 * @property int $id_data_perusahaan
 * @property string $no_akta
 * @property string $tgl_berdiri
 * @property string $nm_notaris
 * @property string $no_sk_pengesahan
 * @property string $tgl_pengesahan
 */
class LegalitasPerusahaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'legalitas_perusahaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_data_perusahaan'], 'integer'],
            [['tgl_berdiri', 'tgl_pengesahan'], 'safe'],
            [['no_akta', 'nm_notaris', 'no_sk_pengesahan'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_data_perusahaan' => 'Id Data Perusahaan',
            'no_akta' => 'No Akta',
            'tgl_berdiri' => 'Tgl Berdiri',
            'nm_notaris' => 'Nm Notaris',
            'no_sk_pengesahan' => 'No Sk Pengesahan',
            'tgl_pengesahan' => 'Tgl Pengesahan',
        ];
    }
}
