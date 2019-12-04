<?php
 include_once '..\dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
include_once 'head.php';
//include_once 'header.php';
include_once 'sidebar.php';
 ?>
 
<?php  
 $message ="";
 //var_dump($_REQUEST);
if(isset($_POST['register'])){
     extract($_REQUEST);
  $sql_query1="INSERT INTO `users`(`firstName`,`lastName`,`gender`,`email`,`phoneNo`,`streetAddress`,`city`,`district`,`postalCode`,`password`,`userType`)
          VALUES ('$firstName','$lastName','','$email',$phoneNo,'$address','','',00,'$password',$userType)";
         echo $sql_query1;
   $qeury_result = mysqli_query($connection ,$sql_query1);
   
    if($qeury_result ==1) {
    $_SESSION['massage']='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    New Admin Have benn created. You may  also  login Now...
    </div>';
    
      
    header("Location: index.php");

    } else{
      
    $message='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  an error .Please try again...'.mysqli_error($connection).'
    </div>'; }
}

?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Protal | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">

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
<div class="register-box">
  <div class="register-logo">
    <a href=""><b>Admin </b>Protal</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Add New System Administrators!</p>
    <?php echo $message;?>
    <form action="#" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="firstName" placeholder="First Name" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="lastName" placeholder="Last Name" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="someone@example.com" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" minlength="6"  required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="number" min="0" class="form-control" name="phoneNo" minlength="11" placeholder="phone" required="">
         
      </div>

    <div class="form-group has-feedback">
        <input type="text" class="form-control" name="address" placeholder="address" required="">
        
      </div>      
      <div class="form-group has-feedback">
         
        <select name="userType" class="form-control" required>
		 <option value="">Select User Role</option>
					  <option value="0">Super Administrator</option>
					  <option value="1">Local Administrator</option>
 		
        </select>
		
		
      </div>
      
      
      <div class="row">
        <div class="col-xs-8">
          
            <a href="index.php" name="register"class="btn btn-primary btn-block btn-flat"> Dashboard</a>

          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit"  name="register"class="btn btn-primary btn-block btn-flat">Register</button>
		  </a>
        </div>
        <!-- /.col -->
      </div>
    </form>

     

    
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
