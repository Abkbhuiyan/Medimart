<?php 
include_once 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 //$user_id = $_SESSION['id'];
 ?>


			<?php include_once('header.php');?>
            	<!-- end  header section -->        
            
            
			<div class="container">
				<div class="col-lg-12">
					 	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyD20fa8okNgStseZ2om1G0aaf7qzVmOvGQ&libraries=places"></script>

    <script type="text/javascript">
        var source, destination;
        var directionsDisplay;
        var directionsService = new google.maps.DirectionsService();
        google.maps.event.addDomListener(window, 'load', function () {
            new google.maps.places.SearchBox(document.getElementById('txtSource'));
            new google.maps.places.SearchBox(document.getElementById('txtDestination'));
            directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
        });

        function GetRoute() {
            var mumbai = new google.maps.LatLng(18.9750, 72.8258);
            var mapOptions = {
                zoom: 7,
                center: mumbai
            };
            map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('dvPanel'));

            //*********DIRECTIONS AND ROUTE**********************//
            source = document.getElementById("txtSource").value;
            destination = document.getElementById("txtDestination").value;

            var request = {
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
            };
            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });

            //*********DISTANCE AND DURATION**********************//
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [source],
                destinations: [destination],
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
            }, function (response, status) {
                if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                    var distance = response.rows[0].elements[0].distance.text;
                    var duration = response.rows[0].elements[0].duration.text;
                    var dvDistance = document.getElementById("dvDistance");
                    dvDistance.innerHTML = "";
                    dvDistance.innerHTML += "Distance: " + distance + "<br />";
                    dvDistance.innerHTML += "Duration:" + duration;

                } else {
                    alert("Unable to find the distance via road.");
                }
            });
        }
    </script>
	<!-- GeoLocation Find Using User Browser-->
	
	<!-- EnD GoLocation Kahini-->
	<?php
		$location1="";
$dest=$_REQUEST['address'];
//echo $dest; echo "adajdfsjkdf";
	?>
    <br /><br />
 <div class="seh_boxx">
	  
     <h3>Type Location Here</h3>
                             <form action="" method="">
									<div class="input-group ">
										 	<input    id="txtSource"   class="form-control se_height " title="Please Enter Location..."  type="text">
								 <input type="hidden" id="txtDestination" value="<?php echo $dest?>"  style="width: 200px" />
										<span class="input-group-btn">
											<input value="Get Route" onclick="GetRoute()" class="btn btn-defaultc btn_height"  type="button" />
										</span>
									</div>
									<!-- /input-group -->
								</form>
      
      
       
       </div>
    <br /><br />
    <div class="col-md-9">
    
    <div class="panel panel-default">
  <div class="panel-heading">
   <div id="dvDistance">
                </div>
  </div>
  <div class="panel-body">
  
   <div id="dvMap" style="width: 700px; height: 700px">
                </div>
    
  </div>
</div>
   </div>
    	<div class="col-lg-3  " >
			<?php include_once('storelocationsidebar.php');?>
            
             
               
             
             
			</div>
                
                <br /><br />
                
                <span class="clearfix"></span>
                
                
    <br />
				</div>
			</div>
	 
		
		    
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
	 
	</body>

</html>