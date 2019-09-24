<?php
include 'db.php';
$key = $_GET['key1'];
$q = "select * from tbl_users where userid = '$key'";

$res = $conn->query($q);


// its counts the affected row in the above query
$count = $res->num_rows; 
if($count>0)
{
  echo "username already exists";
}

?>