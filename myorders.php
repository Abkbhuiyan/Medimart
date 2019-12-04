<?php 
   include_once 'dbConnection.php';
   if(session_id() == '' || !isset($_SESSION))
    {session_start();} 
    error_reporting(0); 
    $id = $_SESSION['id'];
    ?>

      <?php include_once('header.php');?>    
      <div class="container" >
         <div class="clearfix"></div>
         <div class="col-lg-12  "  style="margin-top: 20px;">
            <div class="col-lg-9  no_padding" style="margin-bottom: 30px;overflow: hidden;"  >
               <div class="col-lg-12 no_padding ">
                  <div class="cbp-vm-options"> 
                  </div>
                  
                     
                     <span class="clearfix"></span>
                     
                        
						
						<?php 
                         	
                         	    $id=$_SESSION['id'];
                                 $sql_queryc="SELECT * FROM `order` where userId='$id'"; 
                     //echo $sql_query;
                    $sql_viewc= mysqli_query($connection ,$sql_queryc);
                   // var_dump($sql_view);
                      while($row_data=mysqli_fetch_assoc($sql_viewc)){
                         $oid= $row_data['orderId'];
                        ?>
                        <div class="cart-product-info">
                       <div class="col-lg-12 col-sm-12 col-xs-12 no_padding">
                        <div class="col-lg-12 col-sm-2 col-md-2 col-xs-2 text-left">Order Id:  ##-<?php echo $row_data['orderId'] ?>  </div>
                        <div class="col-lg-12 col-sm-3 col-md-3 col-xs-3 text-left">Order Date:  <?php echo $row_data['orderDate'] ?></div>
                      <div class="col-lg-12 col-sm-3 col-md-3 col-xs-3 text-left">Grand Total:  <?php echo $row_data['total'] ?></div>
                        <span class="clearfix"></span>

                        <div class="cart-product-info">
                        <div class="col-lg-3 col-sm-2 col-md-2 col-xs-2 text-left">Image  </div>
                        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3 text-left">Medicine name</div>
                        <div class="col-lg-3 col-sm-2 col-md-2 col-xs-2 text-left">Quantity</div>
                        <div class="col-lg-3 col-sm-2 col-md-2 col-xs-2 text-left">Sub Total</div>

                        <span class="clearfix"></span>
                        <hr />
                        <?php 
                        $sql_query="SELECT * FROM `orderdetails`  INNER JOIN medicine on medicine.medicineId = orderdetails.medicineId where orderId='$oid'"; 
                     //echo $sql_query;
                    $sql_view= mysqli_query($connection ,$sql_query);
                   // var_dump($sql_view);
                      while($row=mysqli_fetch_assoc($sql_view)){

                         ?>
                         <div class="col-lg-3 col-sm-3 col-md-3 col-xs-2"><a href="" style="cursor:  none;"><img src="admin/medicinePhoto/<?php echo $row['medicinePhoto'] ?>" class="img-responsive img-thumbnail" style ="height: 50px; width:50%; " alt="" /></a></div>
                         <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                              <h5 class="med-name">
                                 <a  style="cursor: none;"><?php echo $row['medicineName'] ?></a>
                              </h5>
                           </div>
                         <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                              <h5 class="med-name">
                                 <a  style="cursor: none;"><?php echo $row['quantity'] ?></a>
                              </h5>
                           </div>
                          <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                              <h5 class="med-name">
                                 <a  style="cursor: none;"><?php echo $row['subTotal'] ?></a>
                              </h5>
                           </div>

                          
                           </div>     
                         <?php } ?></div> <?php }		?>
						 
                     </div>
                     <div class="cart-product" style="margin-bottom: 15px;">
                       
                        <!--<a class="btn btn-default btn-info btn-sm pull-left left-spcx" href="products.php">
                        <i class="fa fa-shopping-cart"></i>
                        Update Cart
                        </a>-->
						
					 
                     </div>
                     <style>
                        .med-name a{  color: #5cb85c;display: inline-block;margin-top: 30px;text-align:  center;}
                        .cart-product-info{border: 1px solid #eee;margin-bottom: 20px; overflow: hidden;padding-bottom: 10px;padding-top: 10px;border-top: none;}
                        .cart-product{border-bottom: 1px solid #eee;overflow: hidden;}
                        .lft-spc{margin-left: 10px;margin-top: 11px;margin-bottom: 15px;}
                        .total-price{  color: #000;
                        font-size: 16px;
                        font-weight: 500;
                        margin-top: 17px;}
                        .qu-cart{  height: 32px;
                        text-align: center !important;
                        text-indent: 22px;
                        width: 84% !important;}
                        .left-spcx{margin-left: 10px;}
                        .btm-price {
                        color: #000;
                        font-size: 16px;
                        font-weight: 500;
                        margin-top: 6px;
                        }
                        .e-top{margin-top: 10px;}
                     </style>
                  </div>
               </div>
               <span class="clearfix"></span>
                 
              
            </div>
            <span class="clear"></span>     
              <div class=" col-lg-3  col-xs-12 col-sm-12  padding_right " >
      
       </div>
         </div>
         <!--col-lg-9 product section-->
         <?php include_once('footer.php');?>
    
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