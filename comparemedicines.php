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
                    url:'fetchData.php',
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

                            var abc = result[i].medicineName;
                            var id= result[i].medicineId;
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
                  <label   class="col-lg-12">Medicine To Compare</label>

                  <div class="col-lg-12">
                    <select id="m1" name="m1"  required=""  class="form-control"> 
                    <option value="">Please Select</option>  
                      <?php echo loadMedicine(); ?>
                    </select>
                </div>
            </div>
                  <div class="col-lg-6">
                  <label   class="col-lg-12">Medicine With Compare</label>

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
          $m2 = $_POST['m2']; 
           $con = mysqli_connect("localhost","root","","medimart");
          $sql="select 
                m.medicineId,
                m.medicineName,
                m.medicinePhoto,
                m.unitPrice,
                m.manufacturar,
                m.description,
                m.administration,
                m.drugInteraction,
                m.diseasesInteraction,
                m.adultDoge,
                m.pregnancyCategory,
                m.childrenDoge,
                mc.categoryName,
                mg.groupName
                from medicine m,medicinecategory mc, medicinegroup mg
                where m.categoryId = mc.categoryId 
                and m.groupId = mg.groupId 
                and m.medicineId=$m1";
          
          $result = mysqli_query($con, $sql);
          
          $med1 = mysqli_fetch_assoc($result);

          $sql1="select 
                m.medicineId,
                m.medicineName,
                m.medicinePhoto,
                m.unitPrice,
                m.manufacturar,
                m.description,
                m.administration,
                m.drugInteraction,
                m.diseasesInteraction,
                m.adultDoge,
                m.pregnancyCategory,
                m.childrenDoge,
                mc.categoryName,
                mg.groupName
                from medicine m,medicinecategory mc, medicinegroup mg
                where m.categoryId = mc.categoryId 
                and m.groupId = mg.groupId 
                and m.medicineId=$m2";
          
          $result1 = mysqli_query($con, $sql1);
          
          $med2 = mysqli_fetch_assoc($result1);
        
        ?>
        <div class="row"> 
        <div id="content" style="width: 100%;">
          <div class="title" id="t1">
            Medicine Name
          </div>
          <div class="m1" id="t2">
            <?php echo $med1['medicineName']; ?>
          </div>
          <div class="m2" id="t3">
           <?php echo $med2['medicineName']; ?>
          </div>
        </div>
      </div>

      <div class="row"> 
        <div id="content" style="width: 100%;">
          <div class="title">
            Company
          </div>
          <div class="m1">
            <?php echo $med1['manufacturar']; ?>
          </div>
          <div class="m2">
           <?php echo $med2['manufacturar']; ?>
          </div>
        </div>
      </div>

      <div class="row"> 
        <div id="content" style="width: 100%;">
          <div class="title">
            Price
          </div>
          <div class="m1">
            <?php echo $med1['unitPrice']; ?>
          </div>
          <div class="m2">
           <?php echo $med2['unitPrice']; ?>
          </div>
        </div>
      </div>
        <div class="row"> 
        <div id="content" style="width: 100%;">
          <div class="title">
            Details
          </div>
          <div class="m1">
            <?php echo $med1['description']; ?>
          </div>
          <div class="m2">
           <?php echo $med2['description']; ?>
          </div>
        </div>
      </div>

      <div class="row"> 
        <div id="content" style="width: 100%;">
          <div class="title">
            Administration
          </div>
          <div class="m1">
            <p> <?php echo $med1['administration']; ?></p>
          </div>
          <div class="m2">
           <p><?php echo $med2['administration']; ?></p>
          </div>
        </div>
      </div>
        <div class="row"> 
        <div id="content" style="width: 100%;">
          <div class="title">
            Drug Interaction
          </div>
          <div class="m1">
            <?php echo $med1['drugInteraction']; ?>
          </div>
          <div class="m2">
           <?php echo $med2['drugInteraction']; ?>
          </div>
        </div>
      </div>

      <div class="row"> 
        <div id="content" style="width: 100%;">
          <div class="title">
            Diseases Interaction
          </div>
          <div class="m1">
            <?php echo $med1['diseasesInteraction']; ?>
          </div>
          <div class="m2">
           <?php echo $med2['diseasesInteraction']; ?>
          </div>
        </div>
      </div>

        <div class="row"> 
        <div id="content" style="width: 100%;">
          <div class="title">
            Pregnancy Category
          </div>
          <div class="m1">
            <?php echo $med1['pregnancyCategory']; ?>
          </div>
          <div class="m2">
           <?php echo $med2['pregnancyCategory']; ?>
          </div>
        </div>
      </div>

      <div class="row"> 
        <div id="content" style="width: 100%;">
          <div class="title">
            Adult Dosage
          </div>
          <div class="m1">
            <?php echo $med1['adultDoge']; ?>
          </div>
          <div class="m2">
           <?php echo $med2['adultDoge']; ?>
          </div>
        </div>
      </div>
      <div class="row"> 
        <div id="content" style="width: 100%;">
          <div class="title">
            Children Doge
          </div>
          <div class="m1">
            <?php echo $med1['childrenDoge']; ?>
          </div>
          <div class="m2">
           <?php echo $med2['childrenDoge']; ?>
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
          $query = "select * from medicine";
          $result= mysqli_query($con, $query);
          $output= '';

            while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
              $id = $row['medicineId'];
              $class =$row['medicineName'];
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