<?php 
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 //$user_id = $_SESSION['id'];
 include("dbConnection.php");
$medicineId=$_GET['medicineId'];
//   echo $medicineId;

 ?>


	<?php include_once('header.php');?>
	<!-- end  header section -->        
            
     
    <div class="container" >
    <div class="clearfix"></div>
    
      
    <style type="text/css">
    table{
      table-layout: fixed;
      align-items: center;
      border-collapse: separate;
    }
     
      td,th{
        overflow: hidden;
        text-align: center;
        display: table-cell;
    vertical-align: inherit;
      }

    </style>
            
         
<div class="col-lg-12 no_padding"  style="margin-top: 20px;">       
 
    
               
      <div class="tabbable tabs-right">
      <hr />
        <ul class="nav nav-tabs color-text">
          <li class="active"><a href="#1" data-toggle="tab">Medicine Details</a></li>
          <li><a href="#2" data-toggle="tab">More Details</a></li>
           
        </ul>
        <div class="tab-content">
         <div class="tab-pane active" id="1" >
          <table class="col-lg-10"  >
            <thead>
              <tr>
            <th>Sl</th>
            <th>Name</th>
            <th>Category</th>
            <th>Company</th>
            <th>Price</th>
            <th>Description</th>
            <th>Administration</th>
            </tr>
          </thead>
           <tbody>
          <?php
           $groupId=0;
                    $sql_query="SELECT * FROM `medicine` WHERE `medicineId`='$medicineId'"; 
                     //echo $sql_query;
                    $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);

                      while($row=mysqli_fetch_assoc($sql_view)){
                      $groupId=$row['groupId'];
                    }
                    //echo $groupId;

                    $sql_query="SELECT * FROM `medicine` WHERE `groupId`='$groupId'"; 
                     //echo $sql_query;
                    $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);
                    $a=1;
                      while($r=mysqli_fetch_assoc($sql_view)){
                  ?>
                   
                      
                    
                    <tr style="border: 1px solid black;">
                      <td><?php echo $a; ?></td>
                      <td><?php echo $r['medicineName']; ?></td>
                      <td><?php $categoryId =$r['categoryid'];
                        $sql="SELECT categoryName FROM `medicineCategory` WHERE `categoryId`='$categoryId'";
                        $sql_result= mysqli_query($connection,$sql);
                        $shows = mysqli_fetch_assoc($sql_result);
                        echo $shows['categoryName']; ?></td>
                      <td><?php echo $r['manufacturar']; ?></td>
                      <td><?php echo $r['unitPrice']; ?></td>
                      <td class="des"><?php echo $r['description']; ?></td>
                      <td class="des"><?php echo $r['administration']; ?></td>
                    </tr>
                    
                  <?php $a++;  } ?>
           </tbody>
           </table>
         </div>
         <div class="tab-pane" id="2">
          <table class="col-lg-10" align="center">
            <thead>
              <th>Sl</th>
            <th>Drug Interaction</th>
            <th>Diseases Interaction</th>
            <th>Pregnancy Category</th>
            <th>Child Dosage</th>
            <th>Adult Dosage</th>
          
          </thead>
           <tbody>
            <?php 
            $sql_query="SELECT * FROM `medicine` WHERE `groupId`='$groupId'"; 
                     //echo $sql_query;
                    $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);
                      $a=1;
                      while($r=mysqli_fetch_assoc($sql_view)){
          ?>

          <tr style="border: 1px solid black;">
                      <td><?php echo $a; ?></td>
                      <td><?php echo $r['drugInteraction']; ?></td>
                      <td><?php echo $r['diseasesInteraction']; ?></td>
                      <td><?php echo $r['pregnancyCategory']; ?></td>
                      <td><?php echo $r['childrenDoge']; ?></td>
                      <td><?php echo $r['diseasesInteraction']; ?></td>
                    </tr>

                   <?php $a++;  } ?>
           </tbody>
           </table>
         </div>
          
        </div>
      </div>

      <?php //} ?>
      <!-- /tabs -->
 
</div>
<br />

 <div class="panel-heading " style=" margin-bottom: 15px;background: #eee;"><b>Similar Medicine Of Other Brands </b></div>
 
 <?php
    
                    $sql_query="SELECT * FROM `medicine` WHERE `groupId`='$groupId'  LIMIT 4"; 
                     //echo $sql_query;
                    $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);
                      while($r=mysqli_fetch_assoc($sql_view)){
                        
                      
          if ($r['medicineId'] != $medicineId) {
         
    
    ?>
 <div class="col-lg-3 col-xs-12 col-sm-6    e-product  pr_bdr">
     
    <div  class="product-info">
    
        <img src="admin/medicinePhoto/<?php echo $r['medicinePhoto'];?>"  style="height: 170px !important;" class="img-responsive"  />
        <span><?php echo $r['medicineName'];?></span>
         
        <p  class="price">Price:- <?php echo $r['unitPrice'];?></p>
 
        <a href="medicinedetails.php?medicineId=<?php echo $r['medicineId'];?>" class="btn btn-default btn-warning btn-xs"><i class="fa fa-list"></i> More Details</a>
         
    </div>
    
  </div>
  <?php   }}?>
 
  
   
    
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
 
                        <a href="medicinedetails.php?medicineId=<?php echo $r['id'];?>"  class="btn btn-default btn-warning btn-xs"><i class="fa fa-list"></i> More Details</a>
                        
                    </div>
                </div> 
                <?php }?>  
                    
            </div>
        </div>
        
        
         
        
         
        
        
         
           
    </div>
   </div>--><!--myCarousel-->

   <div class="panel panel-default bdr-color">
      <div class="panel-heading">  <b>Medicine List</b>
       
      </div>
      <div class="panel-body" style="overflow-y: hidden;" >
      <div class="row no_padding">
      <div class="col-xs-12 no_padding" >
      <ul class="demo1 pd_5" >
      <li class="news-item"  style="height:400px;">
      <table cellpadding="4" >
       
                           <?php 
                               
                              $sql_query="SELECT * FROM `medicine` WHERE `groupId`!='$groupId' LIMIT 5"; 
                              //echo $sql;
                              $qeury_result = mysqli_query($connection ,$sql_query);
                              while($rows=mysqli_fetch_array($qeury_result)){
                              
                          ?>      
                                                         
            <tr style="margin-bottom: 10px;display: block;">
      <td ><img src="admin/medicinePhoto/<?php echo $rows['medicinePhoto'];?>" style="width: 100px;height: 70px; margin-right: 4px;"class="img-responsive img-circle" alt="" /></td>
      <td><a  href="medicinedetails.php?medicineId=<?php echo $rows['medicineId'];?>" class="dr_name"><?php echo $rows['medicineName']; ?></a>
      <summary class="tags-line col-warning"><?php echo $rows['unitPrice']; ?></summary>
      </td>
            
      </tr>

           
            <?php }?>
      </table>
            
      </li>
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










