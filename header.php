<?php include('cartfunction.php');


 ?>
 <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="description" content=""/>
		<meta name="author" content=""/>
		<title>
			OMMS-The Largest Online Medicine Site!
		</title>
		<link href="css/bootstrap.css" rel="stylesheet"/>
		<link href="css/style.css" rel="stylesheet"/>
		<link href="css/animate.css" rel="stylesheet" />
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
		<link href='http://fonts.googleapis.com/css?family=Rajdhani:500' rel='stylesheet' type='text/css'/>
		<link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'/>
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
			</script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js">
			</script>
		<![endif]-->
		
					<!--autosearch csss and js files link-->
		<link href="css/autosearch.css" rel="stylesheet"/>
		<script type="text/javascript" src="js/jqueryauto.js"></script>
		<script type="text/javascript" src="js/jquery.watermarkinput.js"></script>
		<script type="text/javascript" src="js/autosearch.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
	</head>

  <body>
<div id="wrapper">
	
<header>
         <div class="container-fluid border-tp">
					<div class="container">
						<div class="col-lg-12">
							<ul class="list-inline top-spcae">
								<li>
									<a href="#" data-placement="bottom" data-toggle="tooltip" class="tip-bottom t_color" data-original-title="We  provide  you  ecommerce  product  service">What We Do</a>
								</li>
								<li>
									<a href="#" data-placement="bottom" data-toggle="tooltip" class="tip-bottom t_color" data-original-title="We are  ready for  receive your  call">Contact 24 <i class="fa fa-times"></i> 7 Days</a>
								</li>
								<li>
									<a href="#" data-placement="bottom" data-toggle="tooltip" class="tip-bottom t_color" data-original-title="Have  you  any FAQ !! Please  write  us... ">FAQ'S</a>
								</li>
								 <?php
                                 
                                  if(!isset($_SESSION['id'])){
                                       
                                    ?>

                                    <li class="dropdown   pull-right">
									<a class="dropdown-toggle  t_color btn  btn-sm  brn-warning" aria-expanded="true" href="userregistration.php" data-toggle="">Registration <i class="fa fa-sign-in"> </i></a>
									 
								</li>
                               
                                <li class="dropdown   pull-right">
									<a class="dropdown-toggle  t_color btn  btn-sm  brn-warning" aria-expanded="true" href="login.php" data-toggle="">Login <i class="fa fa-sign-in"> </i></a>
									 
								</li>
                                    
                                      
                                <?php }
                                else {
                                ?>
                                <li class="dropdown   pull-right">
 
									<a class="dropdown-toggle  t_color btn  btn-sm  brn-warning" aria-expanded="true" href="logout.php" data-toggle="">Logout  </a>
									 
								</li>
								 <?php }?>
								 
							</ul>
						</div>
						<div class="col-lg-12 clearfix">
							<div class="col-lg-5 col-sm-4 col-md-4 col-xs-12 no-pd" style="overflow: hidden;">
								<a class="navbar-logo pull-left " href="index.php"><img src="img/logo.png" alt="Logo" style="width:320px; height:80px;" class="logo-responsive pull-left  animated slideInDown delay-10" /></a>
							</div>
							<!-- Search option here was --> 
							<!-- /.col-lg-6 -->
						</div>
					</div>
					<!--container-->
				</div>
		
			<div class="clearfix">
			</div>
			<!-- navbar -->
			<div class="navbar navbar-default container ">
				<div>
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar">
							</span>
							<span class="icon-bar">
							</span>
							<span class="icon-bar">
							</span>
						</button>
					</div>
					<div class="navbar-collapse collapse n_col">
						<ul class="nav navbar-nav">
						<?php
                              //if($_SESSION['id']>0 && $_SESSION['type']==1){
                            ?>
					
							<?php //} ?>
							<li >
								<a href="index.php">Home</a>
							</li>
                            <li>
								<a href="medicines.php">Medicines</a>
							</li>
							 
							 <li>
								<a href="medicinecategories.php">Categories</a>
								
							</li>
							<li>
								<a href="medicinegroups.php">Groups</a>
								
							</li>
                            
                                                         
                            <li>
                                <a href="storelocations.php">Store Points</a>
                            </li>
                                                   
                            
                            <!--<li><a href="#" data-toggle="dropdown" >Compare</a>
                            	<ul class="dropdown-menu megamenu row" >
                            		<li><a href="comparemedicines.php">Compare Medicine</a></li>
                            		<li><a href="comparemedicinegroups.php">Compare Groups</a></li>
                            	</ul>
                                
                            </li>-->
							
							 <li>
                                <a href="comparemedicines.php">Compare Medicine</a>
                            </li>
                            <li>
                                <a href="comparemedicinegroups.php">Compare Group</a>
                            </li>
							

                            
                       
                            
                             
                             
                             <?php
                             if(isset($_SESSION['login'])){
                            ?>
                               <li>
								<a href="myorders.php">My Orders </a>
							</li>
                             
                            <?php
                            
                           }         
                            ?>
                                                           
                            
						</ul>
						
						
						
						
						<div class="dropdown menu-large pull-right top_sp">
							<a href="#" class="dropdown-toggle cl_blue" data-toggle="dropdown" ><i class="fa fa-shopping-cart"></i> <span class="cart"> MY CART </span> <span class="badge alert-success"><?php echo get_cart_item_count(); ?></span></a>
							<ul class="dropdown-menu megamenu row">
								<li class="dropdown-header">
									My
									<b  >
										Cart
									</b>
								</li>
								<br />
								<li>
									<form>
								       <?php
                                         
									    if(isset($_SESSION['medicine'])){

									    foreach($_SESSION['medicine'] as $cart=>$value){

									   ?>
									
										<div class="col-sm-3 c-btm  alert-dismissible" role="alert" >
                                         <a href="#" class="rem-ove" data-dismiss="alert" aria-label="Close" aria-hidden="true"  title="Click here to  remove  product">  </a>
										
											<div class="cart-area">
												<div class="media">
													<span class="pull-left ">
														<img class="media-object img-thumbnail" src="admin/medicinePhoto/<?php echo $value['medicinePhoto'] ?>"   width= "50px" alt="" />
													</span>
													<div class="media-body">
														<h5 class="media-heading">
															<span>
																<?php echo $value['medicineName'] ?>
															</span>
														</h5>
														<p>
															Price
															<span class="  cost-color">
																<b><?php echo $value['unitPrice'] ?> Tk</b>
															</span>
										                    </br>
															QUANTITY:-
															<span class="  cost-color">
																<b><?php echo $value['quantity']  ?></b>
															</span>
														</p>
													</div>
												</div>
						
											</div>
										</div>

                                        <?php } } ?>
		                                
                                         <span class="clearfix"></span>
                                         <div class="col-sm-12">
                                     <?php if (get_cart_item_count() !=0 ) {?>    
                                   <a  href="checkout.php" class="btn btn-warning btn-sm pull-right"> Go To Checkout</a>
                                   <?php }else{?>
                                   <p>Your Cart Is Empty</p>
                                   <?php } ?>
                                   </div>
									</form>
                                   
								</li>
							</ul>
						</div>
						</div>
						
						
						
						
          <!--  <div class="container"  >
            <div class="col-md-12">
            
            <div   class="seh_boxx">
	  <div class="col-md-8" style="border-right: 3px solid #000; padding-bottom: 35px">
      <h3>Search from thousands of Medicine...</h3>
                             <form action="search.php" method="GET">
									<div class="input-group ">
										 	<input type="text" id="demo3"  name="pname" class="form-control se_height " title="Please Enter Product Name..." placeholder="Please Enter Product Name" required />
								
										<span class="input-group-btn">
											<input type="submit" class="btn btn-defaultc btn_height" value="Search" />
										</span>
									</div>
									<!-- /input-group -->
									<!-- /input-group -->
									<!--<div id="display">
										<!--data result display here-->
									<!--	</div>
								</form>
      
      </div>
       <div class="col-md-4">
       <h3>Upload Prescription ......</h3>
       <a href="prescrioption_attach.php" class="btn btn-default btn-cusmd ">Upload Now</a>
       </div>
       </div>
       </div>
       
       </div>-->
    	</header>