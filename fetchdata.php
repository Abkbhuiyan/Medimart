<?php 

		include_once 'dbConnection.php';
					
		if (isset($_POST['m1'])) {
			if(!empty($_POST['m1'])){
			$m1 = $_POST['m1'];

			
			$query = "select groupId from medicine where medicineId=$m1";
			
			
			$result = mysqli_query($connection,$query);
			$abc=mysqli_fetch_assoc($result);
			$gid= $abc['groupId'];

			$query1 = "select medicineId, medicineName from medicine where groupId=$gid and medicineId!=$m1";

			$result1 = mysqli_query($connection,$query1);
			$rowcount=mysqli_num_rows($result1);
			if($rowcount!=0){
			foreach($result1 as $row){
				$rows[] = $row;
			
			
		}
		$abc = json_encode($rows);
			print_r($abc);
		}else{
			$rows =  array("foo" => "false",);
			$abc = json_encode($rows);
			print_r($abc);

		}
		}else{
			$rows =  array("foo" => "false",);
			$abc = json_encode($rows);
			print_r($abc);
		}
	}
		

 ?>