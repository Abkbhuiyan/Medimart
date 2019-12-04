
<?php 
include_once('header.php');
include_once('dbConnection.php');
?>

<?php 
$mes='';
//function createUser(){
  $firstName = $lastName = $gender = $email = $phoneNo = $streetAddress = $city = $district = $postalCode = $password = $userType="";
    $firstNameErr = $lastNameErr = $emailErr = $phoneNoErr = $streetAddressErr = $cityErr = $districtErr = $postalCodeErr =$passwordErr ="";


  if(isset($_POST['btnregister'])){
      $userType = $_POST['userType'];
      if (empty($_POST["firstName"])) {
      $firstNameErr = "FirstName Is required";

      }
      else if (!ctype_alpha(str_replace([' ','-'], '', $_POST["firstName"]))) {

         $firstNameErr= "Only letters,'-' and white space allowed";
       } else {
          $firstName = $_POST["firstName"];
      }
      //validating last name field
        if (empty($_POST["lastName"])) {
          $lastNameErr = "LastName Is required";
      }
      else if (!ctype_alpha(str_replace([' ','-'], '', $_POST["lastName"]))) {
         $lastNameErr = "Only letters,'-' and white space allowed";  
        } else {
          $lastName = $_POST["lastName"];
      }
      //validating phone number
      if (empty($_POST["phoneNo"])){
        $phoneNoErr = "You Must Enter The Phone"; 
      }else if (!ctype_digit ($_POST["phoneNo"])){
      $phoneNoErr = "Please Enter a Valid Phone Number";
      }else if(strlen($_POST["phoneNo"])!=11){
        $phoneNoErr = "Number Must be 11 digit long";
      }else {
          $phoneNo = $_POST["phoneNo"];
      }

      //validating street address
      if (empty($_POST["streetAddress"])){
        $streetAddressErr = "You Must Enter The Address"; 
      }else {
          $streetAddress = $_POST["streetAddress"];
      }
      // validating email
      if (empty($_POST["email"])) {
          $emailErr = "Email is required";
      } 
      else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email address";
      }else {
        $email = $_POST["email"];
        $sql = "SELECT * FROM users WHERE email= '$email'";
        $result = $connection->query($sql);
         if ($result->num_rows == 1) {
          $emailErr = "Email Already exist. Try another or login.";
         }
         else{
          $email = $_POST["email"];
         }
      }

      //validating postal code
      if (!empty($_POST["postalCode"])){
         if (!ctype_digit ($_POST["postalCode"])){
          $postalCodeErr = "Invalid Post/ZIP Code";
        }else if(strlen($_POST["postalCode"])!= 4){
          $postalCodeErr = "Postalcode must be 4 digit long";
        }else {
            $postalCode = $_POST["postalCode"];
        }
      }

       //validating district
      if (!empty($_POST["district"])){
         if (!ctype_alpha ($_POST["district"])){
          $districtErr = "";
        }else {
            $district = $_POST["district"];
        }
      }


      //validating city
      if (empty($_POST["city"])){
        $cityErr = "You must enter city name";
      }else if (!ctype_alpha(str_replace([' ','-'], '', $_POST["firstName"]))){
        $cityErr = "Digit not allowed";
      }else{
        $city = $_POST["city"];
      }

      //validating password
       if (empty($_POST["password"])){
        $passwordErr = "Password is required";
      }else if(strlen($_POST['password']) <8){
        $passwordErr = "Password must be 8 characters long.";
      }
      else if (!preg_match("/^[a-zA-Z0-9 *$@!#^%]/",$_POST['password'])) {
        $passwordErr = "Password Require at least one Upper case letter, one lower case letter, one digit and one special character.";
      }elseif ($_POST['password']!=$_POST['cpassword']) {
        $passwordErr = "Password didn't match!";
      }else{
        $password =$_POST['password'] ;
      }
      echo $firstName."<br/>".$lastName."<br/>".$phoneNo."<br/>".$email."<br/>".$password."<br/>".$streetAddress."<br/>".$city."<br/>";
      if (!empty($firstName) && !empty($lastName) && !empty($phoneNo) && !empty($email) && !empty($password) &&!empty($streetAddress) && !empty($city)  ) {
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
  
    
  
    
//}

 ?>

   <!-- <script>
    function ajaxnew(feild){
      
      
      var value = $("#"+feild).val();
         

       var postForm = { //Fetch form data
                [feild]    : value //Store name fields value
            };
      //var ht = "";
  
       $.ajax({

                type: "POST",
                url: "uvalidation.php",
                dataType: "json",
                data: {postForm},
                success : function(data){
                    alert(data);
                   // result = $.parseJSON(data);
                    // for(i in result){
                    if (data.fieldtype == "email"){
                        $(".errorEmail").html("<span>"+data.msgEmail+"</span>");
                        $(".errorEmail").css("display","block");
                    } 
                    else if(data.fieldtype == "firstName") {
                        $(".errorFirstName").html("<span>"+data.msgFirstName+"</span>");
                        $(".errorFirstName-display-error").css("display","block");
              
                    }
                   else if(data.fieldtype == "lastName") {
                        $(".errorLastName").html("<span>"+data.msgLastName+"</span>");
                        $(".errorLastName").css("display","block");
              
                    }
                    else if(data.fieldtype == "phoneNo") {
                        $(".errorPhoneNo").html("<span>"+data.msgPhoneNo+"</span>");
                        $(".errorPhoneNo").css("display","block");
              
                    }
                     else if(data.fieldtype == "streetAddress") {
                        $(".streetAddress-display-error").html("<span>"+data.msgStreetAddress+"</span>");
                        $(".streetAddress-display-error").css("display","block");
              
                    }
                     else if(data.fieldtype == "city") {
                        $(".errorCity").html("<span>"+data.msgCity+"</span>");
                        $(".errorCity").css("display","block");
              
                    }
                     else if(data.fieldtype == "district") {
                        $(".errorDistrict").html("<span>"+data.msgDistrict+"</span>");
                        $(".errorDistrict").css("display","block");
              
                    }
                    else if(data.fieldtype == "postalCode") {
                        $(".errorPostalCode").html("<span>"+data.msgPostalCode+"</span>");
                        $(".errorPostalCode").css("display","block");
              
                    }
                     else if(data.fieldtype == "password") {
                        $(".errorPassword").html("<span>"+data.msgPassword+"</span>");
                        $(".errorPassword").css("display","block");
              
                    }
                    else if(data.fieldtype == "cpassword") {
                        $(".errorCPassword").html("<span>"+data.msgCPassword+"</span>");
                        $(".errorCPassword").css("display","block");
              
                    }
                //  }
            
                }

            });


    }
    </script>-->
<div class="container" >
       
    <div class="clearfix"></div>
    
      
    
<div class="col-lg-12"  style="margin-top: 20px;">
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 no_padding" style="margin-bottom: 30px;"  >
        <div class="col-lg-12 no_padding">
          
          
          <div class="main">
				 
					<div class="log-in">
                    <div class="pull-left all-p-tag "><b class="t-clr">Please Get Registered </b> Here </div>
						  
					</div>
	                   <?php  echo $mes; ?>			 
                 
				 
			</div>
          
	<div class="col-lg-10 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12"> 
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1>User Registration Form</h1>
                    <p> Please fill out the information below to register as a new customer. Must need to fill <span class="star-col">*</span> marked fields.</p>
                    <form name='registrationform' action="registration.php" method="post" onSubmit=""  class="form-vertical">
                        <div class ="row">
                            <input type="hidden" name="userType" value="2" />
                            <div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="firstName">First Name <span class="star-col">*</span></label>
                                <input type="text" name="firstName" id="firstName" placeholder="Please Enter Your First Name" class="form-control" onkeyup="ajaxnew('firstName')" />
                                    <div id="errorFirstName" style="color:red;"> <?php  echo $firstNameErr; ?>  </div>
                            </div>
                            <div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="lastName">Last Name <span class="star-col">*</span></label>
                                <input type="text" name="lastName" id="lastName" placeholder="Last name" class="form-control" onkeyup="ajaxnew('lastName')" />
                                    <div id="errorLastName" style="color:red; "><?php  echo $lastNameErr; ?></div>
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
                                <input type="text" name="phoneNo" id="phoneNo" placeholder="Your Phone No" class="form-control" onkeyup="ajaxnew('phoneNo')" />
                                    <div id="errorPhoneNo" style="color:red;"><?php  echo $phoneNoErr; ?></div>
                            </div>
                            <div class="col-lg-10  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="streetAddress">Street Address <span class="star-col">*</span></label>
                                <input type="text" name="streetAddress" id="streetAddress" placeholder="eg. 91/1/1, West Razabazar, Dhaka" class="form-control" onkeyup="ajaxnew('streetAddress')" />
                                    <div id="errorStreetAddress" style="color:red;"><?php  echo $streetAddressErr; ?></div>
                            </div>
                             <div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="city">City <span class="star-col">*</span></label>
                                <input type="text" name="city" id="city" placeholder="eg. Dhaka" class="form-control" onkeyup="ajaxnew('city')" />
                                    <div id="errorCity" style="color:red;"><?php  echo $cityErr; ?></div>
                            </div>
                             <div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="district">District <span class="star-col">*</span></label>
                                <input type="text" name="district" id="district" placeholder="eg. Chittagong" class="form-control" onkeyup="ajaxnew('district')" />
                                    <div id="errorDistrict" style="color:red;"><?php  echo $districtErr; ?></div>
                            </div>
                            <div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="postalCode">Zip / Post Code <span class="star-col">*</span></label>
                                <input type="text" name="postalCode" id="postalCode" placeholder="eg. WB1CL3AP" class="form-control" onkeyup="ajaxnew('postalCode')" />
                                    <div id="errorPostalCode" style="color:red;"><?php  echo $postalCodeErr; ?></div>
                            </div>
                            <div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="email">email</label>
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control" onkeyup="ajaxnew('email')" />
                                <div id="errorEmail" style="color:red;"><?php  echo $emailErr; ?></div>
                            </div>
                            <div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="password">password <span class="star-col">*</span></label>
                                <input type="password" name="password" id="password" placeholder="Password" class="form-control" onkeyup="ajaxnew('password')" />
                                <div id="errorPassword" style="color:red; "><?php  echo $passwordErr; ?></div>
                            </div>
                            <div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
                                <label class="control-label" for="cpassword">confirm password <span class="star-col">*</span></label>
                                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" class="form-control" onkeyup="ajaxnew('cpassword')" />
                                <div id="errorCPassword" style="color:red; display: none;"></div>
                            </div>
                            <div class="col-lg-12  col-xs-12 col-md-6 col-sm-12">
                                <div class="form-group">

                                    <button id="singlebutton" name="btnregister" class="btn btn-default">submit</button>
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
.btn {
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
  <!-- <script type="text/javascript">
      $(document).ready(function() {


          $('form').submit(function(e){
            e.preventDefault();

           var firstName = $("#firstName").val();
           var lastName = $("#lastName").val();
           var phoneNo = $("#phoneNo").val();
           var streetAddress = $("#streetAddress").val();
           var city = $("#city").val();
           var district = $("#district").val();
           var postalCode = $("#postalCode").val();
           var password = $("#password").val();
           var cpassword = $("#cpassword").val();
            var email = $("#email").val();
          //  var msg_subject = $("#msg_subject").val();
          //  var message = $("#message").val();
           var postForm = { //Fetch form data
                email:email,firstName:firstName, lastName:lastName,phoneNo:phoneNo,streetAddress:streetAddress,city:city,district:district,postalCode:postalCode,password:password,cpassword:cpassword
            };
        
           var ht = "";
            $.ajax({
                type: "POST",
                url: "uvalidation.php",
                dataType: "json",
                data: $('form').serialize(),
                success : function(data){
                    if (data.success == true){
                        <?php //createUser();?>
                    }else
                    {
                        $(".firstName-display-error").html("<span>"+data.msgFirstName+"</span>");
                        $(".email-display-error").html("<span>"+data.msgemail+"</span>");
                        $(".errorLastName").html("<span>"+data.msgLastName+"</span>");
                        $(".errorPassword").html("<span>"+data.msgPassword+"</span>");
                        $(".errorCPassword").html("<span>"+data.msgCPassword+"</span>");
                        $(".errorPhoneNo").html("<span>"+data.msgPhoneNo+"</span>");
                        $(".streetAddress-display-error").html("<span>"+data.msgStreetAddress+"</span>");
                        $(".errorCity").html("<span>"+data.msgCity+"</span>");
                        $(".errorDistrict").html("<span>"+data.msgDistrict+"</span>");
                        $(".errorPostalCode").html("<span>"+data.msgPostalCode+"</span>");


                        $(".errorPhoneNo").css("display","block");
                        $(".errorEmail").css("display","block");
                        $(".errorFirstName").css("display","block");
                        $(".errorLastName").css("display","block");
                        $(".errorPassword").css("display","block");
                        $(".errorStreetAddress").css("display","block");
                        $(".errorCity").css("display","block");
                        $(".errorDistrict").css("display","block");
                        $(".errorPostalCode").css("display","block");
                        $(".errorCPassword").css("display","block");
      
                    }
                }
            });
          });
      });
    </script>-->
<?php 
include_once('footer.php');
?>