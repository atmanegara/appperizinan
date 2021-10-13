<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_jns_tl".
 *
 * @property int $id
 * @property string $nm_jns_tl
 */
class RefJnsTl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_jns_tl';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
            'nm_jns_tl' => 'Nm Jns Tl',
        ];
    }
    
    public static function NmJnsTlById($id){
        $nm_jns_tl = RefJnsTl::findOne($id);
        return $nm_jns_tl['nm_jns_tl'];
    }
}
