
<?php 
include_once '..\dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 
 ?>


<?php 

//$u_id = $_SESSION['id'] ;
if(isset($_POST['addClass'])){
 
 //$u_id = $_SESSION['id'] ;
  extract($_REQUEST);

     $sql_query1="INSERT INTO `medicineclass`(`className`,`classDescription`) VALUES ('$className','$classDescription')";

  $qeury_result1 = mysqli_query($connection ,$sql_query1);
   if($qeury_result1 !=1) {
    
    $_SESSION['massagedd']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  an error .Please try again.....
    </div>';
    header('location: addMedicineClass.php');
   
    } else{
      $_SESSION['massagedd'] ='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  Successfully Insert a category Information.
    </div>'; 
    header('location: addMedicineClass.php');
     }
     $connection->close();
    }