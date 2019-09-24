<?php
session_start();
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
 	    	echo "page vist" .$net
 	    	;
 	    }
 	}
 	    else{
 	    	echo "Page visit:1";
 	    
 		}

 		 
 		
 		?>
       </div>

	<p>Spencer Animal Shlelter</p>
	<ul>

		<li><a href="help.html">Help</a></li>
		<li><a href="community">Community</a></li>
		<li><a href="about.html">About</a></li>
		<li><a href="index.hmtl">Home</a></li>
	</ul>
  </div>


<div id="mainbody">
	<div id="left">
		<input type="text" name="userid" id="userid"><br>
		<a href="client.php">View User</a><br>
		<a href="animal.php">Add Animals</a><br>
		<a href="editanimal.php">Edit Animals<a><br>
		<a href="gift.php">Add Gift</a><br>
		<a href="add.php">Add Accessior</a><br>
		<a href="donation.php">View Donations</a>
	</div>

		<div id="bibek">

<?php
include 'db.php';
$qry_display="select * from tbl_animals";
$data = $conn->query($qry_display);
echo "<table border='1' width='700' height='400'> <tr><th>ID</th><th>Animal Type</th><th>Name</th><th>Age</th><th>Gender</th><th>Height</th><th>Description</th><th>image</th><th>Update</th></tr>";
   
   while($result = $data->fetch_assoc())
   {
   	echo "<tr><td>" .$result['id']."</td>
   	      <td>" .$result['animaltype']."</td>
   	      <td>" .$result['name']."</td>
   	      <td>" .$result['age']."</td>
   	      <td>" .$result['gender']."</td>
   	      <td>" .$result['height']."</td>
   	      <td>" .$result['description']."</td>
   	      <td> <img src='animalimage/".$result['image']."'height='50' width='80'></td>
   	      <td> <a href='id.php?id=".$result['id']."'>Edit</a></td>
   	      </tr>";
   }
   echo "<table>";

?>

</bibek>

	</div>
	 
	</div>

	<footer></footer>	
		
 
	
</body>
</html>





