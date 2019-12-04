 <?php
  include_once 'dbConnection.php';
    if(session_id() == '' || !isset($_SESSION))
    {session_start();} 
    error_reporting(0);
 
?>

<div class="panel panel-default bdr-color">
			<div class="panel-heading">  <b>Store Points List</b>
			 
			</div>
			<div class="panel-body" style="overflow-y: hidden;" >
			<div class="row no_padding">
			<div class="col-xs-12 no_padding" >
			<ul class="demo1 pd_5" >
			<li class="news-item"  style="height:400px;">
			<table cellpadding="4" >
			 
                           <?php 
                                                 
                                                $sql="SELECT * FROM `storelocation` LIMIT 5";
                                                //echo $sql;
                                                $qeury_result = mysqli_query($connection ,$sql);
                                                while($rows=mysqli_fetch_array($qeury_result)){
                                                
                                            ?>      

            <tr style="margin-bottom: 10px;display: inline-block;">
			<td ><h3><?php echo $rows['branchName']; ?></h3><small><?php echo $rows['location']; ?></small></td>
			<td><form action="storedirection.php?dest=<?php echo $rows['location']; ?>" method="get">
			<input type="hidden" name="address" value="<?php echo $rows['location']; ?>"/>
			<input type="submit" class="btn btn-success btn-review" value="View Direction" />
			</form>
			</td>
            
			</tr>
           
            <?php }?>
			</table>
            
			</li><!--news-item-->
			</div>
			</div>
			</div><!--panel-body-->
		  <div class="panel-footer"> </div>
			</div>