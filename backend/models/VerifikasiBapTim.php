<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "verifikasi_bap_tim".
 *
 * @property int $id
 * @property int $id_pemohon_pengajuan
 * @property int $id_berita_acara
 * @property int $status_verifikasi 1:setuju,2:batal
 * @property string $catatan
 *
 * @property BeritaAcara $beritaAcara
 */
class VerifikasiBapTim extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'verifikasi_bap_tim';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemohon_pengajuan', 'id_berita_acara', 'status_verifikasi'], 'integer'],
            [['catatan'], 'string'],
            [['id_berita_acara'], 'exist', 'skipOnError' => true, 'targetClass' => BeritaAcara::className(), 'targetAttribute' => ['id_berita_acara' => 'id']],
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
            'id_berita_acara' => 'Id Berita Acara',
            'status_verifikasi' => 'Status Verifikasi',
            'catatan' => 'Catatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeritaAcara()
    {
        return $this->hasOne(BeritaAcara::className(), ['id' => 'id_berita_acara']);
    }
}
