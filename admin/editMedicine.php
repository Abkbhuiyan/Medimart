<?php  include_once '..\dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 
 
 
   $medicine_id = $_GET['user_id'];
    if(isset($_POST['submit'])){
    extract($_REQUEST);
    $sql_query="UPDATE `medicine` SET `medicineName`='$medicineName',`groupId`=$medicineGroup,
                                        `categoryid`=$medicineCategory,`manufacturar`='$manufacturar',
                                        `description`='$description',`administration`='$administration',
                                        `unitPrice`=$unitPrice,`drugInteraction`='$drugInteraction',
                                        `stock`=$stock,
                                        `adultDoge`='$adultDoge',
                                        `childrenDoge`='$childrenDoge',
                                        `pregnancyCategory`='$pregnancyCategory',
                                        `diseasesInteraction`='$diseasesInteraction'
                                         WHERE medicineId ='$medicine_id'";
         echo $sql_query;
   $qeury_result = mysqli_query($connection ,$sql_query);
    if($qeury_result ==1) {
    $_SESSION['massage']='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  Successfully Updated your  Product information.
    </div>';
    header("Location: allMedicineList.php");
     } else{
    $_SESSION['massage']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  an error .Please try again....'.mysqli_error($connection).'
    </div>';
    
   header("Location: index.php"); 
   }
    }
 
 
 
 
    
 
 ?>



<?php 
include_once 'head.php';
?>
  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
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
      }
      
        
      
      ?>
      <h1>
      
        Edit Product
         
      </h1>
       
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row"> 
         
       <div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Product Table</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
               <?php
                    
                    $sql_query="SELECT * FROM `medicine` WHERE medicineId=$medicine_id";
                    
                    // echo $sql_query;
                    $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);
                      $rows=mysqli_fetch_array($sql_view);
                
                ?>
                
               
             <form class="form-horizontal" action="" method="post"  enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label   class="col-sm-3 control-label">Medicine Name</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $rows['medicineName']; ?>" required=""  name="medicineName" placeholder="Enter Medicine Name">
                  </div>
                </div>
                <div class="form-group">
                  <label   class="col-sm-3 control-label">Medicine Group</label>
                  <div class="col-sm-9">
                    <select name="medicineGroup"  required=""  class="form-control">          
                      <?php //echo loadMedicineGroups($rows['groupId]']); ?>
                      <?php echo loadMedicineGroups($rows['groupId']); ?>
                    </select>
                </div>
              </div>
              <div class="form-group">
                  <label   class="col-sm-3 control-label">Medicine Category</label>
                  <div class="col-sm-9">
                    <select name="medicineCategory"  required=""  class="form-control">            
                      <?php //echo loadMedicineCategories($rows['categoryid]']); ?>
                      <?php echo loadMedicineCategories($rows['categoryid']); ?>
                    </select>
                </div>
              </div>
                
              
              <div class="form-group">
                  <label  class="col-sm-3 control-label">Medicine Details</label>

                  <div class="col-sm-9">
                     
                    <textarea rows="4" cols="50" required="" class="form-control" name="description"><?php echo $rows['description']; ?></textarea>
                  </div>
                </div>
          
                <div class="form-group">
                  <label  class="col-sm-3 control-label">Drug Interaction</label>

                  <div class="col-sm-9">
                     
                    <textarea rows="4" cols="50" required="" class="form-control" name="drugInteraction"><?php echo $rows['drugInteraction']; ?></textarea>
                  </div>
                </div>
              
                <div class="form-group">
                  <label  class="col-sm-3 control-label">Diseases Intreraction</label>

                  <div class="col-sm-9">
                     
                    <textarea rows="4" cols="50" required="" class="form-control" name="diseasesInteraction"><?php echo $rows['diseasesInteraction']; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label   class="col-sm-3 control-label">Pregnancy Category</label>

                  <div class="col-sm-9">
                    <select name="pregnancyCategory"  required=""  class="form-control">
                      <option value="">Select One</option>             
                      <option value="A" <?php if ($rows['pregnancyCategory']=="A") echo'selected ="selected"'; ?> >A</option>
                      <option value="B" <?php if ($rows['pregnancyCategory']=="B") echo'selected ="selected"'; ?> >B</option>
                      <option value="C" <?php if ($rows['pregnancyCategory']=="C") echo'selected ="selected"'; ?>>C</option>
                      <option value="D" <?php if ($rows['pregnancyCategory']=="D") echo'selected ="selected"'; ?>>D</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-3 control-label">Usage & Administration</label>

                  <div class="col-sm-9">
                     
                    <textarea rows="4" cols="50" required="" class="form-control" name="administration"><?php echo $rows['administration']; ?></textarea>

                  </div>
                </div>

                 <div class="form-group">
                  <label   class="col-sm-3 control-label">Adult Dosages</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control"  required="" value="<?php echo $rows['adultDoge']; ?>"  name="adultDoge" placeholder="Eg: 2ml, 3 times in a day!">
                  </div>
                </div>

                <div class="form-group">
                  <label   class="col-sm-3 control-label">Children Dosage</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control"  required=""  value="<?php echo $rows['childrenDoge']; ?>" name="childrenDoge" placeholder="Eg: 2ml, 3 times in a day!">
                  </div>
                </div>

                <div class="form-group">
                <label   class="col-sm-3 control-label">Manufacturar Name</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control"  required="" value="<?php echo $rows['manufacturar']; ?>" name="manufacturar" placeholder="Eg:- Square Pharma Ltd.">
                  </div>
                </div>

                <div class="form-group">
                  <label   class="col-sm-3 control-label">Medicine Price</label>

                  <div class="col-sm-9">
                    <input type="number" min="0" class="form-control" required="" value="<?php echo $rows['unitPrice']; ?>" name="unitPrice" placeholder="Unit Price for Medicine">
                  </div>
                </div>

                 <div class="form-group">
                  <label   class="col-sm-3 control-label">Stock Quantity</label>

                  <div class="col-sm-9">
                    <input type="number" min="1" class="form-control" required="" value="<?php echo $rows['stock']; ?>" name="stock" placeholder="How many Medicine In Stock">
                  </div>
                </div>
                
               
              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" name="submit" class="btn btn-info pull-right">Update Details</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
           
          <!-- /.box -->
        </div>
       
       
        <!-- ./col -->
         
        <!-- ./col -->
         
        <!-- ./col -->
         
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
       
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 

  function loadMedicineCategories($classId){
    $con = mysqli_connect("localhost","root","","medimart");
    $query = "select * from medicinecategory";
    $result= mysqli_query($con, $query);
    $output= '';

      while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $id = $row['categoryId'];
        $class =$row['categoryName'];
        $selected='';
        if ($classId == $id){
          $selected .='selected ="selected"';
        }
            $output .= '<option '.$selected.'value="'.$id.'">'.$class.'</option>';

      }
    return $output;
  }


  function loadMedicineGroups($groupId){
    $con = mysqli_connect("localhost","root","","medimart");
    $query = "select * from medicinegroup";
    $result= mysqli_query($con, $query);
    $output= '';

      while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $id = $row['groupId'];
        $class =$row['groupName'];
         $selected='';
         if ($groupId == $id){
          $selected .='selected ="selected"';
        }
         $output .= '<option '.$selected.'value="'.$id.'">'.$class.'</option>';
      }
    return $output;
  }


  include_once 'footer.php';?>

  
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
