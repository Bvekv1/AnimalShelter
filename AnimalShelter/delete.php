<?php
include "db.php";
$id=$_GET['id'];
$qry_del="delete from tbl_animals where id='$id'";
 if($conn->query($qry_del)==FALSE)
 {
 	die("Error:".$conn->error);
 }
 
 header('location:animal.php?msg=animal removed');


?>