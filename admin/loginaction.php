<?php 
  include_once '..\dbConnection.php';
 if(session_id() == '' || !isset($_SESSION))
  {session_start();}
 
 $message ="";
 extract($_REQUEST);
 if(isset($_POST['signIn'])){ 
    if(strlen($email)>=5 && strpos($email,'@')>0 && strlen($password)>=6  ){
        $sql="SELECT * FROM users WHERE email='$email' AND password='$password' AND(userType=0 or userType=1) LIMIT 1";
        $result=mysqli_query($connection ,$sql);
        if(mysqli_num_rows($result) == 1){
              $data = mysqli_fetch_assoc($result);
              $_SESSION['email'] = $email;
              $id=$data['userId'];
              $_SESSION['userType']=$data['userType'];
              $_SESSION['id'] = $id;
              
              if($_SESSION['loggedIn']= true){
                 $_SESSION['msg']='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  Successfully Log In.
    </div>';
              header('location:index.php');
              }
              
        }else{
            $_SESSION['msg']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    Email or Password  is  wrong.Please try again....
    </div>';
        header('location:login.php');
            
        }
        
    }
     else{
        $_SESSION['msg']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    Email or Password  is  wrong.Please try again....
    </div>';
        header('location:login.php');
        } 
}
?>
