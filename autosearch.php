
<?php
include_once 'dbConnection.php';
if($_POST)
{
$q=mysqli_real_escape_string($connection,$_POST['searchword']);
//Old query
//$sql_rees=mysql_query("select * from test_user_data where fname like '%$q%' or lname like '%$q%' order by uid LIMIT 5");
//New query updated 04-02-2014

$sql_res=mysqli_query($connection,

	"select 
	 medicine.medicineId,
	medicine.medicineName,
	medicine.medicinePhoto,
	medicine.unitPrice,
	medicine.manufacturar,
	medicinecategory.categoryName 
	from medicine,medicinecategory
	where medicine.categoryId = medicinecategory.categoryId
       and (medicine.medicineName like '%$q%' 
       or medicine.manufacturar like '%$q%' 
       or medicinecategory.categoryName like '%$q%') 
	order by medicine.medicineId"

);
if (!$sql_res) {
	print mysqli_error($connection);
}
while($row=mysqli_fetch_array($sql_res,MYSQLI_ASSOC))
{
$medicineName=$row['medicineName'];
$catname=$row['categoryName'];
$manufacturar=$row['manufacturar'];
$img=$row['medicinePhoto'];
$product_price='<b>'.$row['unitPrice'].'</b>';
//$country=$row['country'];
$re_productname='<b>'.$q.'</b>';
$re_manufacturarname='<b>'.$q.'</b>';
$re_catname='<b>'.$q.'</b>';

$final_productname = str_ireplace($q, $re_productname, $medicineName);
$final_catname = str_ireplace($q, $re_catname, $catname);
$final_manufacturarname = str_ireplace($q, $re_manufacturarname, $manufacturar);
?>
		<div class="display_box" align="left">
		<a href="search.php?pname=<?php echo $row['medicineName'];  ?>">
		
		<img style="width:50px; height:50px; border-radius:3px;" src="admin/medicinePhoto/<?php echo $img; ?>" />
		 <?php echo "Medicine : <b>".$final_productname."</b>."; ?><br>
		 <?php echo "Category : <b>".$final_catname."</b>."; ?><br>
		<?php echo "manufacturar : <b>".$final_manufacturarname."</b>."; ?><br>
		<?php echo "Price : <b>".$product_price."</b>."; ?><br/>
		</a>
		</div>
<?php
}
}
else
{}
?>
