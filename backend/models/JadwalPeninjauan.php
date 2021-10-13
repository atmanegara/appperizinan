<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jadwal_peninjauan".
 *
 * @property int $id
 * @property int $id_pemohon_pengajuan
 * @property int $id_tim_teknis
 * @property string $tgl_peninjauan
 * @property string $ket
 */
class JadwalPeninjauan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jadwal_peninjauan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemohon_pengajuan', 'id_tim_teknis'], 'integer'],
            [['tgl_peninjauan'], 'safe'],
            [['ket'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pemohon_pengajuan' => 'Id Pemohon Pengajuan',
            'id_tim_teknis' => 'Id Tim Teknis',
            'tgl_peninjauan' => 'Tgl Peninjauan',
            'ket' => 'Ket',
        ];
    }
}
