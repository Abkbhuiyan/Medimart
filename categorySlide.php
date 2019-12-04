<div class="container">
    <div class="col-md-12"  >
        <div  class="tp_sli" >
            <div class="col-md-9">
                <h3>
                    Shop By Medicine Category</h3>
            </div>
            <div class="col-md-3">
                <!-- Controls -->
                <div class="controls pull-right hidden-xs">
                    <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example"
                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example"
                            data-slide="next"></a>
                </div>
            </div>
        </div>
        <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
                    
                    <?php
                      $sql_query1="SELECT * FROM `medicinecategory` LIMIT 4";
                    
                    // echo $sql_query;
                    $sql_view1= mysqli_query($connection ,$sql_query1);
                    //var_dump($sql_view);
                     while($rowshow=mysqli_fetch_array($sql_view1)){
                    ?>
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                   <a href="categoryWiseMedicine.php?cat_id=<?php echo $rowshow['categoryId']; ?>"> <img src="admin/categoryPhoto/<?php echo $rowshow['categoryPhoto']; ?>" class="img-responsive" alt="a" /></a>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                <?php echo $rowshow['categoryName']; ?></h5>
                                             
                                        </div>
                                         
                                    </div>
                                   
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                         <?php } ?>  
                           
                         
                         
                    </div>
                </div>
                <div class="item  ">
                    <div class="row">
                    
                    <?php
                      $sql_query1="SELECT * FROM `medicinecategory` LIMIT 5 OFFSET 5";
                    
                    // echo $sql_query;
                    $sql_view1= mysqli_query($connection ,$sql_query1);
                    //var_dump($sql_view);
                     while($rowshow=mysqli_fetch_array($sql_view1)){
                    ?>
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                      <a href="categoryWiseMedicine.php?cat_id=<?php echo $rowshow['categoryId']; ?>"> <img src="admin/categoryPhoto/<?php echo $rowshow['categoryPhoto']; ?>" class="img-responsive" alt="a" /></a>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                <?php echo $rowshow['categoryName']; ?></h5>
                                             
                                        </div>
                                         
                                    </div>
                                   
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                         <?php } ?>  
                           
                         
                         
                    </div>
                </div>
                <div class="item  ">
                    <div class="row">
                    
                    <?php
                      $sql_query1="SELECT * FROM `medicinecategory` LIMIT 5 OFFSET 10";
                    
                    // echo $sql_query;
                    $sql_view1= mysqli_query($connection ,$sql_query1);
                    //var_dump($sql_view);
                     while($rowshow=mysqli_fetch_array($sql_view1)){
                    ?>
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                        <a href="categoryWiseMedicine.php?cat_id=<?php echo $rowshow['categoryId']; ?>"> <img src="admin/categoryPhoto/<?php echo $rowshow['categoryPhoto']; ?>" class="img-responsive" alt="a" /></a>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                <?php echo $rowshow['categoryName']; ?></h5>
                                             
                                        </div>
                                         
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
@import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
.col-item
{
    border: 1px solid #E1E1E1;
    border-radius: 5px;
    background: #FFF;
}
.col-item .photo img
{
    margin: 0 auto;
    width: 100%;
}

.col-item .info
{
    padding: 10px;
    border-radius: 0 0 5px 5px;
    margin-top: 1px;
}

.col-item:hover .info {
    background-color: #F5F5DC;
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
    color: #219FD1;
}

.col-item .info .rating
{
    color: #777;
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
    border-top: 1px solid #E1E1E1;
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
    width: 50%;
    float: left;
}

.col-item .btn-add
{
    border-right: 1px solid #E1E1E1;
}

.col-item .btn-details
{
    width: 50%;
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
.tp_sli{
      display: block;
    overflow: hidden;
}
</style> 