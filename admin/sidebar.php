<?php// if($_SESSION['user_cat_id']==1){?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
       
      <!-- search form -->
       
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"></li>
        <?php if ($_SESSION['userType']==0) { ?>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="register.php"><i class="fa fa-circle-o"></i> New Admin</a></li>          
            <li class=""><a href="alluserlist.php"><i class="fa fa-circle-o"></i> Admin List</a></li>
            <!--<li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>-->
          </ul>
        </li><?php } ?>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Medicine Category</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addMedicineCategory.php"><i class="fa fa-circle-o"></i> New Category</a></li>              
             <li><a href="allMedicineCategory.php"><i class="fa fa-circle-o"></i> Show Categoris</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="addMedicineCLass.php">
            <i class="fa fa-files-o"></i>
            <span>Medicine Class</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addMedicineCLass.php"><i class="fa fa-circle-o"></i> New Class</a></li>              
             <li><a href="allMedicineClass.php"><i class="fa fa-circle-o"></i> Show Classes</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Medicine Group</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addMedicineGroup.php"><i class="fa fa-circle-o"></i> New Group</a></li>              
             <li><a href="allMedicineGroup.php"><i class="fa fa-circle-o"></i> Show Groups</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Medicines</span>
            <span class="pull-right-container"></span>            
            
          </a>
          <ul class="treeview-menu">
            <li><a href="lowStock.php"><i class="fa fa-circle-o"></i> Medicine Out of Stock</a></li>
            <li><a href="addBrandedMedicine.php"><i class="fa fa-circle-o"></i> Add Medicine</a></li>
            <li><a href="allMedicineList.php"><i class="fa fa-circle-o"></i> All Medicine List</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Orders</span>
            <span class="pull-right-container"></span>            
            
          </a>
          <ul class="treeview-menu">
            <?php if ($_SESSION['userType']==0) { ?>
            <li class=""><a href="orders.php"><i class="fa fa-circle-o"></i>All Orders</a></li>
            <?php } else{ ?>
            <li class=""><a href="pendingorder.php"><i class="fa fa-circle-o"></i>Pending Order List</a></li>
            <li class=""><a href="completedorder.php"><i class="fa fa-circle-o"></i>Approved Orders</a></li>
            <li class=""><a href="cancelledorder.php"><i class="fa fa-circle-o"></i>Cancelled Orders</a></li>
            <?php } ?>
          </ul>
        </li>

		     <?php if ($_SESSION['userType']==0) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Manage Store Points</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          <ul class="treeview-menu">            
             <li><a href="addStorePointLocation.php"><i class="fa fa-circle-o"></i> New Store Point</a></li>
             <li><a href="allStorePointLocationList.php"><i class="fa fa-circle-o"></i> All Store Points</a></li>
          </ul>
        </li> <?php } ?>
       

        
         <?php if ($_SESSION['userType']==1) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Prescription</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          <ul class="treeview-menu">             
             <li><a href="pendingPrescriptions.php"><i class="fa fa-circle-o"></i>Pending Prescription</a></li>
             <li><a href="completedPrescriptions.php"><i class="fa fa-circle-o"></i>Completed Prescription</a></li>
             <li><a href="canceledPrescriptions.php"><i class="fa fa-circle-o"></i>Cancelled Prescription</a></li>
          </ul>
        </li><?php } ?>
  
    </section>
    <!-- /.sidebar -->
  </aside>
  <?php //}elseif($_SESSION['user_cat_id']==2){ ?>
 

 