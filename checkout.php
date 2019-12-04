<?php 
   include_once 'dbConnection.php';
   if(session_id() == '' || !isset($_SESSION))
    {session_start();} 
    error_reporting(0); 
    //$user_id = $_SESSION['id'];
    ?>

      <?php 
       
      include_once('header.php'); 
       include_once('cartfunction.php');
      ?>    
      <div class="container" >
         <div class="clearfix"></div>
         <div class="col-lg-12  "  style="margin-top: 20px;">
            <div class="col-lg-9  no_padding" style="margin-bottom: 30px;overflow: hidden;"  >
               <div class="col-lg-12 no_padding ">
                  <div class="cbp-vm-options"> 
                  </div>
                  <div class="col-lg-12 col-sm-12 col-xs-12 no_padding">
                     <div class="cart-product">
                        <div class="pull-left">
                           <p class="total-price">
                              Total Price TK:  <span style="color:#F7931E ;" id="tp"><?php echo get_cart_total(); ?></span>
                           </p>
                        </div>
                        <a class="btn btn-default btn-success btn-sm  pull-right lft-spc" href="place_order.php">
                        <i class="fa fa-arrow-circle-right"></i>
                        Place Order
                        </a>
                        <a class="btn btn-default btn-warning btn-sm pull-right lft-spc" href="medicines.php">
                        <i class="fa fa-shopping-cart"></i>
                        Continue Shopping
                        </a>
                     </div>
                     <span class="clearfix"></span>
                     <div class="cart-product-info">
                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 text-center">Image  </div>
                        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3 text-center"> Medicine Name</div>
                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 text-center">
                           Quantity
                        </div>
                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 text-center">
                           Price
                        </div>
                        <span class="clearfix"></span>
                        <hr />
						
<script type="text/javascript">
    function ajaxnew(f1){
      var nvalue = $("#"+f1+"a").val();
      var mvalue = $("#"+f1).text();
      var postForm = { 
                quantity   : nvalue, mname:mvalue   
            };
       $.ajax({
                type: "POST",
                url: "processquantity.php",
                dataType: "json",
                data: postForm,
                success : function(data){
                  if (data['total']!="") {
                    var sub= data['unitPrice']*data['quantity'];

                    $("#"+f1+"c").html(sub+" TK");
                   // alert(data['total']);
                    $("#tprice").text(data['total']);     
                  }
                               
                if(data['foo']==="false"){
                    $("#"+f1+"b").html("<span>Your quantity is more than our stock!</span>");
                     $("#"+f1+"b").css("display","block");
                      $("#"+f1+"b").css("color","red");
                      }
                     else{
                       $("#"+f1+"b").html("");
                     $("#"+f1+"b").css("display","none");  
                   }             
                }

            });
    }
</script>

						<?php 
						if(isset($_SESSION['medicine'])){ 
              
						foreach($_SESSION['medicine'] as $key=>$value){ 
              $qt= $value['medicineName'];
              $i=$value['medicineId'];						?>

              
	
              <div class="col-lg-12 no_padding" style="overflow: hidden;display: block;">
              <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2"><a href=""><img src="admin/medicinePhoto/<?php echo $value['medicinePhoto'] ?>" class="img-responsive img-thumbnail"  alt="" /></a></div>
                 <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                    <h5 class="med-name">
                       <a href="" id="<?php echo $value['medicineId'];?>"><?php echo $value['medicineName'] ;?></a>
                    </h5>
                 </div>

                 <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
                    <div class="input-group pull-left " style="margin-top: 24px;">
                     <form>                                     
                       <input type="number" min="1" id="<?php echo $value['medicineId'];?>a" class="form-control pull-left qu-cart" name=""  value="<?php echo $value['quantity']; ?>" required="" onkey type="text" placeholder="Quantity" onkeyup="ajaxnew('<?php echo $i; ?>')" onchange="ajaxnew('<?php echo $i; ?>')" />
                       <div id="<?php echo $value['medicineId'];?>b" style="display:none; "></div>

		                </form> 
                    </div>
                 </div>
                 <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
                    <div style="margin-top: 33px; text-align: center;" id="<?php echo $value['medicineId'];?>c"style="color:#F7931E ;">
                       <b><?php echo $value['unitPrice']*$value['quantity']; ?></b> TK
                    </div>
                 </div>
              </div>
                        <span class="clearfix"></span>
                        <hr />
				
                     <?php } }else{ 
					 
					  echo "<h3 align='center'>Your Cart is Empty</h3>"; 
					  } ?>
                     </div>
                     <div class="cart-product" style="margin-bottom: 15px;">
                        <div class="pull-right">
                           <p class="btm-price">
                              Total Price TK:  <span id="tprice" style="color:#F7931E ;"><?php echo get_cart_total(); ?></span>
                           </p>
                        </div>

                        <!--<a class="btn btn-default btn-info btn-sm pull-left left-spcx" href="products.php">
                        <i class="fa fa-shopping-cart"></i>
                        Update Cart
                        </a>-->
						
						<a class="btn btn-default btn-danger btn-sm pull-left left-spcx" href="index.php?action=removecart">
                        <i class="fa fa-shopping-cart"></i>
                         Empty Cart
                        </a>
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
                
                
                
                
                 <div class="panel-heading " style=" margin-bottom: 15px;background: #eee;"><b>You may also like this </b></div>
 
 <?php
    
                    $sql_query="SELECT * FROM `medicine` LIMIT 4"; 
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
 
        <!--<a href="view_product_details.php?product_id=<?php echo $r['id'];?>&action=addtocart" class="btn btn-default btn-warning btn-xs"><i class="fa fa-shopping-cart"></i> Add To Cart</a>-->
          <a class="cbp-vm-icon cbp-vm-add btn btn-warning btn-xs" href="medicines.php?medicineId=<?php echo $r['medicineId']; ?>"><i class="fa fa-shopping-cart"></i> Add To Cart</a>
        
    </div>
    
  </div>
  <?php }?>
            </div>
            <span class="clear"></span>     
              <div class=" col-lg-3  col-xs-12 col-sm-12  padding_right " >
        <div class="panel panel-default bdr-color">
        <div class="panel-heading"><b>Other Medicines</b>
         
        </div>
        <span class="clear"></span>
        <div class="panel-body">
         
<div id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
        <div class="item active">
            <div class="row"> 
            <?php
                $sql_query="SELECT * FROM `medicine` LIMIT 2 DESC"; 
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
 
                        <a href="medicines.php?medicineId=<?php echo $r['medicineId'];?>&action=addtocart"  class="btn btn-default btn-warning btn-xs"><i class="fa fa-shopping-cart"></i> Add To Cart</a>
                        
                    </div>
                </div> 
                <?php }?>  
                    
            </div>
        </div>
        
        
         
        
         
        
        
         
           
    </div><!--carousel-inner-->
   </div><!--myCarousel-->
         </div>
          
        </div>
       </div>
         </div>
         <!--col-lg-9 product section-->
         <?php include_once('footer.php');?>
        
      </div>
      <!--container-->
      <!--for  list grid-->
      <script src="js/modernizr.custom.js"></script>
      <script src="js/classie.js"></script>
      <script src="js/cbpViewModeSwitch.js"></script>
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
      <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
      <script src="js/jquery.bootstrap.newsbox.js" type="text/javascript"></script>
      <script src="js/bootstrap-typeahead.js" type="text/javascript"></script>
      <script src="js/demo.js" type="text/javascript"></script>
      <!--value  up down js-->
      <script>
         $("#qty-cart-1").val('1');
         
         // Create a click handler for your increment button
         $(".increaseButton-1").click(function () {
             var newValue = 1 + parseInt($(this).next(".qu-cart").val());
             $(this).next(".qu-cart").val(newValue);
         });
         // .. and your decrement button
         $(".decreaseButton-1").click(function () {
             
             var newValue = parseInt($("#qty-cart-1").val()) - 1;
             
             $(".qu-cart").val(newValue);
             
         });
           
      </script>
      <!--value  up down js-->
      <!--type head js-->
      
      <script type="text/javascript">
         $(function () {
             $(".demo1").bootstrapNews({
                 newsPerPage: 10,
                 autoplay: true,
         pauseOnHover:true,
                 direction: 'up',
                 newsTickerInterval: 10000,//for time 
                 onToDo: function () {
                     //console.log(this);
                 }
             });
         
         
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