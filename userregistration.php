
<?php 
include_once('header.php');
include_once('dbConnection.php');
$filepath = realpath(dirname(__FILE__));
  include_once ('helpers/validate.php');
?>
<?php 
$he = array();
$mes=""; 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 $validate = new Validate();
 $validation = $validate->check($_POST, 
 array(
  'firstName' =>array(
  'required'=>true,
  'max' => 40,
  'isname'=>true,
  ),
  'lastName' =>array(
  'required'=>true,
  'max' => 40,
  'isname'=>true,
  ),
  
  'email' => array(
  'required'=>true,
  'max' => 100,
  'isemail' => true,
  'unique' => 'users',
  
  ),

  'phoneNo' => array(
  'required'=>true,
  'numeric'=>true,
  'lengthmatch' =>11,
  
  ),
  'streetAddress' => array(
  'required'=>true, 
  ),

  'postalCode' => array(

  'numeric'=>true,
  'lengthmatch' =>4,
  
  ),
  'district' => array(
  'alphabetic'=>true,
  
  ),
  'city' => array(
  'alphabetic'=>true,
  
  ),

  'password' => array(
  'required'=>true,
  'min' =>6,
  'max' =>20,
  'password'=>true,
  
  ),

  'cpassword' => array(
    'required'=>true,
  'matches'=>'password',
  
  )
 
 ));

 if($validate->passed()){
  
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    extract($_REQUEST);
   // $name =$_POST['firstName'];
    $sql_query1="INSERT INTO `users`(`firstName`,`lastName`,`gender`,`email`,`phoneNo`,`streetAddress`,`city`,`district`,`postalCode`,`password`,`userType`)
          VALUES ('$firstName','$lastName','$gender','$email',$phoneNo,'$streetAddress','$city','$district',$postalCode,'$password',$userType)";
            
          $qeury_result1 = mysqli_query($connection ,$sql_query1);
           if($qeury_result1 !=1) {
              $mes='<div class="alert alert-warning">
              <a class="close" href="#" data-dismiss="alert">
              <i class="fa fa-times-circle"></i>
              </a>
              You  have  an error .Please try again....
              </div>';
            } else{
                 $mes ='<div class="alert alert-success">
                <a class="close" href="#" data-dismiss="alert">
                <i class="fa fa-times-circle"></i>
                </a>
                Thank You You are Successfully Registered.
                </div>'; 
             }
  }
 }
 else{
 
$he = $validate->errors();
//print_r($he);


 }
 
}
?>

    <script>
    function ajaxnew(feild){
      
      
      var nvalue = $("#"+feild).val();
         
        //alert(nvalue);
        var postForm = { //Fetch form data
            [feild]    : nvalue //Store name fields value
        };
  
       $.ajax({

                type: "POST",
                url: "processvalidator.php",
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
<div class="container" >
       
    <div class="clearfix"></div>
    
      
    
<div class="col-lg-12"  style="margin-top: 20px;">
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 no_padding" style="margin-bottom: 30px;"  >
        <div class="col-lg-12 no_padding">
          
          
          <div class="main">
         
          <div class="log-in">
                    <div class="pull-left all-p-tag "><b class="t-clr">Please Get Registered </b> Here </div>
              
          </div>
                     <?php   echo $mes; ?>       
                 
         
      </div>
          
  <div class="col-lg-10 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12"> 
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1>New Student Registration Form</h1>
                    <h2 style="color: red; font-size: 20px;"> Please fill out the information below to register as a new customer. Must need to fill <span class="star-col">(*)</span> marked fields.</h2>
                    <form name='registrationform' action="" method="post"   class="form-vertical>
                        <div class="row">
                            <input type="hidden" name="userType" value="2" />
                            <div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="firstName">First Name <span class="star-col">*</span></label>
                                <input type="text" name="firstName" id="firstName" placeholder="Please Enter Your First Name" class="form-control" onkeyup="ajaxnew('firstName')" value="<?php if(isset($_POST['firstName'])){echo $_POST['firstName'];} ?>" />
                                
                                    <div class="firstNameError" style="display: none"></div>
                                    <?php  if (!empty($he['error_firstName'])){ ?>
                                     <div class="firstNameError" style="display: block; color: red;"><span><?php  echo $he['error_firstName'];?></span></div> 
                                     <?php } ?>
                            </div>
                            <div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="lastName">Last Name <span class="star-col">*</span></label>
                                <input type="text" name="lastName" id="lastName" placeholder="Last name" class="form-control" onkeyup="ajaxnew('lastName')" value="<?php if(isset($_POST['lastName'])){echo $_POST['lastName'];} ?>"  />
                                    <div class="lastNameError" style="color:red; display: none;"></div>
                                    <?php  if (!empty($he['error_lastName'])){ ?>
                                     <div class="lastNameError" style="display: block; color: red;"><span><?php  echo $he['error_lastName'];?></span></div> 
                                     <?php } ?>
                            </div>
                           <div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="gender">gender <span class="star-col">*</span></label>
                                <select id="gender" name="gender" class="form-control"/>
                                    <option value="Male"> Male </option>
                                    <option value="Female"> Female </option>
                                </select>
                            </div>
                            
                          <div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="phoneNo">Contact No <span class="star-col">*</span></label>
                                <input type="text" name="phoneNo" id="phoneNo" placeholder="Your Phone No" class="form-control" onkeyup="ajaxnew('phoneNo')" value="<?php if(isset($_POST['phoneNo'])){echo $_POST['phoneNo'];} ?>" />
                                    <div class="phoneNoError" style="color:red; display: none;"></div>
                                    <?php  if (!empty($he['error_phoneNo'])){ ?>
                                     <div class="phoneNoError" style="display: block; color: red;"><span><?php  echo $he['error_phoneNo'];?></span></div> 
                                     <?php } ?>
                            </div>
                            <div class="col-lg-10  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="streetAddress">Street Address <span class="star-col">*</span></label>
                                <input type="text" name="streetAddress" id="streetAddress" placeholder="eg. 91/1/1, West Razabazar, Dhaka" class="form-control" onkeyup="ajaxnew('streetAddress')" value="<?php if(isset($_POST['streetAddress'])){echo $_POST['streetAddress'];} ?>" />
                                    <div class="streetAddressError" style="color:red; display: none;"></div>
                                  <?php  if (!empty($he['error_streetAddress'])){ ?>
                                     <div class="streetAddressError" style="display: block; color: red;"><span><?php  echo $he['error_streetAddress'];?></span></div> 
                                     <?php } ?>
                            </div>
                             <div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="city">City </label>
                                <input type="text" name="city" id="city" placeholder="eg. Dhaka" class="form-control" onkeyup="ajaxnew('city')" value="<?php if(isset($_POST['city'])){echo $_POST['city'];} ?>" />
                                    <div class="cityError" style="color:red; display: none;"></div>
                                    <?php  if (!empty($he['error_city'])){ ?>
                                     <div class="cityError" style="display: block; color: red;"><span><?php  echo $he['error_city'];?></span></div> 
                                     <?php } ?>
                            </div>
                             <div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="district">District </label>
                                <input type="text" name="district" id="district" placeholder="eg. Chittagong" class="form-control" onkeyup="ajaxnew('district')" value="<?php if(isset($_POST['district'])){echo $_POST['district'];} ?>" />
                                    <div class="districtError" style="color:red; display: none;"></div>
                                  <?php  if (!empty($he['error_district'])){ ?>
                                     <div class="districtError" style="display: block; color: red;"><span><?php  echo $he['error_district'];?></span></div> 
                                     <?php } ?>
                            </div>
                            <div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="postalCode">Zip / Post Code </label>
                                <input type="text" name="postalCode" id="postalCode" placeholder="eg. WB1CL3AP" class="form-control" onkeyup="ajaxnew('postalCode')" value="<?php if(isset($_POST['postalCode'])){echo $_POST['postalCode'];} ?>" />
                                    <div class="postalCodeError" style="color:red; display: none;"></div>
                                    <?php  if (!empty($he['error_postalCode'])){ ?>
                                     <div class="postalCodeError" style="display: block; color: red;"><span><?php  echo $he['error_postalCode'];?></span></div> 
                                     <?php } ?>
                            </div>
                            <div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="email">email<span class="star-col">*</span></label>
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control" onkeyup="ajaxnew('email')" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" />
                                <div class="emailError" style="color:red; display: none;"></div>
                                <?php  if (!empty($he['error_email'])){ ?>
                                     <div class="emailError" style="display: block; color: red;"><span><?php  echo $he['error_email'];?></span></div> 
                                     <?php } ?>
                            </div>
                            <div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="password">password <span class="star-col">*</span></label>
                                <input type="password" name="password" id="password" placeholder="Password" class="form-control" onkeyup="ajaxnew('password')" />
                                <div class="passwordError" style="color:red; display: none;"></div>
                                <?php  if (!empty($he['error_password'])){ ?>
                                     <div class="passwordError" style="display: block; color: red;"><span><?php  echo $he['error_password'];?></span></div> 
                                     <?php } ?>
                            </div>
                            <div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="cpassword">confirm password <span class="star-col">*</span></label>
                                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" class="form-control" onkeyup="ajaxnew('cpassword')" />
                                <div class="cPasswordError" style="color:red; display: none;"></div>
                                <?php  if (!empty($he['error_cpassword'])){ ?>
                                     <div class="phoneNoError" style="display: block; color: red;"><span><?php  echo $he['error_cpassword'];?></span></div> 
                                     <?php } ?>
                            </div>
                            <div class="col-lg-12  col-xs-12 col-md-6 col-sm-12">
                                <div class="form-group">

                                    <button id="singlebutton" name="btnregister" class="btn btn1 btn-default">submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    
        
        
        </div>
        
         
    </div><!--col-lg-9 product section-->
    

    
     <!--filtering-->
    <span class="clearfix"></span>
     <div class="alert alert-success" role="alert">
 <i class="fa fa-info-circle"></i>
  To get register to the system, fill up the required information.
</div>
</div>
        <style>
       .lg-rg{min-height: 350px;}
         .log-in{  
         border: 1px solid #eee;
         border-top: 2px solid #5cb85c;
    overflow: hidden;display: block;
    text-align: right;
     margin-bottom: 30px;
     border-bottom-left-radius: 3px;
     border-bottom-right-radius: 3px;
    }
    .inp-height {
    border: 1px solid #5cb85c;
    border-radius: 3px;
    height: 35px;

} 
.form-control {
    width: 100%;
    height: 50px;
    padding: 6px 12px;
    font-size: 16px;
    line-height: 1.42857143;
    color: #333;
    background-color: #fff;
    border: 1px solid #dcd9d3;
    background-image: none;
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0px 0px rgba(255, 255, 255, .075);
    box-shadow: inset 3px 3px 3px rgba(255, 255, 255, .075);
    margin-bottom: 15px;
}
.btn-default {
    color: #fff;
    background-color: #aa9658;
}
.control-label {
    color: #474747;
    font-weight: 700;
    font-size: 12px;
    text-transform: uppercase;
}
.btn1 {
    display: inline-block;
    padding: 14px 30px;
    margin-bottom: 0;
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 1px;
    line-height: 1.42857143;
    text-align: center;
    border: none;
    text-transform: uppercase;
    border-radius: 100px;
    font-family: 'Montserrat', sans-serif;
    -webkit-font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
}



.inp-height:focus{box-shadow: none!important;border: 1px solid #f7931e;}
.cl-text a{color: #5cb85c;}
  .reg-mid{margin:100px auto;width: 100%;display: block;overflow: hidden; text-align: center;}
        </style>


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

<?php 
include_once('footer.php');
?>