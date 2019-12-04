
<?php 
include_once '..\dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 
 ?>






<?php 

//$u_id = $_SESSION['id'] ;
if(isset($_POST['addCategory'])){
 


 //$u_id = $_SESSION['id'] ;
  extract($_REQUEST);
 
 
    
    $target = "categoryPhoto/";
  $tmp_file = $_FILES['categoryPhoto']['tmp_name'];
  $ext = pathinfo($_FILES["categoryPhoto"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
  $post_image = $rand.".".$ext;
   

if( move_uploaded_file($tmp_file,"categoryPhoto/".$post_image)){
    
     $sql_query1="INSERT INTO `medicinecategory`(`categoryName`,`categoryPhoto`,`categoryDescription`) VALUES ('$categoryName','$post_image','$categoryDescription')";
 
 
}
 
 
  $qeury_result1 = mysqli_query($connection ,$sql_query1);
   if($qeury_result1 !=1) {
    
    $_SESSION['massagedd']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  an error .Please try again.....
    </div>';
    header('location: addMedicineCategory.php');
   
    } else{
      $_SESSION['massagedd'] ='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  Successfully Insert a category Information.
    </div>'; 
    header('location: addMedicineCategory.php');
     }
     $connection->close();
    }