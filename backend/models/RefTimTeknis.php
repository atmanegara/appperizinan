<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_tim_teknis".
 *
 * @property int $id
 * @property string $nm_teknisi
 * @property string $status_tim
 * @property string $tgl_terbentuk
 */
class RefTimTeknis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_tim_teknis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nm_teknisi','status_tim'], 'string', 'max' => 50],
            [['tgl_terbentuk'],'safe']
        ];
    }
public function beforeSave($insert) {
    $this->tgl_terbentuk = Yii::$app->formatter->asDate(strtotime($this->tgl_terbentuk),'php:Y-m-d');
     parent::beforeSave($insert);
     return true;
}
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_teknisi' => 'Nm Teknisi',
        ];
    }
    
    public static function getDataRefTimTeknis()
    {
        $array = RefTimTeknis::find()
                ->where(['status_tim'=>'Y'])
                ->all();
        
        return \yii\helpers\ArrayHelper::map($array, 'id', 'nm_teknisi');
    }
}
