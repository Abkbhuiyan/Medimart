<?php 
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 //$user_id = $_SESSION['id'];
 include("dbConnection.php");


 ?>


	<?php include_once('header.php');?>
	<!-- end  header section -->        
            
     
    <div class="container" >
    <div class="clearfix"></div>
    
      
   
         
<div class="col-lg-12 no_padding"  style="margin-top: 20px;">       
 
  <div class="col-lg-4">
     <div class="col-lg-4">
       efe
     </div>
     <div class="col-lg-4">
       ff
     </div>
  </div>
               
   <div class="col-lg-4">
     <div class="col-lg-4">
       ff
     </div>
     <div class="col-lg-4">
       ff
     </div>
  </div>
   <div class="col-lg-2">
     fff
  </div>


</div>
<br />

</div>
      <div class="panel-footer"> </div>
     
          
   
      
  <?php include_once('footer.php');?>  

        
<script>
$("#qty").val('1');

// Create a click handler for your increment button
$("#increaseButton").click(function () {
    var newValue = 1 + parseInt($("#qty").val());
    $("#qty").val(newValue);
});
// .. and your decrement button
$("#decreaseButton").click(function () {
    
    var newValue = parseInt($("#qty").val()) - 1;
    
    $("#qty").val(newValue);
    
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










