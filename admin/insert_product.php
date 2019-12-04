
<?php 
include_once 'db_connection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 
 ?>






<?php 

$u_id = $_SESSION['id'] ;
if(isset($_POST['add_prodcut']))

 $u_id = $_SESSION['id'] ;
  extract($_REQUEST);
  //var_dump($_REQUEST);
$target = "productPhoto/";
$tmp_file = $_FILES['product_photo']['tmp_name'];
$ext = pathinfo($_FILES["product_photo"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$post_image = $rand.".".$ext;
 

if( move_uploaded_file($tmp_file,"productPhoto/".$post_image)){
    
   $sql_query1="INSERT INTO `addproduct`(`user_id`,`product_name`, `product_category`, `product_price`, `product_quantity`, `product_description`, `product_photo`, `company`,`weight`) 
            VALUES 
            ('$u_id','$product_name','$product_category','$product_price','$product_quantity','$product_description','$post_image','$company','$weight')";
 
}




 
      //echo $sql_query1;
  $qeury_result1 = mysqli_query($connection ,$sql_query1);
   if($qeury_result1 ==1) {
    $_SESSION['message'] ='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  Successfully Insert Your Product Information.
    </div>'; 
   header('location: allproductlist.php');
    } else{
    $_SESSION['message']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  an error .Please try again....
    </div>';
    header('location: index.php');
        
     }
    