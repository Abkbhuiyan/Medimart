<?php 
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 

 //$user_id = $_SESSION['id'];
 include("dbConnection.php");
$groupId=$_GET['groupId'];

 ?>


    <?php include_once('header.php');?>
    <!-- end  header section -->        
            
     
    <div class="container" >
    <div class="clearfix"></div>
    
      
    
<div class="col-lg-12  "  style="margin-top: 20px;">
    <div class="col-lg-9  no_padding" style="margin-bottom: 30px;overflow: hidden;"  >
        <div class="col-lg-12 no_padding ">
          <div class="cbp-vm-options"> </div>
            <div class="col-xs-12 col-sm-5 col-lg-5 padding_left top_sp">
                
                <?php
            
                //$groupId=$_GET['groupId'];
                 
                    $sql_query="SELECT * FROM `medicinegroup` WHERE `groupId`='$groupId'"; 
                     //echo $sql_query;
                    $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);

                      while($r=mysqli_fetch_assoc($sql_view)){
                     // $groupId=$r['groupId'];
            ?>
                
            </div>
        <div class="col-lg-7 col-sm-5 col-xs-12 top_sp">
            <div class="product-detail-info">
            
                <summary><span> Group Name:  <em><?php echo $r['groupName'];?></em></span></summary>
                <summary><span>Medicine Class:   <em><?php 
                        $classId =$r['classId'];
                        $sql="SELECT className FROM `medicineClass` WHERE `classId`='$classId'";
                        $sql_result= mysqli_query($connection,$sql);
                        $shows = mysqli_fetch_assoc($sql_result);
                        echo $shows['className'];

                    ?></em></span></summary>
                
                 
            </div> 
        </div>
        </div>
        
<br /><br />
<span class="clearfix"></span>
<div class="col-lg-12 no_padding"  style="margin-top: 20px;">       
 
 <!-- tabs right -->
      <div class="tabbable tabs-right">
      <hr />
        <ul class="nav nav-tabs color-text">
          <li class="active"><a href="#1" data-toggle="tab">Group Details</a></li>
           
        </ul>
        <div class="tab-content">
         <div class="tab-pane active" id="1" >
                <div class="product-detail-info">
                    <summary><em>Indication: </em><?php echo $r['indications'];?></summary>
                    <summary><em>Interaction: </em><?php echo $r['interaction'] ?></summary>
                    <summary><em>Precaution: </em> </em><?php echo $r['precaution'];?></em></summary>
                    <summary><em>Side Effects: </em><?php echo $r['sideEffects'];?></em></summary>
                    <summary><em>Dosage Format: </em><?php echo $r['dosageFormat'];?></em></summary>
                </div>
         </div>
   
          
        </div>
      </div>

      <?php } ?>
      <!-- /tabs -->
 
</div>
<br />

 <div class="panel-heading " style=" margin-bottom: 15px;background: #eee;"><b>Similar Medicine Of Other Brands </b></div>
 
 <?php
    
                    $sql_query="SELECT * FROM `medicine` WHERE `groupId`!='$groupId'  LIMIT 4"; 
                     //echo $sql_query;
                    $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);
                      while($r=mysqli_fetch_assoc($sql_view)){
                        
    
    ?>
 <div class="col-lg-3 col-xs-12 col-sm-6    e-product  pr_bdr">
     
    <div  class="product-info">
    
        <img src="admin/medicinePhoto/<?php echo $r['medicinePhoto'];?>"  style="height: 170px !important;" class="img-responsive"  />
        <span><?php echo $r['medicineName'];?></span>
         
        <p  class="price">Price:- <?php echo $r['unitPrice'];?></p>
 
        <a href="medicinedetails.php?groupId=<?php echo $r['groupId'];?>" class="btn btn-default btn-warning btn-xs"><i class="fa fa-list"></i> More Details</a>
        
         
    </div>
    
  </div>
  <?php   }?>
 
  
   
    
</div>
 
    
   <span class="clear"></span>     
     
     <div class=" col-lg-3  col-xs-12 col-sm-12  padding_right " >
       <!-- <div class="panel panel-default bdr-color">
        <div class="panel-heading"><b>Other Medicine</b>
         
        </div>-->
        <span class="clear"></span>
        <div class="panel-body">
         
<!--<div id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
        <div class="item active">
            <div class="row"> 
            <?php
                $sql_query="SELECT * FROM `medicine` WHERE `groupId`!='$groupId' LIMIT 5"; 
                     //echo $sql_query;
                    $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);
                      while($r=mysqli_fetch_assoc($sql_view)){
            ?>
            
                <div class="col-xs-12 col-sm-6 col-lg-12 e-product  r-p_br">
                    <div  class="product-info">
                        <img src="admin/medicinePhoto/<?php echo $r['medicinePhoto'];?>"  class="img-responsive" style="height: 175px !important;"  />
                        <span><?php echo $r['medicineName'];?></span>
 
                        <p  class="price">Price:- <?php echo $r['unitPrice'];?></p>                        
 
                        <a href="medicinedetails.php?groupId=<?php echo $r['id'];?>"  class="btn btn-default btn-warning btn-xs"><i class="fa fa-list"></i> More Details</a>
                        
                    </div>
                </div> 
                <?php }?>  
                    
            </div>
        </div>
        
        
         
        
         
        
        
         
           
    </div>
   </div>--><!--myCarousel-->

   
        
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
      </div>
      
          
       <!-- </div>-->
       </div>
     </div><!--col-lg-9 product section-->
      
  <?php include_once('footer.php');?>  
 

     
</div><!--container-->
 
    
<script>
$("#qty").val('1');

// Create a click handler for your increment button
$("#increaseButton").click(function () {
    var newValue = 1 + parseInt($("#qty").val());
    $("#qty").val(newValue);
});
// .. and your decrement button
$("#decreaseButton").click(function () {
    
    var newValue = parseInt($("#qty").val()) - 1;
    
    $("#qty").val(newValue);
    
});

</script>
    <!--value  up down js-->
      
  
    
    

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










