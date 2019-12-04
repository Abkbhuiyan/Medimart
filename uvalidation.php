<?php

include 'dbConnection.php';
$errorMSG = (object) array();


	//validating first name field
	if(isset($_POST["firstName"])){
		if (empty($_POST["firstName"])) {
		    $errorMSG->msgFirstName = "FirstName Is required";
			$errorMSG->success = false;
			$errorMSG->fieldtype = "firstName";
		}
		else if (!ctype_alpha(str_replace([' ','-'], '', $_POST["firstName"]))) {
			
		   $errorMSG->msgFirstName = "Only letters,'-' and white space allowed";
		   $errorMSG->success = false;
		   $errorMSG->fieldtype = "firstName";   
	    } else {
		    $firstName = prepareInput($_POST["firstName"]);
			$errorMSG->msgFirstName = "";
			$errorMSG->success = true;
			$errorMSG->fieldtype = "firstName";
		}
	}
	//validating last name field
	if(isset($_POST["lastName"])){
	    if (empty($_POST["lastName"])) {
		    $errorMSG->msgLastName = "LastName Is required";
			$errorMSG->success = false;
			$errorMSG->fieldtype = "lastName";
		}
		else if (!ctype_alpha(str_replace([' ','-'], '', $_POST["lastName"]))) {
			
		   $errorMSG->msgLastName = "Only letters,'-' and white space allowed";
		   $errorMSG->success = false;
		   $errorMSG->fieldtype = "lastName";   
	    } else {
		    $lastName = prepareInput($_POST["lastName"]);
			$errorMSG->msgLastName = "";
			$errorMSG->success = true;
			$errorMSG->fieldtype = "lastName";
		}
	}
	//validating phone number
	if(isset($_POST["phoneNo"])){
		if (empty($_POST["phoneNo"])){
			$errorMSG->msgPhoneNo = "You Must Enter The Phone";
		   $errorMSG->success = false;
		   $errorMSG->fieldtype = "phoneNo"; 
		}else if (!ctype_digit ($_POST["phoneNo"])){
		$errorMSG->msgPhoneNo = "Please Enter a Valid Phone Number";
		   $errorMSG->success = false;
		   $errorMSG->fieldtype = "phoneNo";
		}else if(strlen($_POST["phoneNo"])!=11){
			$errorMSG->msgPhoneNo = "Number Must be 11 digit long";
		   $errorMSG->success = false;
		   $errorMSG->fieldtype = "phoneNo";
		}else {
		    $phoneNo = prepareInput($_POST["phoneNo"]);
			$errorMSG->msgPhoneNo = "";
			$errorMSG->success = true;
			$errorMSG->fieldtype = "phoneNo";
		}
	}

	// validating email
	if(isset($_POST["email"])){
		if (empty($_POST["email"])) {
		    $errorMSG->msgEmail = "Email is required";
			$errorMSG->success = false;
			$errorMSG->fieldtype = "email";
		} 
		else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		    $errorMSG->msgEmail = "Invalid email address";
			$errorMSG->success = false;
			$errorMSG->fieldtype = "email";
		}else {
			$email = $_POST["email"];
			$sql = "SELECT * FROM users WHERE email= '$email'";
			$result = $connection->query($sql);
			 if ($result->num_rows == 1) {
				$errorMSG->success = false;
				$errorMSG->msgEmail = "Email Already exist. Try another or login.";
				$errorMSG->fieldtype = "email";
				$email = "";
			 }
			 else{
			 	$email = prepareInput($_POST["email"]);
				$errorMSG->success = true;
				$errorMSG->msgEmail = "";
				$errorMSG->fieldtype = "email";
			 }
		}
	}

	//validating postal code
	if(isset($_POST["postalCode"])){
		if (!empty($_POST["postalCode"])){
			 if (!ctype_digit ($_POST["postalCode"])){
				$errorMSG->msgPostalCode = "Invalid Post/ZIP Code, Please Enter digits only.";
			   $errorMSG->success = false;
			   $errorMSG->fieldtype = "postalCode";
			}else if(strlen($_POST["postalCode"])!=4){
				$errorMSG->msgPostalCode = "Postalcode must be 4 digit long";
			   	$errorMSG->success = false;
			   	$errorMSG->fieldtype = "postalCode";
			}else {
			    $postalCode = prepareInput($_POST["postalCode"]);
				$errorMSG->msgPostalCode = "";
				$errorMSG->success = true;
				$errorMSG->fieldtype = "postalCode";
			}
		}

	}

	//validating street address
	if(isset($_POST["streetAddress"])){
		if (empty($_POST["streetAddress"])){
			$errorMSG->msgStreetAddress = "Street Address Is essential.";
		   $errorMSG->success = false;
		   $errorMSG->fieldtype = "streetAddress";
		
		}
		else {
		    $streetAddress = prepareInput($_POST["streetAddress"]);
			$errorMSG->msgStreetAddress = "";
			$errorMSG->success = true;
			$errorMSG->fieldtype = "streetAddress";
		}

	}
	//validating city
	if(isset($_POST["city"])){
		if (!empty($_POST["city"])){
			if (!ctype_alpha(str_replace([' ','-','\''], '', $_POST["city"]))){
				$errorMSG->msgCity = "Only Characters are allowed.";
			   $errorMSG->success = false;
			   $errorMSG->fieldtype = "city";
			}else {
			    $city = prepareInput($_POST["city"]);
				$errorMSG->msgCity = "";
				$errorMSG->success = true;
				$errorMSG->fieldtype = "city";
			}
		}

	}
	//validating District
	if(isset($_POST["district"])){
		if (!empty($_POST["district"])){
			if (!ctype_alpha(str_replace([' ','-','\''], '', $_POST["district"]))){
				$errorMSG->msgDistrict = "Only Characters are allowed.";
			   $errorMSG->success = false;
			   $errorMSG->fieldtype = "district";
			}else {
			    $district = prepareInput($_POST["district"]);
				$errorMSG->msgDistrict = "";
				$errorMSG->success = true;
				$errorMSG->fieldtype = "district";
			}
		}

	}
	
	//validating District
	if(isset($_POST["password"])){
		if (empty($_POST["password"])){
			$errorMSG->msgPassword = "Password mustbe entered.";
		   $errorMSG->success = false;
		   $errorMSG->fieldtype = "password";
		}
		else if(strlen($_POST['password']) <8){
        	$errorMSG->msgPassword = "Password must be at least 8 characters long.";
        	$errorMSG->success = false;
		    $errorMSG->fieldtype = "password";


     	 }else{
	     	 	if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$_POST['password'])) {
			       $errorMSG->msgPassword = "Password Require at least one Upper case letter, one lower case letter, one digit and one special character.";
			       $errorMSG->success = false;
					   $errorMSG->fieldtype = "password";
	      		}
			else {
			    $password  = prepareInput($_POST["password"]);
				$errorMSG->msgPassword = "Fair Password";
				$errorMSG->success = true;
				$errorMSG->fieldtype = "password";
			}
     	 }
     	  
	}

	//validating District
	/*if(isset($_POST["cpassword"])){
		if ($_POST["cpassword"]!=$_POST["cpassword"]){
			$errorMSG->msgCPassword = "Password didn't match!".$_POST["cpassword"]."and".$password1;
			$errorMSG->success = false;
			$errorMSG->fieldtype = "cpassword";
		}else{
			$errorMSG->msgCPassword="";
			$errorMSG->success = true;
			$errorMSG->fieldtype = "cpassword";
		}
		
	}*/

	


if($errorMSG->success == true){
	
echo json_encode($errorMSG);

	exit;
}

echo json_encode($errorMSG);
$connection->close();


function prepareInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>