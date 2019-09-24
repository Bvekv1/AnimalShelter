<?php
session_start();
include 'db.php';
 $uid=$_GET['uid'];
 $id2=$_SESSION['id'];
$qry_sel = "SELECT * FROM tbl_animals where id = '$uid' ";
$data = $conn->query($qry_sel);
if($result = $data->fetch_assoc()) {

$id = $result['id'];
$animaltype = $result['animaltype'];
	$name = $result['name'];
	$age = $result['age'];
	$gender = $result['gender'];
	$height = $result['height'];
	$desc = $result['description'];
	$image = $result['image'];
	
	
	
	
	
$sql="Insert  into tbl_cart values ('','$id','$id2','$animaltype','$name','$age','$gender','$height','$desc','$image')";
	if($conn->query($sql)==TRUE){
		
	$qry_del="delete from tbl_animals where id ='$uid'";
		if($conn->query($qry_del)==TRUE){
		
		echo "Animal has been added to cart";
		 header("location:visit.php");
		}
		else {
			echo "failed to add animal to cart";
		}
	
}



}


?>