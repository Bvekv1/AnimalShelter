<?php
session_start();
include('db.php');
if(!isset($_SESSION['ticket']) && $_SESSION['ticket']!='g')
{
 header("location:index.php");

}

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Spencer Admin</title>

	<style>
	.total{
		margin-left: 300px;
	
	}
</style>
</head>
<body>
 
 	<div id="nav">
 		<div id="visit">
 		<?php
 		include 'db.php';
 	
 		$qry_count="insert into tbl_counter value(1,1)";
         
 		if($conn->query($qry_count)==false){
 			$qry_count="select visit from tbl_counter where id='1'";
 			$data= $conn->query($qry_count);
 			 $result = $data ->fetch_assoc();
 			   $visit= $result['visit'];
 		      $_SESSION['views']= $visit+1;
 		       $net=$_SESSION['views'];

 	  $qry_add="update tbl_counter set visit='$net' where id='1'";
 	    if($conn->query($qry_add)==true){
 	    	echo "page vist:&nbsp" .$net
 	    	;
 	    }
 	}
 	    else{
 	    	echo "Page visit:1";
 	    
 		}

 		 
 		
 		?>
       </div>

	<p>Spencer Animal Shlelter</p>
	<p id="name"><?php 
		$id=$_SESSION['id'];
		$sel="SELECT * FROM tbl_users WHERE id = '$id'";
		$res = $conn->query($sel);
		while($data=$res->fetch_array())
			{
				echo $data['name'];
			}
			?></p>
	
  </div>


<div id="mainbody">
	<div id="left">
		
		<a href="client.
		php">View User</a><br>
		<a href="animal.php">Add Animals</a><br>
		<a href="don.php">Add Donations</a><br>
		<a href="logout.php">Logout</a>
	</div>
	<div id="bibek">

  <form method="post" id='donation'>
<label>Userid</label><br>
<input type="text" name="userid" placeholder="Userid" required=""/><br>
 <label>Amount</label><br>
<input type="text" name="amount" placeholder="22565" /><br>
 <input type="submit" value="Donate" id="submit" name="submit" class="button" />
    
              </form>

<?php

include 'db.php';
if (isset($_POST['submit'])) {
	$userid= $_POST['userid'];
	$amount= $_POST['amount'];

	$query_userid="select * from tbl_users where userid='$userid'";					  	
$res= $conn ->query($query_userid);
$count= $res->num_rows;

if($count>0) {						  						  
	$query_add="insert into tbl_donations values('','$userid','$amount')";
	if($conn->query($query_add)==true){
		echo "Donated Amount has been added";	
	}
	
}  
else {
	echo('No such user account');
	
} }
	?>

<?php
include 'db.php';
$qry_display="select * from tbl_donations";
$data = $conn->query($qry_display);
echo "<table border='1' width='300' height='auto' class='total'> <tr><th>Userid</th><th>Amount</th>";
while($result = $data->fetch_assoc())
{
	echo "<tr><td>" .$result['userid']."</td>
   	      <td>" .$result['amount']."</td>
   	      </tr>";
}
?>

<?php
 include 'db.php';
 $qry_sel= "select sum(amount) as value_sum from tbl_donations";
 $data= $conn->query($qry_sel);
  echo "<table border='1' width='300' class ='total' ><tr><th>Total amount</th> ";
  while($result = $data->fetch_assoc())
  	$sum= $result['value_sum'];
  {
  	echo "<tr><td>".$sum."</td>

  	</tr>";
  }
  echo "</table>";

?>





	</div>
	 
	</div>
	<footer>
		<div id ='fot'>
		 <div id='con'>
		 	<h6>Contact US</h6>
		 	<p>Spencer Animal Shelter<P>
		    <p>www.spenceranimalshelter.com</p>
		    <p>Query us at:9868768604</p>
		 </div>
		 <div id='us'>
		 	<P>About Us<p>
		 	 We the Spencer Animal shelter belive on caring for animal who are unable to speak out their thought</p>
		 </div>
		<div id = "icon">
		<h6>Social Media Links</h6>
		
		<li><a href="www.twitter.com"><img src="icon/twt.png"></a></li>
		<li><a href="www.facebook.com"><img src="icon/facebook.png"></a></li>
		<li><a href="www.instagram.com"><img src="icon/insta.png"></a></li>
		<li><a href="www.youtube.com"><img src="icon/youtube.png"></a></li>
  	      </div>
  	    </div>
                

  </footer>

			
		
 
	
</body>
</html>





