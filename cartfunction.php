<?php

function get_cart_item_count(){
  if(isset($_SESSION['medicine'])){
    return count($_SESSION['medicine']);	
  }
}


function get_cart_total(){
  $total=0;
  if(isset($_SESSION['medicine'])){
	foreach($_SESSION['medicine'] as $key=>$value){
      $total=$total+($value['unitPrice']*$value['quantity']);
    }	
  }
  return $total;
}
?>