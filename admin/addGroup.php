
<?php 
include_once '..\dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 
 ?>


<?php 

//$u_id = $_SESSION['id'] ;
if(isset($_POST['addGroup'])){
 
 //$u_id = $_SESSION['id'] ;
  extract($_REQUEST);

     $sql_query1="INSERT INTO `medicinegroup`(`groupName`,`classId`,`indications`,`interaction`,`precaution`,`sideEffects`,`dosageFormat`) VALUES ('$groupName',$medicineClass,'$indications','$interaction','$precaution','$sideEffects','$dosageFormat')";

  $qeury_result1 = mysqli_query($connection ,$sql_query1);
   if($qeury_result1 !=1) {
    
    
    $_SESSION['massagedd']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  an error .Please try again'.mysqli_error($connection).'
    </div>';
    header('location: addMedicineGroup.php');
   
    } else{
      $_SESSION['massagedd'] ='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  Successfully Insert a Medicine Group Information!
    </div>'; 
    header('location: addMedicineGroup.php');
     }
     $connection->close();
    }