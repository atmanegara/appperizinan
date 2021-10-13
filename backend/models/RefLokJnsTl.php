<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_lok_jns_tl".
 *
 * @property int $id
 * @property string $nm_jns_lok_tl
 * @property string $aktif
 */
class RefLokJnsTl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_lok_jns_tl';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nm_jns_lok_tl', 'aktif'], 'required'],
            [['aktif'], 'string'],
            [['nm_jns_tl'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_jns_lok_tl' => 'Nm Jns Tl',
            'aktif' => 'Aktif',
        ];
    }
        public static function NmKawasanById($id){
        $kawasan = RefLokJnsTl::findOne($id);
        return $kawasan['nm_jns_lok_tl'];
    }
}
