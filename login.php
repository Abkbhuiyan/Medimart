<?php
include_once 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
{session_start();} 
 error_reporting(0);
   $u_id=$_SESSION['id'] ;
   

 $message ="";
 extract($_REQUEST);
 if(isset($_POST['submit'])){
    if(strlen($email)>=5 && strpos($email,'@')>0 && strlen($password)>=6  )
    {
        $sql="SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password' AND `userType`=2 LIMIT 1";
        //echo $sql;
        
        $result=mysqli_query($connection ,$sql);
        if(mysqli_num_rows($result) == 1){
              $data = mysqli_fetch_assoc($result);
              $_SESSION['email'] = $email;
              $id=$data['userId'];
              $type=$data['userType'];
              $user_cat_id= $data['user_category'];
              $_SESSION['id'] = $id; 
              $_SESSION['userType'] = $type; 
                
              if($_SESSION['login']= true){
                 $_SESSION['msgsdd']='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  Successfully Log In.
    </div>';
              header('location: index.php');
			  exit();
              } 
               } else{
        $_SESSION['msgsdd']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    Email or Password  is  wrong.Please try again....
    </div>';
        header('location: login.php');
	 
        exit();
        }
       }
     
        else{
        $_SESSION['msgsdd']='<div class="alert alert-warning">
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

   


    
    <?php include_once('header.php');?>
     
    <div class="container" >
       
    <div class="clearfix"></div>
    
      
    
<div class="col-lg-12"  style="margin-top: 20px;">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no_padding" style="margin-bottom: 30px;"  >
        <div class="col-lg-12 no_padding">
         
          
          <div class="main">
				 
					<div class="log-in">
                    <div class="pull-left all-p-tag "><b class="t-clr">Log In</b> Here </div>
					
						  
					</div>
				  <?php if( $_SESSION['msgsdd']){
                  echo $_SESSION['msgsdd'];
                  unset($_SESSION['msgsdd']);
                  }
                   ?>
                 
				 
			</div>
          
<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12"> 
                                         <form   class="form-vertical" action="login.php" method="post">
												<div class="control-group ">
												 
													<div class="controls">
														<div class="input-prepend">
															<input id="" class="inp-height col-lg-12  col-xs-12 col-md-12 col-sm-12" type="email" placeholder="Enter your Email "   required="required" value="" name="email"/>
															<span class="help-block pull-left txt-left">
															</span>
														</div>
													</div>
												</div>
                                                <span class="clearfix"></span>
                                                 <div>&nbsp;</div>
												<div class="control-group">
												 
													<div class="controls">
														<input id="inputPassword" class="inp-height col-lg-12  col-xs-12 col-md-12 col-sm-12" name="password" type="password" required="required"  placeholder="Enter Your Password"/>
													</div>
												</div>
                                                <span class="clearfix"></span>
												 
                                                <span class="clearfix"></span>
                                                 <div>&nbsp;</div>
												<div class="form-actions">
													<button class="btn btn-warning btn-sm" type="submit" name="submit">
														&nbsp; LOG IN &nbsp;
													</button>
												</div>
											</form>
        </div>
    
        
        
        </div>
        
         
    </div><!--col-lg-9 product section-->
    

    
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding_right" >
         
         <div class="col-lg-12 no_padding lg-rg">
          
          
          <div class="main">
				 
					<div class="log-in">
                    <div class="pull-left all-p-tag ">Don't Have An Account?!  <b class="t-clr"> Register </b>Here</div>
						  
					</div>
				</div>
          
<div class="reg-mid">
         <a href="userregistration.php" class="btn btn-warning "><i class="fa fa-user-plus" ></i> Click Here To Get Registered</a>
	
</div>   
    
        
        </div>
              
            
             
    </div><!--filtering-->
    <span class="clearfix"></span>
    
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
.inp-height:focus{box-shadow: none!important;border: 1px solid #f7931e;}
.cl-text a{color: #5cb85c;}
  .reg-mid{margin:100px auto;width: 100%;display: block;overflow: hidden; text-align: center;}
        </style>
      
<?php include_once('footer.php');?>
 
    
      <script type="text/javascript">
    $(function () {
        $(".demo1").bootstrapNews({
            newsPerPage: 5,
            autoplay: true,
			pauseOnHover:true,
            direction: 'up',
            newsTickerInterval: 10000,//for time 
            onToDo: function () {
                //console.log(this);
            }
        });
		
 
    });
</script> 

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

    
    
    
  </body>
</html>
