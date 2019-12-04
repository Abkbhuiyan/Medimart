<?php

$filepath = realpath(dirname(__FILE__));
  include_once ('helpers/validate.php');
 $validate = new Validate();
$errorMSG = (object) array();


 if(isset($_POST["firstName"])){
 $validation = $validate->check($_POST, 
 array(
  'firstName' =>array(
  'required'=>true,
  'max' => 40,
  'isname'=>true,
)));
 }

 if(isset($_POST["lastName"])){
 $validation = $validate->check($_POST, 
 array(
  'lastName' =>array(
  'required'=>true,
  'max' => 40,
  'isname'=>true,
)));
 }

 if(isset($_POST["email"])){
 $validation = $validate->check($_POST, 
 array(
  'email' => array(
  'required'=>true,
  'max' => 100,
  'isemail' => true,
  'unique' => 'users',
)));
 }

 if(isset($_POST["phoneNo"])){
 $validation = $validate->check($_POST, 
 array(
  'phoneNo' => array(
  'required'=>true,
  'numeric'=>true,
  'lengthmatch' =>11,
)));
 }

 if(isset($_POST["streetAddress"])){
 $validation = $validate->check($_POST, 
 array(
  'streetAddress' => array(
  'required'=>true, 
)));
 }

 if(isset($_POST["postalCode"])){
 $validation = $validate->check($_POST, 
 array(
  'postalCode' => array(

  'numeric'=>true,
  'lengthmatch' =>4,
)));
 }


if(isset($_POST["district"])){
 $validation = $validate->check($_POST, 
 array(
  
  'district' => array(
  'alphabetic'=>true,
)));
 }


if(isset($_POST["city"])){
 $validation = $validate->check($_POST, 
 array(
  'city' => array(
  'alphabetic'=>true,
)));
 }


if(isset($_POST["password"])){
 $validation = $validate->check($_POST, 
 array(
   'password' => array(
  'required'=>true,
  'min' =>6,
  'max' =>20,
  'password'=>true,
)));
 }


  
  
$name = $validate->errors();



echo json_encode($name);


?>