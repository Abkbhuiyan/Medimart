<?php 
include_once 'db_connection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 //$user_id = $_SESSION['id'];
 ?>





<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="description" content=""/>
		<meta name="author" content=""/>
		<title>
			E-commerce
		</title>
		<link href="css/bootstrap.css" rel="stylesheet"/>
		<link href="css/style.css" rel="stylesheet"/>
		<link href="css/animate.css" rel="stylesheet" />
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
		<link href='http://fonts.googleapis.com/css?family=Rajdhani:500' rel='stylesheet' type='text/css'/>
		<link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'/>
		<link href="application-624f0e68060d7dfbf4bd28e574166257.css" rel="stylesheet" type="text/css"/>
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
			</script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js">
			</script>
		<![endif]-->
	</head>
	<body>
		<div id="wrapper">
			<?php include_once('header.php');?>
            	<!-- end  header section -->        
            
            
			<div class="container">
			<div class="col-sm-12">
			<div class="no-result hidden">Sorry, NO Results Found</div>
			<div class="listview">
			<div class="doc-card row">
		<div class="col-sm-6">
			<div class="row">
        		<div class="col-xs-4 col-sm-3 text-center height0">
					<a href="/doctor/dr-gaurav-4ba16a217d" class="track-click" ,="" data-ga-category="Doctors List Page" data-ga-action="Doctor Detail Page Clicked" data-ga-label="Dr. Gaurav Gyan dr-gaurav-4ba16a217d">
					<img alt="Dr. Gaurav Gyan" class="img-circle smalldocpic" src="https://croc-production.s3.amazonaws.com/uploads/doctor_attachment/profile_image/26576/thumb_gaurav.JPG"></a>
				</div>
				<div class="col-xs-8 col-sm-9 paddingleftnone">
					<p class="doc-name">
						<a href="/doctor/dr-gaurav-4ba16a217d" class="track-click" ,="" data-ga-category="Doctors List Page" data-ga-action="Doctor Detail Page Clicked" data-ga-label="Dr. Gaurav Gyan dr-gaurav-4ba16a217d">	Dr. Gaurav Gyan </a>
						
            		</p>
						<p class="scorestar">
							<span class="icon icon-rating5"></span> 5.0/5&nbsp;
								<span style="color: #4d4d4d; text-decoration: none">(7  Ratings)</span>
						</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-9 col-sm-push-3 paddingleftnone">
					<div class="doc-specialities"> <span class="icon icon-stethoscope"></span><p>Specializes in Dental Surgery</p></div>
						<div class="doc-qualification"> <span class="icon icon-gradcap"></span><p>BDS</p></div>
							<div class="doc-fee"> <span class="icon icon-rupee"></span><p>Rs 100 Consultation fees</p></div>
		             <div class="doc-address"> 
		               <span class=" icon icon-hospital"></span><p>Gyan Dental Clinic,</p>
		                <div style="padding-left:32px;font-weight:300;">Pandav Nagar, New Delhi</div>
		             </div>
				</div>
			</div>

		</div>

		<div class="col-sm-6"> 
				<div class="rating-cont text-center hidden-xs">
			 		<div class="rating-box">
			 			<div class="icon-rating cleanliness"></div>
			 			<div data-rating="4.9"> 4.9</div>
			 			<span class="rating-name">Clinic Cleanliness</span>
			 		</div>
			 		<div class="rating-box">
			 			<div class="icon-rating politeness"></div>
			 			<div data-rating="4.7">4.7</div>
			 			<span class="rating-name">Doctor Politeness</span>
			 		</div>
			 		<div class="rating-box">
			 			<div class="icon-rating staff"></div>
			 			<div data-rating="4.6">4.6</div>
			 			<span class="rating-name">Courteous Staff</span>
			 		</div>
			 		<div class="rating-box">
			 			<div class="icon-rating diagnosis"></div>
			 			<div data-rating="5.0">5.0</div>
			 			<span class="rating-name">Accurate Diagnosis</span>
			 		</div>
			 		<div class="rating-box">
			 			<div class="icon-rating exptime "></div>
			 			<div data-rating="4.4">4.4</div>
			 			<span class="rating-name">Explanation Time</span>
			 		</div>
				</div>
	        <div class="row">
	            <div class="col-sm-10 col-sm-offset-1">
	            	<div class="row">

		            	<div class="track-click col-xs-6 text-center lpadding-xs-10" data-ga-category="Doctors List Page" ,="" data-ga-action="Be The First to Review Clicked" data-ga-label="Dr. Gaurav Gyan dr-gaurav-4ba16a217d"><a class="btn btn-success btn-review" href="/reviewdoctor/dr-gaurav-4ba16a217d">Write Review</a></div>
	        		</div>
	        	</div>
	        </div>
		</div>
	</div>
			
			</div>
			
			</div>



			</div>

			<?php include_once('footer.php');?>
			<div class="row"> <p class="copy">All Right Reserved <b>emedicinebd</p> </div>
			</div><!--container-->
		</div>
		<!--type head js-->
		<script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript">
		</script>
		<script src="js/jquery.bootstrap.newsbox.js" type="text/javascript">
		</script>
		<script src="js/bootstrap-typeahead.js" type="text/javascript">
		</script>
		<script src="js/demo.js" type="text/javascript">
		</script>
		<!--type head js-->
		<script src="js/bootstrap.min.js">
		</script>
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
	</body>

</html>