<?php 

		include_once 'dbConnection.php';

		 if(session_id() == '' || !isset($_SESSION))
    {session_start();} 
    error_reporting(0);

    	//echo $m1 = $_POST['mname']; exit;
					
		if (isset($_POST['mname'])) {
			//if($_POST['quantity']!=0 && !empty($_POST['mname'])){
			 $m1 = $_POST['mname'];
			 $q = $_POST['quantity'];
			
			$query = "select stock from medicine where medicineName='$m1'";
			//echo $query; exit;
			$result = mysqli_query($connection,$query);
			$abc=mysqli_fetch_assoc($result);
			$quantity= $abc['stock'];

			
			if($q<=$quantity){
					if(isset($_SESSION['medicine'])){ 
						foreach($_SESSION['medicine'] as $key=>$value){ 
							if ($value['medicineName']==$m1) {
								$id=$value['medicineId']; 
								$_SESSION['medicine'][$id]['quantity']=$q;
								 include_once('cartfunction.php');
								 $t=get_cart_total();
								 $up = $value["unitPrice"];
								$rows =  array("medicineId" => $id,"quantity"=>$q,"total"=>$t,"unitPrice"=>$up,);
								$abc = json_encode($rows);
								print_r($abc);
							//	echo $_SESSION['medicine'][$id]['quantity']; exit;
							}
						}

					}
				
		}else{
			$rows =  array("foo" => "false",);
			$abc = json_encode($rows);
			print_r($abc);

		}
	}	

 ?>