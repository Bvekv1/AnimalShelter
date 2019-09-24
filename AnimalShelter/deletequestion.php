<?php
include "db.php";
$qid=$_GET['qid'];
$qry_del="delete from tbl_questions where qid='$qid'";
 if($conn->query($qry_del)==FALSE)
 {
 	die("Error:".$conn->error);
 }
 
 header('location:community.php?msg=question deleted');


?>