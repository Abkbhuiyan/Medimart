<?php 


if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 //$user_id = $_SESSION['id'];
 //include("dbConnection.php");

 ?>

      <?php include_once('header.php');      
      ?>
              <!-- end  header section -->        
        <script type="text/javascript">
        $(document).ready(function() {
           
           $('#m1').change(function(){
                var eventName = $(this).val();
                //var date = $('#visitingDate').val();
            
                $.ajax({
                    url:'fetchdata1.php',
                    method:'POST',          
                    data:{'m1':eventName},

                    success:function(data){
                        //alert(data);
                     
                        result = $.parseJSON(data);
                        for(i in result){
  
                          // alert(result[i].medicineName);
                            if(result[i]==="false"){
                          $('#m2').html("");
                            }
                           else{

                            var abc = result[i].groupName;
                            var id= result[i].groupId;
                           // alert(abc);
                             $('#m2').append("<option value='"+id+"'>"+abc+"</option>");   
                           }

                        }
                    
                    }
                });
          });

        });
            
    </script>   
            <style type="text/css">
            .abc{
              padding-left: 10%;
              padding-right: 10%;
              padding-top: 5%;
              padding-bottom: 5%;
              
            }
            .row{
              border-collapse: separate;
              border: 1px solid black;
            }

            .title{
               width: 25%;
              padding-left:1%;
              padding-right:1%;
              float: left;
              overflow: hidden;
              font-size: 20px;
              font-weight: bold;
              font-style: italic;
              text-align: center;
              
            }
            .m1, .m2{
              width: 33%;
              padding-left:1%;
              padding-right:1%;
              float: left;
              overflow: hidden;
              font-size: 15px;
              font-weight: bold;
              font-style: italic;
              text-align: center;
              
            }

            #t1,#t2,#t3{
               font-size: 25px;
              font-weight: bold;
              font-style: italic;
              
            }
            </style>
      <div class="container" align="center">
        <div class="col-lg-8 col-md-8 abc" align="center">
          <form action="" method="post">
            <div class="col-lg-6 ">
                  <label   class="col-lg-12">Medicine Group To Compare</label>

                  <div class="col-lg-12">
                    <select id="m1" name="m1"  required=""  class="form-control"> 
                    <option value="">Please Select</option>  
                      <?php echo loadMedicine(); ?>
                    </select>
                </div>
            </div>
                  <div class="col-lg-6">
                  <label   class="col-lg-12">Medicine Group With Compare</label>

                  <div class="col-lg-12">
                    <select name="m2" id="m2" required=""  class="form-control"> 
                    </select>
                </div>
                  </div>

                  <div class="col-lg-6">
                    <h1 class="a1"><input type="submit" name="submit" value="Compare" /></h1>
                  </div>
                
          </form>
        </div>
        </div>

        <div class="container ">
        <?php 
        if (isset($_POST['submit'])) {
          $m1 = $_POST['m1'];
          $m2 = $_POST['m2']; //echo $m1."<br/>".$m2;
           $con = mysqli_connect("localhost","root","","medimart");
          $sql="select g.groupName, c.className, g.indications, g.interaction, g.precaution, g.sideEffects, g.dosageFormat from medicinegroup g,medicineclass c where g.classId = c.classId and g.groupId=$m1";
          
          $result = mysqli_query($con, $sql);
          
          $med1 = mysqli_fetch_assoc($result);

          $sql1="select g.groupName, c.className, g.indications, g.interaction, g.precaution, g.sideEffects, g.dosageFormat from medicinegroup g,medicineclass c where g.classId = c.classId and g.groupId=$m2";
          
          $result1 = mysqli_query($con, $sql1);
          
          $med2 = mysqli_fetch_assoc($result1);
        
        ?>
       <div class="row"> 
        <div id="content" style="width: 100%;">
          <div class="title"  id="t1">
            Group Name
          </div>
          <div class="m1" id="t2">
            <?php echo $med1['groupName']; ?>
          </div>
          <div class="m2" id="t3">
            <?php echo $med2['groupName']; ?>
          </div>
        </div>
        </div>
       

      <div class="row"> 
        <div id="content" style="width: 100%;">
          <div class="title">
            Medicine Class 
          </div>
          <div class="m1">
            <?php echo $med1['className']; ?>
          </div>
          <div class="m2">
           <?php echo $med2['className']; ?>
          </div>
        </div>
      </div>

      <div class="row"> 
        <div id="content" style="width: 100%;">
          <div class="title">
            Indication
          </div>
          <div class="m1">
            <?php echo $med1['indications']; ?>
          </div>
          <div class="m2">
           <?php echo $med2['indications']; ?>
          </div>
        </div>
      </div>
        <div class="row"> 
        <div id="content" style="width: 100%;">
          <div class="title">
            Interaction
          </div>
          <div class="m1">
            <?php echo $med1['interaction']; ?>
          </div>
          <div class="m2">
           <?php echo $med2['interaction']; ?>
          </div>
        </div>
      </div>

      <div class="row"> 
        <div id="content" style="width: 100%;">
          <div class="title">
            Precaution
          </div>
          <div class="m1">
            <p> <?php echo $med1['precaution']; ?></p>
          </div>
          <div class="m2">
           <p><?php echo $med2['precaution']; ?></p>
          </div>
        </div>
      </div>
        <div class="row"> 
        <div id="content" style="width: 100%;">
          <div class="title">
            Side Effect
          </div>
          <div class="m1">
            <?php echo $med1['sideEffects']; ?>
          </div>
          <div class="m2">
           <?php echo $med2['sideEffects']; ?>
          </div>
        </div>
      </div>

      <div class="row"> 
        <div id="content" style="width: 100%;">
          <div class="title">
            Dosage Format
          </div>
          <div class="m1">
            <?php echo $med1['dosageFormat']; ?>
          </div>
          <div class="m2">
           <?php echo $med2['dosageFormat']; ?>
          </div>
        </div>
      </div>

    <?php } ?>
      </div>
    
      <div class="container">
        
     <br /><br /><br />
      <?php include_once('footer.php');


      function loadMedicine(){
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
      
    </div>
  
 
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
        <!--Start of Tawk.to Script-->

    
  </body>

</html>