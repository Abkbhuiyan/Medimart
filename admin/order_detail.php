<?php 
include_once '..\dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 $user_id = $_SESSION['id'];
   $successmassage='';
 $orderId=$_GET['orderId'];
   if(isset($_POST['cancel'])){
    $status="cancelled";
   $sql_query="UPDATE `order` SET `status`='$status' WHERE orderId=$orderId";
   
   $qeury_result = mysqli_query($connection ,$sql_query);
    if($qeury_result ==1) {
      /////////////////////////////
        /////////////////////////////
        ////////////////////////////////
        //codes for sending email//
        ///////////////////////////////
        /////////////
      $sql1_query="SELECT * FROM orderdetails WHERE orderId=$orderId";
   
     $qeury_result = mysqli_query($connection ,$sql1_query);
     while ($od1=mysqli_fetch_array($qeury_result,MYSQLI_ASSOC)) {
      
      $uid= $od1['userId'];

       $sql1="SELECT email FROM users WHERE userId=$uid";
   
                   $qeury1 = mysqli_query($connection ,$sql1);
                   $res=mysqli_fetch_assoc($query1);
                   $email=$res['email'];

        include_once ('..\helpers/class.phpmailer.php');
            
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

          $mail->setFrom('1000084@daffodil.ac', 'Order Cancellation');
          //$mail->addReplyTo('info@example.com', 'testing');
          $mail->addAddress($email);   // Add a recipient
          //$mail->addCC('cc@example.com');
          //$mail->addBCC('bcc@example.com');

          $mail->isHTML(true);  

          $bodyContent = '<h1>DearCustomer, </h1> <br /> <b>Thank you for your order. We are sorry to say that, We are unable to process your order. Please try again later.<br /> Rregrards, <br/>Abdullah <br /> CEO OMMS </b>';
          

          $mail->Subject = 'Oeder Details';
          $mail->Body    = $bodyContent;

          if(!$mail->send()) {
              echo 'Message could not be sent.';
              echo 'Mailer Error: ' . $mail->ErrorInfo;
          } else {
              echo 'Message has been sent';
          }
        }
          /////////////////////////////
          //////////////////////


    $_SESSION['message']='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    Order Has Been Cancelled!.
    </div>';
         header ("Location:orders.php"); 
     } 
    }


    if(isset($_POST['approve'])){
    $status="completed";
   $sql_query="UPDATE `order` SET `status`='$status' WHERE orderId=$orderId";
   
   $qeury_result = mysqli_query($connection ,$sql_query);
    if($qeury_result ==1) {
    /*$_SESSION['message']='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  Successfully Approved This Order.
    </div>';
  header ("Location:orders.php");   */
     $sql_query="SELECT * FROM orderdetails WHERE orderId=$orderId";
   
     $qeury_result = mysqli_query($connection ,$sql_query);
     while ($od=mysqli_fetch_array($qeury_result,MYSQLI_ASSOC)) {
      $mid = $od['medicineId'];
      $qnt = $od['quantity'];
      $uid= $od['userId'];
      $qry = "SELECT * FROM medicine WHERE medicineId=$mid";
      $result=mysqli_query($connection, $qry);
      while ($m=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $st=$m['stock']-$qnt;

        $sql="UPDATE medicine SET stock=$st WHERE medicineId=$mid";

        $rslt=mysqli_query($connection,$sql);
                if ($rslt==1) {
                    $_SESSION['message']='<div class="alert alert-success">
                    <a class="close" href="#" data-dismiss="alert">
                    <i class="fa fa-times-circle"></i>
                    </a>
                    You  have  Successfully Approved This Order.
                    </div>';
                    /////////////////////////////
        /////////////////////////////
        ////////////////////////////////
        //codes for sending email//
        ///////////////////////////////
        /////////////

                    $sql1="SELECT email FROM users WHERE userId=$uid";
   
                   $qeury1 = mysqli_query($connection ,$sql1);
                   $res=mysqli_fetch_assoc($query1);
                   $email=$res['email'];
        include_once ('..\helpers/class.phpmailer.php');
            
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

          $bodyContent = '<h1>DearCustomer, </h1> <br /> <b>Your Order Have Been Approved. Soon we will deliver your order.<br> Thank you, happy shopping next time. <br /> Rregrards, <br/>Abdullah <br /> CEO OMMS </b>';
          

          $mail->Subject = 'Oeder Details';
          $mail->Body    = $bodyContent;

          if(!$mail->send()) {
              echo 'Message could not be sent.';
              echo 'Mailer Error: ' . $mail->ErrorInfo;
          } else {
              echo 'Message has been sent';
          }
          /////////////////////////////
          //////////////////////


                 header ("Location:orders.php");
                }else{
                    $_SESSION['message']='<div class="alert alert-success">
                    <a class="close" href="#" data-dismiss="alert">
                    <i class="fa fa-times-circle"></i>
                    </a>
                    error.'.mysqli_error($connection).'
                    </div>';
                }
      }
       
     }
     } else{
          $_SESSION['message']='<div class="alert alert-success">
                    <a class="close" href="#" data-dismiss="alert">
                    <i class="fa fa-times-circle"></i>
                    </a>
                    error.'.mysqli_error($connection).'
                    </div>';
     }
    }
 ?>
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">



<?php include_once 'head.php';



?>
  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Admin</b>Protal</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Protal</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <?php include_once 'header.php';?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once 'sidebar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php 
      if ($_SESSION['id']){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      }
      echo $successmassage;
        
      
      ?>
      
      
      
     
       
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <?php $orderId= $_GET['orderId'];
          ?>
            <div class="box-header">
              <h3 class="box-title">Order Details of = #<?php echo $orderId; ?></h3>

              <div class="box-tools">
              <form action="" method="POST">
                   <?php
                    $sql_query4="SELECT * FROM `order` WHERE orderId=$orderId";                    
                    $sql_view4= mysqli_query($connection ,$sql_query4);
                    $ord=mysqli_fetch_array($sql_view4);
                      $sta=$ord['status'];
                    if($sta=='pending'){
                    ?>
               
               <button type="submit" class="btn  btn-sm  btn-warning" name="approve">Approve Order</button>
               <button type="submit" class="btn  btn-sm  btn-warning" name="cancel">Cancel Order</button>
               <?php }else if($sta=='completed'){ ?>
                <button class="btn  btn-sm  btn-success" name="approve">Approved</button>
               <?php } else{?>
               <button class="btn  btn-sm  btn-danger" name="approve">Cancelled</button>
               <?php }?>
              </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Product Name</th>
                  <th>Product Quantity</th>
                  <th>Total Price (TK)</th>
                    
                </tr>
                  <?php
                    $sql_query="SELECT * FROM `orderdetails`  WHERE orderId=$orderId";                    
                    $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);
                    while($r=mysqli_fetch_array($sql_view)){
                    ?>
                <tr>
                  <td><?php 
                  $p_id=$r['medicineId']; 
                   $sql_proname="SELECT * FROM `medicine`  WHERE medicineId=$p_id";                    
                    $sql_pview= mysqli_query($connection ,$sql_proname);
                    //var_dump($sql_view);
                   $p=mysqli_fetch_array($sql_pview);
                   echo  $p['medicineName'];
                  ?>  </td>
                    <td><?php echo $r['quantity']; ?></td>
                     <td><?php echo $r['subTotal']; ?></td>
                </tr>
                <?php  } ?>
                <br />
                <tr style="background: #00c0ef !important;">
                 <?php
                 $user=$ord['userId'];
                    $sql_query="SELECT * FROM `users` WHERE  userId=$user";                    
                    $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);
                     $userin=mysqli_fetch_array($sql_view);
                    ?>
                <td colspan="2">Delivery Information: 
                <?php 
                
                     echo "<br> <br> Phone: ". $userin['phoneNo'];
                     echo "<br> Adsress: " . $userin['streetAddress'];
                ?>
                 
                </td>
                <td>Order Total TK :
                
                                 
                   <?php echo $ord['total']; ?> 
                  
                 </td>
                </tr>
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once 'footer.php';?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>

