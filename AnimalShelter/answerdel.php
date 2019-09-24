<?php
include "db.php";
$aid=$_GET['aid'];
$qry_del="delete from tbl_answer where aid='$aid'";
 if($conn->query($qry_del)==FALSE)
 {
 	die("Error:".$conn->error);
 }
 
 header('location:community.php?msg=answer deleted');


?>