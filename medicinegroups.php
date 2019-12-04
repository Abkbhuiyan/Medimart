<?php 
include_once 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 //$user_id = $_SESSION['id'];
 
        
 
 ?>
	<?php 
include_once('cart.php');
	include_once('header.php');
		
	?>

 <div class="container"  >
            <div class="col-md-12">
            
            <div   class="seh_boxx">
	  <div class="col-md-12" style="border-right: 3px solid #000; padding-bottom: 35px">
      <h3>Search for your desired medicine...</h3>
                             <form action="search.php" method="GET">
									<div class="input-group ">
										 	<input type="text" id="demo3"  name="pname" class="form-control se_height " title="Please Enter Product Name..." placeholder="Please Enter Product Name" required />
								
										<span class="input-group-btn">
											<input type="submit" class="btn btn-defaultc btn_height" value="Search" />
										</span>
									</div>
									<!-- /input-group -->
									<!-- /input-group -->
									<div id="display">
										<!--data result display here-->
										</div>
								</form>
      
      </div>
       
       </div>
       </div>
       
       </div>
	 <div class="container" >
       
    <div class="clearfix"></div>
    
      <style type="text/css">
			
			.cbp-vm-view-grid ul li {
    border: 1px solid #F1F0F0 ;
    display: inline-block;
    margin: 10px 0 0;
    min-height: 200px;
    padding: 18px 4px;
    text-align: center;
    vertical-align: top;
    width: 24%;
}
		</style>
    
<div class="col-lg-12"  style="margin-top: 20px;">
    <div class="col-lg-9 no_padding" style="margin-bottom: 30px;"  >
        <div class="col-lg-12 no_padding bdr_all">
          
          
          <div class="main">
				<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options">
                    <div class="pull-left all-p-tag "><b class="t-clr">Medicine Groups </b> </div>
						<a href="#" class="cbp-vm-selected" data-view="cbp-vm-view-grid"><i class="fa fa-th"></i></a>
						<a href="#" class="" data-view="cbp-vm-view-list"><i class="fa fa-list"></i></a>
					</div>
					<ul>
 
					
					
										 <?php 
                        $sql_query="    
						SELECT g.groupId,g.groupName,medicineclass.className FROM medicineGroup g INNER JOIN medicineclass ON g.classId=medicineclass.classId  order by g.groupName;";    
                        $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);
                      while($r=mysqli_fetch_array($sql_view)){
                     
                     
                     
                     ?>
                        
                        <li>
							<h3 class="cbp-vm-title">Group ID:-  <a href=""><?php echo $r['groupId'];?></a></h3>
							<h3 class="cbp-vm-title">Group Name:-  <a href=""><?php echo $r['groupName'];?></a></h3>
							<div class="cbp-vm-details">
							   
							<summary>Medicine Class:-  <?php echo $r['className'];?></summary>

              
							</div>
							<a href="groupwisemedicine.php?groupId=<?php echo $r['groupId'];?>" class="btn btn-default btn-warning btn-xs"><i class="fa fa-list"></i>Medicine</a>
                             
             <a class="cbp-vm-icon cbp-vm-add btn btn-warning btn-xs" href="groupdetails.php?groupId=<?php echo $r['groupId']; ?>"><i class="fa fa-list"></i>View Details</a>
        					 
                        </li> 
                    <?php }?>     

					
					    
					</ul>
                   
                  
				</div>
			</div>
          

        
        
        
        
        </div>
    </div><!--col-lg-9 product section-->
    
    
    
    <div class="col-lg-3 padding_right" >
        
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
		
			<td><a href="groupdetails.php?id=<?php echo $rows['groupId'];?>" class="dr_name"><?php echo $rows['groupName']; ?></a>
			
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


			<div class="panel panel-default bdr-color">
        <div class="panel-heading"><b>Medicine Category List</b></div>
        <div class="panel-body filters"> 
            <?php 
                        $sql_query="SELECT * FROM `medicineCategory`";
                        $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);
                      while($r=mysqli_fetch_array($sql_view)){
                     
                     
                     ?>
            <span><a href="categoryWiseMedicine.php?cat_id=<?php echo $r['categoryId']; ?>"><?php echo $r['categoryName'];?></a></span>
             <?php }?>
             </div>
        
        </div>
    </div><!--filtering-->
</div>

<div class="container">
			  
 		 <br /><br /><br />
			<?php include_once('footer.php');?>
			
		</div>

<script src="js/modernizr.custom.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/cbpViewModeSwitch.js"></script>