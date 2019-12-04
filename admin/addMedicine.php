
<?php 
include_once '..\dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 
 ?>






<?php 

if(isset($_POST['addMedicine'])){
 
  extract($_REQUEST);
 
 
    
   $target = "medicinePhoto/";
  $tmp_file = $_FILES['medicinePhoto']['tmp_name'];
  $ext = pathinfo($_FILES["medicinePhoto"]["name"], PATHINFO_EXTENSION);
  $rand = md5(uniqid().rand());
  $post_image = $rand.".".$ext;
   

if( move_uploaded_file($tmp_file,"medicinePhoto/".$post_image)){
    
     $sql_query1="INSERT INTO `medicine`(`medicineName`, `groupId`, `manufacturar`, `categoryid`, `description`, `administration`, `medicinePhoto`, `unitPrice`, `stock`, `drugInteraction`, `diseasesInteraction`, `adultDoge`, `childrenDoge`, `pregnancyCategory`) VALUES ('$medicineName',$medicineGroup,'$manufacturar',$medicineCategory,'$description','$administration','$post_image',$unitPrice,$stock,'$drugInteraction','$diseasesInteraction','$adultDoge','$childrenDoge','$pregnancyCategory')";

     //$qry = "INSERT INTO `medicine` ( ` medicineName`, `groupId`, `manufacturar`, `categoryid`, `description`, `administration`, `medicinePhoto`, `unitPrice`, `stock`) VALUES ('wefwef', '1', 'fwefwef', '2', 'wefwefewfewf', 'fwefwefwef', 'wefwef', '12', '2')"
 

}
 
  $qeury_result1 = mysqli_query($connection ,$sql_query1);
   if($qeury_result1 !=1) {
    echo mysqlii_error($connection) ;
    $_SESSION['massagedd']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  an error .Please try again'.mysqlii_error($connection).'
    </div>';
    header('location: addBrandedMedicine.php');
   
    } else{

      $_SESSION['massagedd'] ='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  Successfully Insert a category Information.
    </div>'; 
    header('location: addBrandedMedicine.php');
     }
     $connection->close();
   }



   if(isset($_POST['cancel'])){
    header('location: index.php');
   }