 
<div class="container">

<div class="page-header">
    <h1>Available Medicine List <small>Choice your necessary medicine .</small></h1>
</div>
</div>
<!-- Product Slider - START -->


<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-9">
                
            </div>
            <div class="col-md-3">
                <!-- Controls -->
                <div class="controls pull-right hidden-xs">
                    <a class="left fa fa-chevron-left btn btn" href="#carousel-example2"
                        data-slide="prev"></a><a class="right fa fa-chevron-right btn" href="#carousel-example2"
                            data-slide="next"></a>
                </div>
            </div>
        </div>
        <div id="carousel-example2" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
					
					<?php 
                        $sql_query="    
									SELECT 
    @i:=@i+1 AS rank, 
    t.*
FROM 
    medicine AS t,
    (SELECT @i:=0) AS R where @i<4 order by medicineId DESC
";    
                        $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);
                      while($r=mysqli_fetch_array($sql_view)){
                     ?>
					 
                        <div class="col-sm-3">
                            <div class="col-item">
							<div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h4><a href="view_product_details.php?product_id=<?php echo $r2['medicineId']; ?>"><span style="color:black;"><?php echo $r['medicineName'];?></span></a></h4>

                                            <h5 class="price-text-color">Price: <?php echo $r['unitPrice'];?></h5>
                                        </div>
                                                                            </div>
                                </div>

                                <div class="photo">
								<span class="product-status  new-p">NEW</span>
                                    <img src="admin/medicinePhoto/<?php echo $r['medicinePhoto'];?>" class="img-responsive" alt="<?php echo $r['medicineName'];?>" />

                                </div>
									   <div class="info">
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                                            <!--<i class="fa fa-shopping-cart"></i>-->
											<!--<a class="hidden-sm" href="view_product_details.php?product_id=<?php echo $r['id']; ?>">View Details</a>-->
                        <a href="index.php?medicineId=<?php echo $r['medicineId'];?>&action=addtocart"  class="btn btn-default btn-warning btn-xs"><i class="fa fa-shopping-cart"></i> Add To Cart</a>

                                        </p>
                                        <p class="btn-details">
                                            <i class="fa fa-list"></i><a href="medicinedetails.php?medicineId=<?php echo $r['medicineId']; ?>" class="hidden-sm">More details</a>
                                        </p>
                                         <p class="btn-details">
                                            <i class="fa fa-list"></i><a href="medicinecompare.php?medicineId=<?php echo $r['medicineId'];?>&action=addtocart" class="hidden-sm">compare</a>
                                        </p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
						
					<?php } ?>					
						
						
                    </div>
                </div>
				
				
				
				
                <div class="item">
                    <div class="row">
					
					<?php 
                        $sql_query2="    
									SELECT 
    @i:=@i+1 AS rank, 
    t.*
FROM 
    medicine AS t,
    (SELECT @i:=0) AS R where @i<4 order by medicineId";    
                        $sql_view2= mysqli_query($connection ,$sql_query2);
                    //var_dump($sql_view);
                      while($r2=mysqli_fetch_array($sql_view2)){
                     ?>
					 
                        <div class="col-sm-3">
                            <div class="col-item">
							<div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h4><a href="medicinedetails.php?medicineId==<?php echo $r2['medicineId']; ?>"><span style="color:black"><?php echo $r2['medicineName'];?></span></a></h4>

                                            <h5 class="price-text-color">Price: <?php echo $r2['unitPrice'];?> TK</h5>
                                        </div>
                                                                            </div>
                                </div>

                                <div class="photo">
                                    <img src="admin/medicinePhoto/<?php echo $r2['medicinePhoto'];?>" class="img-responsive" alt="<?php echo $r2['medicineName'];?>" />

                                </div>
									   <div class="info">
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                        <a href="index.php?medicineId=<?php echo $r['medicineId'];?>&action=addtocart"  class="btn btn-default btn-warning btn-xs"><i class="fa fa-shopping-cart"></i> Add To Cart</a>

                                        </p>
                                        <p class="btn-details">
                                            <i class="fa fa-list"></i><a href="medicinedetails.php?medicineId=<?php echo $r2['medicineId']; ?>" class="hidden-sm">More details</a>
                                        </p>
                                        <p class="btn-details">
                                            <i class="fa fa-list"></i><a href="medicinecompare.php?medicineId=<?php echo $r2['medicineId']; ?>" class="hidden-sm">compare</a>
                                        </p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
						
					<?php } ?>					
						
						
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.col-item
{
    border: 2px solid #2323A1;
    border-radius: 5px;
    background: #FFF;
}
.col-item .photo img
{
    margin: 0 auto;
    width: 100%;
	max-height:160px;
}

.col-item .info
{
    padding: 10px;
    border-radius: 0 0 5px 5px;
    margin-top: 1px;
}
.col-item:hover .info {
    background-color: rgba(215, 215, 244, 0.5); 
}
.col-item .price
{
    /*width: 50%;*/
    float: left;
    margin-top: 5px;
}

.col-item .price h5
{
    line-height: 20px;
    margin: 0;
}

.price-text-color
{
    color: #00990E;
}

.col-item .info .rating
{
    color: #003399;
}

.col-item .rating
{
    /*width: 50%;*/
    float: left;
    font-size: 17px;
    text-align: right;
    line-height: 52px;
    margin-bottom: 10px;
    height: 52px;
}

.col-item .separator
{
    border-top: 1px solid #FFCCCC;
}

.clear-left
{
    clear: left;
}

.col-item .separator p
{
    line-height: 20px;
    margin-bottom: 0;
    margin-top: 10px;
    text-align: center;
}

.col-item .separator p i
{
    margin-right: 5px;
}
.col-item .btn-add
{
    width: 33%;
    float: left;
}

.col-item .btn-add
{
    border-right: 1px solid #CC9999;
}

.col-item .btn-details
{
    width: 33%;
    float: left;
    padding-left: 10px;
}
.controls
{
    margin-top: 20px;
}
[data-slide="prev"]
{
    margin-right: 10px;
}

.info:hover{background-color:#009933;}
.btn_add2{width:100%; height:40px; background-color:white; color:blue; font-family:"Times New Roman", Times, serif; font-size:20px; font-weight:bold;}
.btn_add2:hover{width:100%; height:40px; background-color:#0099FF; color:white;}

</style>
 