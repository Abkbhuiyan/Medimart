<?php 
include_once 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 //$user_id = $_SESSION['id'];
 include_once('cart.php');
 ?>


    
     	<?php include_once('header.php');?>
     
    <div class="container" >
       
    <div class="clearfix"></div>
    
      
    
<div class="col-lg-12"  style="margin-top: 20px;">
    <div class="col-lg-9 no_padding" style="margin-bottom: 30px;"  >
        <div class="col-lg-12 no_padding bdr_all">
          
          
          <div class="main">
				<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options">
                    <div class="pull-left all-p-tag ">All <b class="t-clr">Mediciens</b> List</div>
						<a href="#" class="cbp-vm-selected" data-view="cbp-vm-view-grid"><i class="fa fa-th"></i></a>
						<a href="#" class="" data-view="cbp-vm-view-list"><i class="fa fa-list"></i></a>
					</div>
					<ul>
					 <?php 
                     $groupId=$_GET['groupId'];
                 //echo  $product_id;
                       $sql_query=" SELECT * FROM `medicine` WHERE `groupId`='$groupId' ";
                      // echo $sql_query;
                        $sql_view= mysqli_query($connection ,$sql_query);
                        
                    //var_dump($sql_view);
                      while($row=mysqli_fetch_array($sql_view)){
                     
                     ?>
                        
                        <li>
                             
							<a class="cbp-vm-image" href="#"><img src="admin/medicinePhoto/<?php echo $row['medicinePhoto'];?>"/></a>
							<h3 class="cbp-vm-title"><a href=""><?php echo $row['medicineName'];?></a></h3>
						 
                            	<div class="cbp-vm-details">
 
 
<p  class="RS">Price:-  <?php echo $row['unitPrice'];?> </p>  
                                
							</div>
                             
             <a class="cbp-vm-icon cbp-vm-add btn btn-warning btn-xs" href="medicineDetails.php?medicineId=<?php echo $row['medicineId']; ?>"<i class="fa fa-shopping-cart"></i>View Details</a>
              
                        </li> 
                    <?php }?>     
					</ul>
                   
                  
				</div>
			</div>
          

        
        
        
        
        </div>
    </div><!--col-lg-9 product section-->
    
    
    
    <div class="col-lg-3 padding_right" >
        <div class="panel panel-default bdr-color">
        <div class="panel-heading"><b>Product Category List</b></div>
        <div class="panel-body filters"> 
           <?php 
                        $sql_query="SELECT * FROM `medicineCategory`";
                        $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);
                      while($r=mysqli_fetch_array($sql_view)){
                     ?>
            <span><a href="categoryWiseMedicine.php?cat_id=<?php echo $r['groupId']; ?>"><?php echo $r['categoryName'];?> </a></span>
             <?php }?>
             </div>

             <div class="panel panel-default bdr-color">
			<div class="panel-heading">  <b>Medicine Group List </b>
			 
			</div>
			<div class="panel-body">
			<div class="row no_padding">
			<div class="col-xs-12 no_padding">
			<ul class="demo1 pd_5">
			<li class="news-item"  style="height:420px;">
			<table cellpadding="4"  >
			 
                           <?php 
                                                 $u_id=$_SESSION['id'];
                                                $sql="SELECT 
    @i:=@i+1 AS rank, 
    t.*
FROM 
    medicineGroup AS t,
    (SELECT @i:=0) AS R where @i<6 order by groupId DESC;";
                                                //echo $sql;
                                                $qeury_result = mysqli_query($connection ,$sql);
                                                while($rows=mysqli_fetch_array($qeury_result)){
                                                
                                            ?>      
                                             
                                                      
 

            
            
             
            <tr>
		
			<td><a href="groupdetails/index.php?id=<?php echo $rows['groupId'];?>" class="dr_name"><?php echo $rows['groupName']; ?></a>
			<summary class="tags-line col-warning"><?php echo $rows['indications']; ?></summary>
			
			</td>
			</tr>
            <?php }?>
			</table>
            
			</li><!--news-item-->
		   
			  </ul>
			</div>
			</div>
			</div><!--panel-body-->
		  <div class="panel-footer"> </div>
			</div>
    </div><!--filtering-->
</div>

<script src="js/modernizr.custom.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/cbpViewModeSwitch.js"></script>

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
      
 	<?php include_once('footer.php');?>
 
 
 		<!--for  list grid-->
		
    	<!--for  list grid-->
    
    <!--
      <ul class="list-inline">
        <li><a href="#" data-placement="top" data-toggle="tooltip" class="tip-top" data-original-title="Tooltip on top">Tooltip on top</a></li>
        <li><a href="#" data-placement="right" data-toggle="tooltip" class="tip-right" data-original-title="Tooltip on right">Tooltip on right</a></li>
        <li><a href="#" data-placement="bottom" data-toggle="tooltip" class="tip-bottom" data-original-title="Tooltip on bottom">Tooltip on bottom</a></li>
        <li><a href="#" data-placement="left" data-toggle="tooltip" class="tip-left" data-original-title="Tooltip on left">Tooltip on left</a></li>
    </ul>
    -->
     
    <!--type head js-->

<!--<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>-->






   <!--type head js--> 
       

      
    


    
    
