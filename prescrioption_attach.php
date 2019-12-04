<?php
   
    if(session_id() == '' || !isset($_SESSION))
    {session_start();} 
    error_reporting(0);
   // $u_id=$_SESSION['id'];
    
    $message ="";
//var_dump($_REQUEST);
//$u_id=$_SESSION['id'] ;

?>





    
    <?php include_once('header.php');?>
     
    <div class="container" >
       
    <div class="clearfix"></div>
    
      
    
	 <div class="col-lg-12 lg-rg"  style="margin-top: 20px;">
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 no_padding  " style="margin-bottom: 30px;"  >
        <div class="col-lg-12 no_padding lg-rg-border">
         
   
     
 <?php echo $_SESSION['massagedd'];  unset($_SESSION['massagedd']); ?>
 
<div class="alert alert-success" role="alert">
 <i class="fa fa-info-circle"></i>
 
</div>
          <div class="main">
                 
                    <div class="log-in">
                    <div class="pull-left all-p-tag "> <b class="t-clr">Attach Prescription </b>  </div>
                          
                    </div>
                 
                 
                 
            </div>
                                     
          
<div class="col-lg-6 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12"> 
                                                 <form  action="uploadprescription.php" method="post"  class="form-vertical" enctype="multipart/form-data" >
                                                 
                                                
                                                         
                                                <div class="control-group ">                                                  
                                                    <div class="controls">
                                                        <div class="input-prepend">
                                                            <input type="text" class="inp-height col-lg-12  col-xs-12 col-md-12 col-sm-12" 
                                                              value=""  name="username" placeholder="Enter Your Name" required/>
                                                            <span class="help-block pull-left txt-left">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                 <span class="clearfix"></span>
                                                 <div>&nbsp;</div>
                       <div class="control-group ">                                               
                                                    <div class="controls">
                                                        <div class="input-prepend">
                                                            <input min="0"  type="number" class="inp-height col-lg-12  col-xs-12 col-md-12 col-sm-12" 
                                                              value="" placeholder="Enter Your Phone Number"  maxlength="11"  name="phoneNo" id="phoneNo" required/>
                                                            <span class="help-block pull-left txt-left">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                 <span class="clearfix"></span>
                                                 <div>&nbsp;</div>

                        <div class="control-group ">                          
                          <div class="controls">
                            <div class="input-prepend">
                              <input min="0"  type="email" class="inp-height col-lg-12  col-xs-12 col-md-12 col-sm-12" 
                                                              value="" placeholder="Enter Your Email"  maxlength="100"  name="email" id="email" required/>
                              <span class="help-block pull-left txt-left">
                              </span>
                            </div>
                          </div>
                        </div>
                                                
                                                 <span class="clearfix"></span>
                                                 <div>&nbsp;</div>

                        <div class="control-group ">                          
                          <div class="controls">
                            <div class="input-prepend">
                              <input min="0"  type="text" class="inp-height col-lg-12  col-xs-12 col-md-12 col-sm-12" 
                                                              value="" placeholder="Enter Your Address"  maxlength="256"  name="address" id="address" required/>
                              <span class="help-block pull-left txt-left">
                              </span>
                            </div>
                          </div>
                        </div>
                                                
                                                 <span class="clearfix"></span>
                                                 <div>&nbsp;</div>
                                                 <?php
                                                 
                                                $date = date('Y-m-d h:i:s');
                                                 
                                                  ?>
                                                    
                                                    <input type="hidden" name="date" value="<?php echo  $date; ?>" />
                                                 
                                                 
                                                 
                                             <div class="control-group ">
                                                 
                                                    <div class="controls">
                                                        <div class="input-prepend">
                                                            <input   type="file" class="inp-height col-lg-12  col-xs-12 col-md-12 col-sm-12" 
                                                              value="" placeholder="Enter Your Address"  maxlength="256"  name="prescription" id="prescription" required/>
                                                            <span class="help-block pull-left txt-left">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <span class="clearfix"></span>
                                                 <div>&nbsp;</div>
                                                 
                                                 
                                                
                                                <div class="form-actions"> 
                                                 <input type="submit" class="btn btn-warning btn-sm" name="insert_pres" value="Upload Prescription">   
                                                    
                                                </div>
                                            </form>
                                             
        </div>
    
        
        
        </div>
        
         
   
        <style>
       .lg-rg{min-height: 350px;}
       .lg-rg-border{border: 1px solid #eee;border-top: none;overflow: hidden;padding-bottom: 30px;}
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
 
</div><!--container-->
</div>
 
        <!--for  list grid-->
        <script src="js/modernizr.custom.js"></script>
        <script src="js/classie.js"></script>
        <script src="js/cbpViewModeSwitch.js"></script>
        
 

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
