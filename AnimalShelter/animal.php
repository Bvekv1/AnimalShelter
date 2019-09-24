<?php
session_start();
if(!isset($_SESSION['ticket']) && $_SESSION['ticket']!='g')
{
 header("location:index.php");

}
?>







<?php
include 'db.php';
 $a = "";
 $n = "";
 $ag = "";
 $g = "";
 $h = "";
 $d = "";




if(isset($_GET['msg']))
{
	echo $_GET['msg'];

}
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$qry_row = "select * from tbl_animals where id='$id'";
	$data_row = $conn->query($qry_row);
	$result_row = $data_row->fetch_assoc();
$a = $result_row['animaltype'];
 $n = $result_row['name'];
 $ag = $result_row['age'];
 $g = $result_row['gender'];
 $h= $result_row['height'];
 $d = $result_row['description'];
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
 	    	echo "page visit:&nbsp" .$net
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
		<a href="client.php">View User</a><br>
		<a href="animal.php">Add Animals</a><br>
		<a href="don.php">Add Donations</a><br>
		<a href="logout.php">Logout</a><br>
	</div>

		<div id="bibek">
<form method="post" enctype="multipart/form-data">
		<label>Animal Type</label>
		<input type="text" name="animaltype" placeholder="Dog/cat" value="<?php echo $a; ?>" class="animal_form" autofocus />
		<label>Name</label>
		<input type="text" name="name" placeholder="jimmy" value="<?php echo $n; ?>" class="animal_form" autofocus />
		<label>AGE</label>
        <input type="text" name="age" value="<?php echo $ag; ?>" class="animal_form"  placeholder="1....2..3" />
       <label>Gender:</label><br>
<input type="radio" name="gender" value="Male" <?php if($g=="Male"){ echo "checked";}?> />Male
<input type="radio" name="gender" value="Female" <?php if($g=="Female"){ echo "checked";}?> />
Female<br>
        <label>Height</label>
        <input type="text" name="height" value="<?php echo $h; ?>" class="animal_form">
        <label>description</label>
        <input type="area" name="desc" value="<?php echo $d; ?>" class="animal_form" placeholder="bhevaiour,rescuse information">
        <label>Image</label>
        <input type="file" name="image">
        <input type="submit" name="add" value="Add" class="btn_add"/>
        <input type="submit" name='update' value="Update"/>
</form>
<div id="editanimal">
	<?php
include 'db.php';

if(isset($_POST['add']))
{
 $animaltype=$_POST['animaltype'];
 $name = $_POST['name'];
 $age = $_POST['age'];
 $gender = $_POST['gender'];
 $height = $_POST['height'];
 $description = $_POST['desc'];
 $image = $_FILES['image'] ['name'];
 $timage = $_FILES['image'] ['tmp_name'];


 $qry_add= "insert into tbl_animals values('','$animaltype','$name','$age','$gender','$height','$description','$image')";

 if($conn->query($qry_add)==FALSE)
 {
 	die("Error:".$conn->error);
 }
  move_uploaded_file($timage,"animalimage/".$image);

  echo "Animals added";   
}






 if(isset($_POST['update']))
 {
 $animaltype= $_POST['animaltype'];
 $name = $_POST['name'];
 $age = $_POST['age'];
 $gender = $_POST['gender'];
 $height = $_POST['height'];
 $description = $_POST['desc'];
 $id = $_GET['id'];



 $qry_up = "update tbl_animals set animaltype='$animaltype', name='$name',age='$age',gender='$gender',height='$height',description='$description' where id='$id'";
 if($conn->query($qry_up)==FALSE)
 {
 	die("Error:".$conn->error);
 }
 echo "Details updated"; 
}
$start=0;
$max=3;
$qry_display="select * from tbl_animals";
$data=$conn->query($qry_display);
$total=$data->num_rows;
$page=ceil($total/$max);
if(isset($_GET['bd'])){
	$start=($_GET['bd']-1)*$max;
}

$qry_display="select * from tbl_animals limit $start, $max";
$data = $conn->query($qry_display);
echo "<table id='fake' border='1' width='700' > <tr><th>ID</th><th>Animal Type</th><th>Name</th><th>Age</th><th>Gender</th><th>Height</th><th>Description</th><th>image</th><th>Update</th><th>Delete</th></tr>";
   
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
   	      <td> <a href='animal.php?id=".$result['id']."'>Edit</a></td>
   	      <td> <a href='delete.php?id=".$result['id']."'>Delete</a></td>
   	      <td></td>
   	      </tr>";
   }
   echo "</table>";


?>

	</div>
	<?php
   echo "<div id='animalpage'>";
   for($i=1;$i<=$page; $i++){
   	echo "<a href='animal.php?bd=".$i."'>$i</a>";
   }
   echo "</div>";


	?>

</div>

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


<?php


?>

