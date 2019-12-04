<?php 
include_once '..\dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 $user_id = $_SESSION['id'];
 ?>



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
     
     // if ($_SESSION['id']){
        echo $_SESSION['massage'];
    //  }
        echo $_SESSION['massagedd'];
        unset($_SESSION['massagedd']);
    
      
      ?>
      <h1>
      
        New Medicine Add
      </h1>
       
    </section>

     <script>
    function ajaxnew(feild){
      
      
      var nvalue = $("#"+feild).val();
         
        //alert(nvalue);
        var postForm = { //Fetch form data
            [feild]    : nvalue //Store name fields value
        };
  
       $.ajax({

                type: "POST",
                url: "classvalidator.php",
                dataType: "json",
                data: postForm,
                success : function(data){
                   if(typeof data["error_"+feild] !== 'undefined') {
             
                    $("."+feild+"Error").html("<span>"+data["error_"+feild]+"</span>");
                    $("."+feild+"Error").css("display","block");
                       $("."+feild+"Error").css("color","red");
                        
                   }
                     else{
                       $("."+feild+"Error").css("display","none");
                      
                     }
                          
                }

            });


    }
    </script>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row"> 
         
       <div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Medicine Table</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="addMedicine.php" method="post"  enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label   class="col-sm-3 control-label">Medicine Name</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control"  required=""  name="medicineName" placeholder="Enter Medicine Name" id="medicineName" onkeyup="ajaxnew('medicineName')" />
                    <div class="medicineNameError" style="display: none"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label   class="col-sm-3 control-label">Medicine Group</label>

                  <div class="col-sm-9">
                    <select name="medicineGroup"  required=""  class="form-control">
                                    
                      <?php echo loadMedicineGroups(); ?>
                    </select>
                </div>
              </div>
              <div class="form-group">
                  <label   class="col-sm-3 control-label">Medicine Category</label>

                  <div class="col-sm-9">
                    <select name="medicineCategory"  required=""  class="form-control">
                                    
                      <?php echo loadMedicineCategories(); ?>
                    </select>
                </div>
              </div>
                
              
              <div class="form-group">
                  <label  class="col-sm-3 control-label">Medicine Details</label>

                  <div class="col-sm-9">
                     
                    <textarea rows="4" cols="50" required="" class="form-control" id="description" name="description" onkeyup="ajaxnew('description')"></textarea>

                    <div class="descriptionError" style="display: none"></div>
                  </div>
                </div>
          
                <div class="form-group">
                  <label  class="col-sm-3 control-label">Drug Interaction</label>

                  <div class="col-sm-9">
                     
                    <textarea rows="4" cols="50" required="" class="form-control" name="drugInteraction" id="drugInteraction" onkeyup="ajaxnew('drugInteraction')"></textarea>

                    <div class="drugInteractionError" style="display: none"></div>
                  </div>
                </div>
              
                <div class="form-group">
                  <label  class="col-sm-3 control-label">Diseases Intreraction</label>

                  <div class="col-sm-9">
                     
                    <textarea rows="4" cols="50" required="" class="form-control" name="diseasesInteraction" id="diseasesInteraction" onkeyup="ajaxnew('diseasesInteraction')"></textarea>

                    <div class="diseasesInteractionError" style="display: none"></div>
                  </div>
                </div>

                <div class="form-group">
                  <label   class="col-sm-3 control-label">Pregnancy Category</label>

                  <div class="col-sm-9">
                    <select name="pregnancyCategory"  required=""  class="form-control">
                      <option value="">Select One</option>             
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-3 control-label">Usage & Administration</label>

                  <div class="col-sm-9">
                     
                    <textarea rows="4" cols="50" required="" class="form-control" name="administration" id="administration" onkeyup="ajaxnew('administration')"></textarea>

                    <div class="administrationError" style="display: none"></div>

                  </div>
                </div>

                 <div class="form-group">
                  <label   class="col-sm-3 control-label">Adult Dosages</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="adultDoge" required=""  name="adultDoge" placeholder="Eg: 2ml, 3 times in a day!" onkeyup="ajaxnew('adultDoge')" />
                    <div class="adultDogeError" style="display: none"></div>
                  </div>
                </div>

                <div class="form-group">
                  <label   class="col-sm-3 control-label">Children Dosage</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control"  required=""  name="childrenDoge" placeholder="Eg: 2ml, 3 times in a day!" id="childrenDoge" onkeyup="ajaxnew('childrenDoge')" />
                    <div class="childrenDogeError" style="display: none"></div>
                  </div>
                </div>

                <div class="form-group">
                <label   class="col-sm-3 control-label">Manufacturar Name</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control"  required="" name="manufacturar" placeholder="Eg:- Square Pharma Ltd." id="manufacturar" onkeyup="ajaxnew('manufacturar')" />
                    <div class="manufacturarError" style="display: none"></div>
                  </div>
                </div>

                <div class="form-group">
                  <label   class="col-sm-3 control-label">Medicine Price</label>

                  <div class="col-sm-9">
                    <input type="text"  class="form-control" required="" name="unitPrice" placeholder="Unit Price for Medicine" id="unitPrice"  onkeyup="ajaxnew('unitPrice')" />
                    <div class="unitPriceError" style="display: none"></div>
                  </div>
                </div>

                 <div class="form-group">
                  <label   class="col-sm-3 control-label">Stock Quantity</label>

                  <div class="col-sm-9">
                    <input type="number" min="5" class="form-control" required="" id="stock" name="stock" placeholder="How many Medicine In Stock" onkeyup="ajaxnew('stock')" />
                    <div class="stockError" style="display: none"></div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile" class="col-sm-3 control-label" >Medicine Photo</label>
                   <div class="col-sm-9">
                  <input type="file" class="form-control"  required="" name="medicinePhoto">
                    </div>
                   
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default" name="cancell">Cancel</button>
                <button type="submit" name="addMedicine" class="btn btn-info pull-right">Add Medicine</button>
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
  <?php include_once 'footer.php';?>

  
</body>
</html>


<?php 

function loadMedicineCategories(){
    $con = mysqli_connect("localhost","root","","medimart");
    $query = "select * from medicinecategory";
    $result= mysqli_query($con, $query);
    $output= '';

      while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $id = $row['categoryId'];
        $class =$row['categoryName'];
        //echo $eventName;
        $output .= '<option value="'.$id.'">'.$class.'</option>';
          //echo "<option value='$eventName'>".$eventName."</option>";
      }
    return $output;
  }

  function loadMedicineGroups(){
    $con = mysqli_connect("localhost","root","","medimart");
    $query = "select * from medicinegroup";
    $result= mysqli_query($con, $query);
    $output= '';

      while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $id = $row['groupId'];
        $class =$row['groupName'];
        //echo $eventName;
        $output .= '<option value="'.$id.'">'.$class.'</option>';
          //echo "<option value='$eventName'>".$eventName."</option>";
      }
    return $output;
  }
  
 ?>
