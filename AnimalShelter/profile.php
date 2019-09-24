<?php
session_start();
include('db.php');
if(!isset($_SESSION['ticket']) && $_SESSION['ticket']!='a')
{
 header("location:index.php");

}

?>

<?php
include 'db.php';

 $n ="";
 $p = "";
 $dob = "";
 $e = "";
 $u = "";
 $p = "";
 $g = "";


if(isset($_GET['msg']))
{
  echo $_GET['msg'];
}

if(isset($_GET['id']))
{
$id = $_GET['id'];
$qry_row = "SELECT * FROM tbl_users WHERE id ='$id'";
$data_row = $conn->query($qry_row);
$result_row = $data_row->fetch_assoc();

$n = $result_row['name'];
$a = $result_row['address'];
$p = $result_row['postal'];
$dob = $result_row['dob'];
$e = $result_row['email'];
$u = $result_row['userid'];
$p = $result_row['password'];
$g = $result_row['gender'];


}

?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Spencer Client</title>

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
	<div id="userid">

	</div>
	<p>Spencer Animal Shelter</p>
      <p id="name"><?php 
		$id=$_SESSION['id'];
		$sel="SELECT * FROM tbl_users WHERE id = '$id'";
		$res = $conn->query($sel);
		while($data=$res->fetch_array())
			{
				echo $data['name'];
			}
			?></p>
	<ul>

		<li><a href="logout.php">logout</a></li>
		<li><a href="cart.php">Cart</a></li>
    <li><a href="community.php">Community</a></li>
		<li><a href="visit.php">Main</a></li>
		
		<li><a></a>
        </li>
	</ul>
  </div>


<div id="mainbody">
  <?php
  include 'db.php';
   $name = "";
   $postal ="";


   $qry_profile="select * from tbl_users where id='$id'";
   $data = $conn->query($qry_profile);
   while($result= $data->fetch_assoc()){
   echo "<table border='' width='700' border-collapse='collapse'>
   	<tr></tr>
   	<th colspan='2'>Your profile details you can edit them if needed</th>
   <tr>
   <th>Name</th>
   <td>".$result['name']."</td>
   </tr>
   <tr> 
   <th>Address</th>
   <td>".$result['address']."</td>
   </tr>
   <tr> 
   <th>Postal Address</th>
   <td>".$result['postal']."</td>
   </tr>
    <tr>
   <th>Date of Birth</th>
   <td>".$result['dob']."</td>
   </tr>
   <tr> 
   <th>Email</th>
   <td>".$result['email']."</td>
   </tr>
    <tr>
   <th>Userid</th>
   <td>".$result['userid']."</td>
   </tr>
   <tr> 
   <th>Password</th>
   <td>".$result['password']."</td>
   </tr>
      <tr> 
   <th>Gender</th>
   <td>".$result['gender']."</td>
   </tr>
   <tr>
   <th>Change</th>
   <td> <a href='profile.php?id=".$result['id']."'>Edit</a></td>


  </tr> ";
   
}
echo "</table>"

  ?>

  <div id="register_box">
             <form method="post" enctype="multipart/form-data">
              <label>Name</label>
    <input type="text" name="name" placeholder="your name" class="myspace" value="<?php echo $n; ?>" autofocus />
    <label>Address</label>
        <input type="text" name="address" placeholder="Address" value="<?php echo $a;?>" class="myspace" />
    <label>Postal Address</label>
        <input type="Postal" name="postal" placeholder="Postal Address" value="<?php echo $p;?>" class="myspace" />
        <label>Date of birth</label>
        <input type="Date" name="dob" placeholder="Date Of Birth" value="<?php echo $dob;?>" class="myspace" />
        <label>Email</label>
      <input type="Email" name="email" placeholder=" Email eg;bvekjas1@gmail.com" value="<?php echo $e; ?>" class="myspace" />
      <label>Userid</label>
        <input id = "txt" type="text" name="userid" placeholder="Userid eg;bvekjas1" value="<?php echo $u; ?>" class="myspace" onBlur="loadme()"/><span id = "mydiv" class = "warning"></span></br>        <label>Password</label>
      <input type="text" name="pass" placeholder="Password"  value="<?php echo $p;?>" class="myspace" />
      
        <div id="myspace">
        <input type="radio" name="gender" value="male" <?php if($g=="male"){ echo "checked";}?> />Male
        <input type="radio" name="gender" value="female" <?php if($g=="female"){ echo "checked";}?> / >Female
    </div>
        <input type="submit" name="update" onclick="myFunction()" value="Update" class="btn_register"/>
 </form>
 <?php
 include 'db.php';
 if(isset($_POST['update'])){
  $name = $_POST['name'];
  $postal = $_POST['postal'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $userid = $_POST['userid'];
  $password = $_POST['pass']; 
  $gender = $_POST['gender'];
  $id = $_GET['id'];


 $qry_update = "update tbl_users set name='$name', postal='$postal', dob='$dob', email='$email', userid='$userid', password='$password', gender='$gender' where id='$id'";

  if($conn->query($qry_update)==FALSE){
    die("Error:".$conn->error);
  }
  echo "Details updated";


 }


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


