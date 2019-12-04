<?php 
   include_once 'dbConnection.php';
   session_start();
   if(!isset($_SESSION['id'])){
     header("Location: login.php"); 
   die();
   }

    //$user_id = $_SESSION['id'];
    ?>
      <?php include_once('header.php'); ?>    
      <div class="container" >
         <div class="clearfix"></div>
         <div class="col-lg-12"  style="margin-top: 20px;">
            <div class="col-lg-12 no_padding" style="margin-bottom: 30px;overflow: hidden;"  >
               <div class="col-lg-12 no_padding ">
                  <div class="cbp-vm-options"> 
                  </div>
               </div>
               <span class="clearfix"></span>
			   <?php

				if(isset($_SESSION['medicine'])){ 
				//Insert Order Data
				$userId=$_SESSION['id'];
        
				$date=date("Y-m-d h:i:s");
				$total_amount=get_cart_total();
				$sql="INSERT INTO `order`(`orderDate`,`userId`, `total`, `status`) VALUES ('$date','$userId','$total_amount','pending')"; 
				$qeury = mysqli_query($connection ,$sql);
				$order_id=mysqli_insert_id($connection);
				
				foreach($_SESSION['medicine'] as $key=>$value){ 
                $qnt=$value['quantity'];
				$price=$value['unitPrice']*$value['quantity'];
				
				
			    $sql="INSERT INTO `orderdetails`(`orderId`,`medicineId`, `quantity`, `subTotal`) VALUES ('$order_id','$key','$qnt','$price')";  // echo $sql;
				$qeury_result = mysqli_query($connection ,$sql);
				 
         /////////////////////////////
        /////////////////////////////
        ////////////////////////////////
        //codes for sending email//
        ///////////////////////////////
        /////////////
        include_once ('helpers/class.phpmailer.php');
            
          $mail   =   new PHPMailer;
                  define('GUSER', '1000084@daffodil.ac');
                  define('GPWD', 'jeh@d2990');
                  
               
                   
             
          $mail->SMTPOptions = array(
              'ssl' => array(
                  'verify_peer' => false,
                  'verify_peer_name' => false,
                  'allow_self_signed' => true
              )
          );
          $mail->isSMTP();                            
          $mail->Host = 'smtp.gmail.com';

          $mail->SMTPAuth = true;
          $mail->SMTPDebug = 0;                     
          $mail->Username = GUSER;          
          $mail->Password = GPWD; 
          $mail->SMTPSecure = 'tls';                  
          $mail->Port = 587;    
          $email =$_SESSION['email'];                      

          $mail->setFrom('1000084@daffodil.ac', 'Order Placement Confirmation');
          //$mail->addReplyTo('info@example.com', 'testing');
          $mail->addAddress($email);   // Add a recipient
          //$mail->addCC('cc@example.com');
          //$mail->addBCC('bcc@example.com');

          $mail->isHTML(true);  

          $bodyContent = '<h1>DearCustomer, </h1> <br /> <b>Thank you for your order. Your order is in processing now. We will precess it as soon as possible. <br /> Rregrards, <br/>Abdullah <br /> CEO OMMS </b>';
          

          $mail->Subject = 'Oeder Details';
          $mail->Body    = $bodyContent;

          
          /////////////////////////////
          //////////////////////
         
				} ?>
				<h2 style="padding:120px 0px; text-align:center;">Thank You For Your Order. We Will Contact You Soon!.</h2>

			 <?php 
			    foreach($_SESSION['medicine'] as $cart=>$value){
				  unset($_SESSION['subtotal']);			
				  unset($_SESSION['medicine'][$cart]);		  
				}
				unset($_SESSION['medicine']);
					
			  }else{ 					 
			  echo "<h2 style='padding:120px 0px; text-align:center;'>Your Cart is Empty</h2>"; 
			   } ?>

            </div>
  
         </div>
         <!--col-lg-9 medicine section-->
         <?php include_once('footer.php');?>
         <script type="text/javascript">
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
      <script src="js/bootstrap.min.js"></script>
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