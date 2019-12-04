
<?php 
include_once 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 
 ?>


<?php 

//$u_id = $_SESSION['id'] ;
if(isset($_POST['insert_pres'])){
 
  extract($_REQUEST);
 
 
    
    $target = "prescriptions/";
  $tmp_file = $_FILES['prescription']['tmp_name'];
  $ext = pathinfo($_FILES["prescription"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
  $post_image = $rand.".".$ext;
    $date = date('Y-m-d h:i:s');

   // print_r($_POST);
if (move_uploaded_file($tmp_file,$target.$post_image)){
    
     $sql_query1="INSERT INTO `prescriptions`(`username`,`prescription`,`email`,`phoneNo`,`address`,`uploadDate`,`status`)
        VALUES ('$username','$post_image','$email','$phoneNo','$address','$date','pending')";
 
 echo $sql_query1;
} 
 
 if (!empty($username)&& !empty($email)){
  $qeury_result1 = mysqli_query($connection ,$sql_query1);
   if($qeury_result1 !=1) {
    
    $_SESSION['massagedd']='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have a error lpease try again later.'.mysqli_error($connection).'
    </div>';;
    header('location: prescrioption_attach.php');
   
    } else{
      $_SESSION['massagedd']='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    Prescription Successfully uploaded. We will contact with you soon. Thank you.
    </div>';;
   header('location: prescrioption_attach.php');
     }

   }else{

    $_SESSION['massagedd']='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    Please fill all fields and try again.
    </div>';;
    header('location: prescrioption_attach.php');
   }
     $connection->close();
   }