<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_loket".
 *
 * @property int $id
 * @property string $nama_loket
 * @property string $aktif
 *
 * @property JadwalPetugasLoket[] $jadwalPetugasLokets
 */
class RefLoket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_loket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
               [['nama_loket','aktif'], 'required','message'=>'Wajib di isi'],
            [['nama_loket'], 'string'],
            [['aktif'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_loket' => 'Nama Loket',
            'aktif' => 'Aktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwalPetugasLokets()
    {
        return $this->hasMany(JadwalPetugasLoket::className(), ['id_ref_loket' => 'id']);
    }
}
