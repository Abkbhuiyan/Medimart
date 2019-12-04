<?php 
include_once 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 $user_id = $_SESSION['id'];
 ?>

			<?php include_once('header.php');?>
            	<!-- end  header section -->        
            
             
		  <div class="container">
			  
			<div  style="margin-top: 20px;">
			<div class="col-lg-9  " style="margin-bottom: 30px;"  >
			<div class="col-lg-12 no_padding pr_bdr">
            

            <?php
            
            $pname=$_GET['pname'];
            $sql_query="select  
            medicine.medicineId,
			medicine.medicineName,
			medicine.medicinePhoto,
			medicine.unitPrice,
			medicine.manufacturar,
			medicinecategory.categoryName 
			from medicine,medicinecategory
			where medicine.categoryId = medicinecategory.categoryId
		       and (medicine.medicineName like '%$pname%' 
		       or medicine.manufacturar like '%$pname%' 
		       or medicinecategory.categoryName like '%$pname%') 
			order by medicine.medicineId";        
             
$sql_view= mysqli_query($connection ,$sql_query);
//var_dump($sql_view);
while($r=mysqli_fetch_array($sql_view)){
                    
?>
<div class="col-lg-3 col-sm-6 col-xs-12 e-product">

<div  class="product-info">
<img src="admin/medicinePhoto/<?php echo $r['medicinePhoto'];?>" class="img-responsive animated fadeIn delay-08"  alt=""  />


 
<summary>Name:-  <?php echo $r['medicineName'];?></summary>
<summary>Category:-  <?php echo $r['categoryName'];?></summary>
 
<p  class="RS">Price:-  <?php echo $r['unitPrice'];?> </p>  
 
<i class="fa fa-list"></i><a href="medicinedetails.php?medicineId=<?php echo $r['medicineId']; ?>" class="hidden-sm">More details</a>
 
</div>
</div><!--each product-->   
   		 <?php }?>

			</div>
			</div>
			<div class="col-lg-3  " >
			<?php include_once('saidbar.php');?>

			</div>
			</div>
			<?php include_once('footer.php');?>
			
		<script>
			
			
 
$(document).ready(function ()
{
    $('.carousel').carousel({interval:5000,pause:false});
});
var $ = jQuery.noConflict();
$(document).ready(function() { 
  $('#myCarousel').carousel({ interval: 3000, cycle: true });
}); 

 
 

		
		</script>
		
		<script type="text/javascript">
			
    $(document).ready(function(){
        $(".tip-top").tooltip({
            placement : 'top'
        });
        $(".tip-right").tooltip({
            placement : 'right'
        });
        $(".tip-bottom").tooltip({
            placement : 'bottom'
        });
        $(".tip-left").tooltip({
            placement : 'left'
        });
    });

		</script>
	</body>

</html>