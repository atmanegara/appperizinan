<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detail_tim_teknis".
 *
 * @property int $id
 * @property int $id_tim_teknis
 * @property string $nip
 * @property string $nama
 * @property string $jabatan
 * @property string $ket
 *
 * @property RefTimTeknis $timTeknis
 */
class DetailTimTeknis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_tim_teknis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tim_teknis'], 'integer'],
            [['nip'], 'string', 'max' => 50],
            [['nama', 'jabatan', 'ket'], 'string', 'max' => 160],
            [['id_tim_teknis'], 'exist', 'skipOnError' => true, 'targetClass' => RefTimTeknis::className(), 'targetAttribute' => ['id_tim_teknis' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_tim_teknis' => 'Id Tim Teknis',
            'nip' => 'Nip',
            'nama' => 'Nama',
            'jabatan' => 'Jabatan',
            'ket' => 'Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimTeknis()
    {
        return $this->hasOne(RefTimTeknis::className(), ['id' => 'id_tim_teknis']);
    }
}
