<?php
session_start();
include 'db.php';
$userid= $_POST['userid'];
$password= $_POST['password'];

$query="SELECT * FROM tbl_users where userid='$userid' and password='$password' ";
$res= $conn->query($query);
$count= $res->num_rows;

if($count>0)
{
$data = $res->fetch_array();
$usertype =  $data['usertype']; 
$id=$data['id'];
$logindate= date('Y-m-d');
   
if($usertype=='admin')
   {
   $_SESSION['ticket'] = 'a';
   $_SESSION['id']=$id;
    $up = "update tbl_users set logindate='$logindate' where id='$id'";
    $conn-> query($up);
 
   header("location:admin.php");
   
   }
    else if($usertype=="Client")
	{
		
		
		$_SESSION['ticket'] = 'g';
	   $_SESSION['id']= $id;
	   
	     $query2 =  "SELECT DATEDIFF(NOW(), logindate) FROM tbl_users where id='$id'"  ;
	   $data = $conn->query($query2);
	  
	  while($result = $data->fetch_assoc())	  
		  $diff = $result['DATEDIFF(NOW(), logindate)'];
{		
		  
		  if ($diff > 720) {
	   
			$query2 =  " DELETE FROM tbl_users
WHERE id='$id' ";
			  if($conn->query($query2)==true){
			  echo('Your account has not been loggedin more than 12 months, Please create new account');
			  }
	
} else {
			 $query2 = "update tbl_users set logindate = '$logindate' where id='$id' ";
			  if($conn->query($query2)==true){
		
		 header("location:visit.php" );
	}
			  else {
		    echo" failed to open Client";
	   }				  
		  }
	   }
	   
	}


}	
else
{
    if(isset($_COOKIE['count']))
		{
		$count = $_COOKIE['count']+1;
		setcookie('count',$count,time()+300); 
		echo $_COOKIE['count'];
		

		}
		else
		{
		setcookie('count',1); 
		}
header("location:login.php");
}



