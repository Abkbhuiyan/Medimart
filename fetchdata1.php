<?php 

		include_once 'dbConnection.php';
					
		if (isset($_POST['m1'])) {
			if(!empty($_POST['m1'])){
			$m1 = $_POST['m1'];

			
			$query = "select classId from medicinegroup where groupId=$m1";
			
			
			$result = mysqli_query($connection,$query);
			$abc=mysqli_fetch_assoc($result);
			$gid= $abc['classId'];

			$query1 = "select groupId, groupName from medicinegroup where classId=$gid and groupId!=$m1";

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