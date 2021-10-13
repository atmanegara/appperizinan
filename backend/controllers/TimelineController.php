<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\controllers;
use Yii;
use yii\web\Controller;
/**
 * Description of TimelineController
 *
 * @author User
 */
class TimelineController extends Controller{
    //put your code here
    
    
    public function actionIndex(){
        
        return $this->renderAjax('index');
    }
}
