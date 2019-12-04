<?php

$filepath = realpath(dirname(__FILE__));
  include_once ('..\helpers/validate.php');
 $validate = new Validate();
$errorMSG = (object) array();

if(isset($_POST["categoryName"])){
 $validation = $validate->check($_POST, 
 array(
  'categoryName' =>array(
  'required'=>true,
  'isname'=>true,
  'unique'=>'medicinecategory',
)));
 }

 if(isset($_POST["categoryDescription"])){
 $validation = $validate->check($_POST, 
 array(
  'categoryDescription' =>array(
  'required'=>true,

)));
 }
 if(isset($_POST["className"])){
 $validation = $validate->check($_POST, 
 array(
  'className' =>array(
  'required'=>true,
  'isname'=>true,
  'unique'=>'medicineclass',
)));
 }

 if(isset($_POST["classDescription"])){
 $validation = $validate->check($_POST, 
 array(
  'classDescription' =>array(
  'required'=>true,

)));
 }

 if(isset($_POST["groupName"])){
 $validation = $validate->check($_POST, 
 array(
  'groupName' =>array(
  'required'=>true,
  'isname' =>true,
  'unique'=>'medicinegroup',

)));
 }

 if(isset($_POST["indications"])){
 $validation = $validate->check($_POST, 
 array(
  'indications' =>array(
  'required'=>true,
  'min'=>30,

)));
 }

 if(isset($_POST["interaction"])){
 $validation = $validate->check($_POST, 
 array(
  'interaction' =>array(
  'required'=>true,
  'min'=>30,

)));
 }

 if(isset($_POST["precaution"])){
 $validation = $validate->check($_POST, 
 array(
  'precaution' =>array(
  'required'=>true,
  'min'=>30,
)));
 }

  if(isset($_POST["sideEffects"])){
 $validation = $validate->check($_POST, 
 array(
  'sideEffects' =>array(
  'required'=>true,
  'min'=>30,
)));
 }

  if(isset($_POST["dosageFormat"])){
 $validation = $validate->check($_POST, 
 array(
  'dosageFormat' =>array(
  'required'=>true,
)));
 }

 if(isset($_POST["location"])){
 $validation = $validate->check($_POST, 
 array(
  'location' =>array(
  'required'=>true,
  'min' => 15,
)));
}

 if(isset($_POST["medicineName"])){
 $validation = $validate->check($_POST, 
 array(
  'medicineName' =>array(
  'required'=>true,
  'unique'=>'medicine',
  'max'=>100,
  
)));
 }

 if(isset($_POST["description"])){
 $validation = $validate->check($_POST, 
 array(
  'description' =>array(
  'required'=>true,
  'min' => 20,
  'max'=> 700,
)));
 }

 if(isset($_POST["drugInteraction"])){
 $validation = $validate->check($_POST, 
 array(
  'drugInteraction' =>array(
  'required'=>true,
  'min' => 15,
  'isname'=>true,
)));
 }

 if(isset($_POST["diseasesInteraction"])){
 $validation = $validate->check($_POST, 
 array(
  'diseasesInteraction' =>array(
  'required'=>true,
  'min' => 15,
  'isname'=> true,
)));
 }

 if(isset($_POST["administration"])){
 $validation = $validate->check($_POST, 
 array(
  'administration' =>array(
  'required'=>true,
)));
 }

 if(isset($_POST["adultDoge"])){
 $validation = $validate->check($_POST, 
 array(
  'adultDoge' =>array(
  'required'=>true,
)));
 }

 if(isset($_POST["childrenDoge"])){
 $validation = $validate->check($_POST, 
 array(
  'childrenDoge' =>array(
  'required'=>true,
)));
 }

 if(isset($_POST["manufacturar"])){
 $validation = $validate->check($_POST, 
 array(
  'manufacturar' =>array(
  'required'=>true,
  'isname'=>true,
)));
 }

 if(isset($_POST["unitPrice"])){
 $validation = $validate->check($_POST, 
 array(
  'unitPrice' =>array(
  'required'=>true,
  'isprice'=>true,
  'maxvalue'=>100000,
  'minvalue'=>1,

)));
 }

 if(isset($_POST["stock"])){
 $validation = $validate->check($_POST, 
 array(
  'stock' =>array(
  'required'=>true,
  'isprice'=>true,
  'minvalue'=>10,
)));
 }

  
  
$name = $validate->errors();



echo json_encode($name);


?>