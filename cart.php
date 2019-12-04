<?php
include("dbConnection.php");
if(isset($_GET['action'])){
if(isset($_GET['medicineId']) && $_GET['action']=="addtocart"){
	$id=$_GET['medicineId']; 
	if(isset($_SESSION['medicine'][$id])){
		print_r( $_SESSION['mediciene'][$id]);
		$_SESSION['medicine'][$id]['quantity']++;
        $_SESSION['pro_msg']='<div class="alert alert-success"> You Have Already Added this  product and  +1  product  quantity added in Cart.
			</div>';		
		}else{
	       $sql="SELECT * FROM medicine WHERE medicineId='$id'";
		   $result= mysqli_query($connection ,$sql);
		   while($row=mysqli_fetch_array($result)){
		     $_SESSION['medicine'][$row['medicineId']]=array('medicineName'=>$row['medicineName'],'medicineId'=>$row['medicineId'],'quantity'=>1,'unitPrice'=>$row['unitPrice'],'medicinePhoto'=>$row['medicinePhoto']); 
		  }
           $_SESSION['pro_msg']='<div class="alert alert-success">
  You Have successfylly add this product in Cart.<a class="close" href="#" data-dismiss="alert">
<i class="fa fa-times-circle"></i>
</a>
</div>';	
		}
	}
	//for remove
	else if(isset($_GET['medicineId']) && $_GET['action']=="remove"){
	$id=$_GET['medicineId'];
	if(isset($_SESSION['medicine'][$id])){
		if($_SESSION['medicine'][$id]['quantity']>1){
		    $_SESSION['medicine'][$id]['quantity']--;	
		}else{
			unset($_SESSION['medicine'][$id]);
			}
		}
	}else if(isset($_GET['action'])=="removecart"){
        foreach($_SESSION['medicine'] as $cart=>$value){
		  unset($_SESSION['subtotal']);			
		  unset($_SESSION['medicine'][$cart]);
          header('Location: index.php');		
	    }	
	}	
}	
?>