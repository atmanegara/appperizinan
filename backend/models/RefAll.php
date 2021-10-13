<?php

namespace backend\models;

use yii\base\Model;
use yii\httpclient\Client;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RefAll
 *
 * @author User
 */
class RefAll extends Model{

   public $dataprov;
   public $htmlkabkot;
    public static function getDataProvinsi()
    {
             $client = new Client();
$response = $client->createRequest()        
         ->setMethod('GET')
    ->setUrl('http://api.cyber313.com/wilayah/provinsi')
 //   ->setData(['name' => 'John Doe', 'email' => 'johndoe@example.com'])
    ->send();
if ($response->isOk) {
    $getProv = $response->data['result']['items'];
}
$dataprov=[];
foreach($getProv as $value){
    $dataprov[]=[
        'id'=>$value['id'],
        'nama'=>$value['nama']
    ];
}
return $dataprov;
    }
    
     public static function getDataWilayah($wilayah,$id_parent)
    {
             $client = new Client();
$response = $client->createRequest()        
         ->setMethod('GET')
    ->setUrl('http://api.cyber313.com/wilayah/'.$wilayah.'/'.$id_parent)
//    ->setData(['name' => 'John Doe', 'email' => 'johndoe@example.com'])
    ->send();
if ($response->isOk) {
    $getKabkot = $response->data['result']['items'];
}
$htmlkabkot=' ';
foreach($getKabkot as $value){
   $htmlkabkot .="<option value='".$value['id']."'>".$value['nama']."</option>";
}
return $htmlkabkot;
    }
}
