<?php 
include_once '..\dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 //$user_id = $_SESSION['id'];
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
      if ($_SESSION['id']){
        echo $_SESSION['massage'];
      }
      
        // if ($_SESSION['id']){
        echo $_SESSION['massagedd'];
        unset($_SESSION['massagedd']);
      //}
      
      
      ?>
      <h1>
      
        Medicine Group
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
              <h3 class="box-title"> Medicine Group Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="addGroup.php" method="post"  enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label   class="col-sm-4 control-label"> Drug Group Name</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="groupName" required=""  name="groupName" placeholder="Group Name" onkeyup="ajaxnew('groupName')" />
                    <div class="groupNameError" style="display: none"></div>
                  </div>
                </div>  
                 <div class="form-group">
                  <label   class="col-sm-4 control-label">Medicine Class</label>

                  <div class="col-sm-8">
                    <select name="medicineClass"  required=""  class="form-control">   
                      <?php echo loadMedicineClasses(); ?>
                    </select>
                </div>
              </div>
                <div class="form-group">
                  <label  class="col-sm-4 control-label">Indications</label>

                  <div class="col-sm-8">
                     
                    <textarea rows="4" cols="50" required="" class="form-control" name="indications" placeholder="Indication and Usages" id="indications" onkeyup="ajaxnew('indications')" ></textarea>
                    <div class="indicationsError" style="display: none"></div>

                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-4 control-label">Interaction</label>

                  <div class="col-sm-8">
                     
                    <textarea rows="4" cols="50" required="" class="form-control" name="interaction" placeholder="Drug and Deasies Interaction with the group." id="interaction" onkeyup="ajaxnew('interaction')" ></textarea>
                    <div class="interactionError" style="display: none"></div>


                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-4 control-label">Precaution</label>

                  <div class="col-sm-8">
                     
                    <textarea rows="4" cols="50" required="" class="form-control" name="precaution" placeholder="Precaution of the group" id="precaution" onkeyup="ajaxnew('precaution')" ></textarea>
                    <div class="precautionError" style="display: none"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-4 control-label">Side Effects</label>

                  <div class="col-sm-8">
                     
                    <textarea rows="4" cols="50" required="" class="form-control" id="sideEffects" name="sideEffects" placeholder="Side Effect of the medicine group"onkeyup="ajaxnew('sideEffects')" ></textarea>
                    <div class="sideEffectsError" style="display: none"></div>

                  </div>
                </div>

                <div class="form-group">
                  <label   class="col-sm-4 control-label"> Dosage Formats</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control"  required=""  name="dosageFormat" placeholder="Doge Format" id="dosageFormat" onkeyup="ajaxnew('dosageFormat')" />

                    <div class="dosageFormatError" style="display: none"></div>
                  </div>
                </div> 

              <!-- /.box-body -->
              <div class="box-footer">
               
                <button type="submit"name="addGroup" class="btn btn-info pull-right">Add Class</button>
              </div>
  
            </form>
          </div>
          
        </div>
     
      </div>

    </section>

  </div>

  <?php include_once 'footer.php';?>
  
</body>
</html>

<?php 

function loadMedicineClasses(){
    $con = mysqli_connect("localhost","root","","medimart");
    $query = "select * from medicineclass";
    $result= mysqli_query($con, $query);
    $output= '';

      while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $id = $row['classId'];
        $class =$row['className'];
        //echo $eventName;
        $output .= '<option value="'.$id.'">'.$class.'</option>';

          //echo "<option value='$eventName'>".$eventName."</option>";
      }
    return $output;
  }
  
 ?>