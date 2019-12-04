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
				<div class="col-lg-10 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
				<?php 
					$sql_query="SELECT * FROM `storelocation`"; 
                     //echo $sql_query;
                    $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);
                    $storno = 1;

                      while($r=mysqli_fetch_assoc($sql_view)){
				 ?>
				
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
							<h1><?php echo $storno.".  ".$r['branchName']; ?></h1>
							<h3><?php echo "    ".$r['location']; ?></h3>
							<form action="storedirection.php?dest=<?php echo $r['location']; ?>" method="get">
							<input type="hidden" name="address" value="<?php echo $r['location']; ?>"/>
							<input type="submit" class="btn btn-success btn-review" value="View Direction" />
							</form>
						</div>
						<div class="col-lg-5  col-xs-12 col-md-6 col-sm-12">
							
						
						</div>
					</div>
				

				<?php $storno++;
			} ?>
				</div>
			</div>
		
		
		  <div class="container">
			  
 		 <br /><br /><br />
			<?php include_once('footer.php');?>
			
		</div>
	
		
		
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
.form-control {
    width: 100%;
    height: 50px;
    padding: 6px 12px;
    font-size: 16px;
    line-height: 1.42857143;
    color: #333;
    background-color: #fff;
    border: 1px solid #dcd9d3;
    background-image: none;
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0px 0px rgba(255, 255, 255, .075);
    box-shadow: inset 3px 3px 3px rgba(255, 255, 255, .075);
    margin-bottom: 15px;
}
.btn-default {
    color: #fff;
    background-color: #aa9658;
}
.control-label {
    color: #474747;
    font-weight: 700;
    font-size: 12px;
    text-transform: uppercase;
}




.inp-height:focus{box-shadow: none!important;border: 1px solid #f7931e;}
.cl-text a{color: #5cb85c;}
  .reg-mid{margin:100px auto;width: 100%;display: block;overflow: hidden; text-align: center;}
        </style>
				<!--Start of Tawk.to Script-->

		
	</body>

</html>