<?php 
  include_once 'db_connection.php';
 if(session_id() == '' || !isset($_SESSION))
  {session_start();}
 
 $message ="";
 extract($_REQUEST);
 if(isset($_POST['submit'])){
    if(strlen($email)>=5 && strpos($email,'@')>0 && strlen($password)>=6  )
    {
        $sql="SELECT * FROM `doctor` WHERE `email`='$email' AND `password`='$password' LIMIT 1";
        //echo $sql;
        
        $result=mysqli_query($connection ,$sql);
        if(mysqli_num_rows($result) == 1){
              $data = mysqli_fetch_assoc($result);
              $_SESSION['email'] = $email;
              $id=$data['id'];
                $type=$data['type'];
              $doctor_classify= $data['doctor_classify'];
              $_SESSION['id'] = $id; 
               $_SESSION['type'] = $type; 
              echo $_SESSION['doctor_classify']=$doctor_classify;
               exit();
              if($_SESSION['logged_in']= true){
                 $_SESSION['msg']='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  Successfully Log In.
    </div>';
              header('location: index.php');
			  exit();
              } 
              
        }
        }
        else{
        $_SESSION['dff']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    Email or Password  is  wrong.Please try again....
    </div>';
        header('location: login.php');
		exit();
        }
    
}

?>
