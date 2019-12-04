<?php 
include_once '..\dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 $user_id = $_SESSION['id'];
 ?>

<?php include_once 'head.php';
  if (isset($_POST['update'])) {
    extract($_REQUEST);
    $sql= "SELECT stock FROM medicine WHERE medicineId=$medicineId";
    $result = mysqli_query($connection,$sql);
      
      $value = mysqli_fetch_assoc($result);
      $stock += $value['stock'];
       
      $sql_query1="UPDATE `medicine` SET `stock`='$stock' WHERE medicineId='$medicineId'";
      $result1 = mysqli_query($connection,$sql_query1);

      if ($result1 == 1) {
         $_SESSION['massagedd'] ='<div class="alert alert-success">
            <a class="close" href="#" data-dismiss="alert">
            <i class="fa fa-times-circle"></i>
            </a>
            The stock is successfully updated!
            </div>'; 
      }else{
         $_SESSION['massagedd'] ='<div class="alert alert-fail">
            <a class="close" href="#" data-dismiss="alert">
            <i class="fa fa-times-circle"></i>
            </a>
            something went wrong please try again later.'.mysqli_error($connection).'
            </div>'; 
      }

     
  }
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
        echo $_SESSION['massage'];
        unset($_SESSION['massage']);
      }
         if ($_SESSION['massagedd']){
        echo $_SESSION['massagedd'];
        unset($_SESSION['massagedd']);
     }
        
     
      ?>
      
      
      
      <h1>
      
      
        <small> </small>
      </h1>
       
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Low or empty stock Medicine</h3>

               
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                    <th>Medicine Id</th>
                    <th>Medicine Image</th>
                    <th>Medicine Name</th>
                    <th>Company</th>
                    <th>Medicine Stock</th>
                    <th>Operations</th>
                </tr>
                
                <?php
                    $id = $_SESSION['id'];
                    //$_SESSION['user_id'];
                    $sql_query="SELECT * FROM `medicine` WHERE stock<10";
                    
                    // echo $sql_query;
                    $sql_view= mysqli_query($connection ,$sql_query);
                   
                    //var_dump($sql_view);
                     while($rows=mysqli_fetch_array($sql_view)){
                
                ?>
                <tr>
                  <td><?php echo $rows['medicineId']; ?></td>
                   <td>
                   <img style="width: 80px;" src="medicinePhoto/<?php echo $rows['medicinePhoto']; ?>" />
                  </td>
                  <td><?php echo $rows['medicineName']; ?></td>
                  <td><?php echo $rows['manufacturar']; ?></td>
                  <td><?php echo $rows['stock']; ?></td>
                   <td>
                   <form action="" method="POST">
                   <input  type="hidden" name="medicineId" value="<?php echo $rows['medicineId']; ?>"/>
                   <input type="number" name="stock" min="10" required="" /><br />
                   <button    class="btn  btn-xs btn-info" type="submit" name="update">Add New Stock</button>
                   </form>
                   </td> 
                </tr>
                 <?php   }?>
                 
                 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row (main row) -->

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
         
           
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
