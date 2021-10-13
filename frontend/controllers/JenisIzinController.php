<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\controllers;

/**
 * Description of JenisIzinController
 *
 * @author Administrator
 */

use Yii;
use yii\web\Controller;
use backend\models\RefJenisIzin;
use backend\models\DetailJenisIzin;
use yii\data\ActiveDataProvider;

class JenisIzinController extends Controller{
    //put your code here
    
    public function actionIndex()
    {
        $model = RefJenisIzin::find()->all();
        
//        $dataProvider = new ActiveDataProvider([
//            'query'=>$model
//        ]);
        
        return $this->render('index',[
        'model'=>$model
        ]);
    }
}
