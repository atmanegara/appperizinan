<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "penetapan_nomor".
 *
 * @property int $id
 * @property int $id_pemohon_pengajuan
 * @property string $no_sk
 * @property string $tgl_sk
 * @property string $tgl_tempo_sk
 */
class PenetapanNomor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penetapan_nomor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemohon_pengajuan'], 'integer'],
            [['tgl_sk', 'tgl_tempo_sk'], 'safe'],
            [['no_sk'], 'string', 'max' => 50],
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
            'no_sk' => 'No Sk',
            'tgl_sk' => 'Tgl Sk',
            'tgl_tempo_sk' => 'Tgl Tempo Sk',
        ];
    }
    
    public static function getPenetapanNomor(){
        $array = PenetapanNomor::find()->asArray()
                ->all();
        return $array;
    }
}
