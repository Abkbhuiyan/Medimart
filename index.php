<?php 
include_once 'dbConnection.php';

if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 //$user_id = $_SESSION['id'];
 
        include_once('cart.php');
 
 ?>





			<?php include_once('header.php');

			
			?>

            	<!-- end  header section -->        
             <div class="container"  >
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
									<div id="display">
										<!--data result display here-->
										</div>
								</form>
      
      </div>
       <div class="col-md-4">
       <h3>Upload Prescription ......</h3>
       <a href="prescrioption_attach.php" class="btn btn-default btn-cusmd ">Upload Now</a>
       </div>
       </div>
       </div>
       
       </div>
            
			<div class="container">
				<div class="col-lg-12">
					<div id="myCarousel" class="carousel slide">
						<div class="carousel-inner">
							<article class="item active">
								<img src="img/online-shopping-banner.jpg" class="animated rotateInDownRight delay-8" style="width: 100%; height:300px;" alt="" />
									 
							</article>
							
							<article class="item">
								<img src="img/online-shopping-banner2.jpg" class="animated rotateIn delay-8" style="width: 100%; height:300px;" alt="" />
							 
							</article>
							 <article class="item">
								<img src="img/online-shopping-banner3.jpg" class="animated rotateIn delay-8" style="width: 100%; height:300px;" alt="" />

							</article>
							<article class="item">
								<img src="img/online-shopping-banner4.jpg" class="animated rotateIn delay-8" style="width: 100%; height:300px;" alt="" />

							</article>
							<article class="item active">
								<img src="img/online-shopping-banner1.jpg" class="animated rotateInDownRight delay-8" style="width: 100%; height:300px;" alt="" />
									 
							</article>
						</div>
						<!-- Controls -->
						<div class="carousel-controls">
							<a class="carousel-control left" href="#myCarousel" data-slide="prev" style="background: none; background-image: none;">
							<span class="fa fa-angle-double-left"></span>
							</a>
							<a class="carousel-control right" href="#myCarousel" data-slide="next" style="background: none; background-image: none;">
							<span class="fa fa-angle-double-right"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		<?php include_once('categorySlide.php');?>
		<?php include_once('productSlider.php');?>

		
		  <div class="container">
			  
 		 <br /><br /><br />
			<?php include_once('footer.php');?>
			
		</div>
	
		<script>
			
			
 
$(document).ready(function ()
{
    $('.carousel').carousel({interval:5000,pause:false});
});
var $ = jQuery.noConflict();
$(document).ready(function() { 
  $('#myCarousel').carousel({ interval: 3000, cycle: true });
}); 

 
 

		
		</script>
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
				<!--Start of Tawk.to Script-->

	</body>

</html>