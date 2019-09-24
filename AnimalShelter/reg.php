<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
	<script type="text/javascript">
function loadme()
{
	var txt11 =  document.getElementById('txt').value;
	var req;
	if(window.XMLHttpRequest)
	{
		req = new XMLHttpRequest();
		
	}
	else req = new ActiveXObject("Microsoft.XMLHTTP");
	req.onreadystatechange = function()
	{
		if(req.readyState==4)
		{
			document.getElementById('mydiv').innerHTML = req.responseText;
		}
	}
req.open("GET", "match.php?key1="+txt11, true)
req.send();
}

</script>
</head>
<body>
 
 	<div id="nav">
 		<div id="visit">
 		<?php
 		include 'db.php';
 		session_start();
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
		<li><a href="index.php">Home</a></li>
	</ul>
  </div>


<div id="mainbody">

	<div id="register_box">
             <form method="post" enctype="multipart/form-data">
             	<label>Name</label>
		<input type="text" name="name" placeholder="your name" class="myspace" autofocus required="" /><br>
		<label>Address</label>
        <input type="text" name="address" placeholder="Address" class="myspace" required="" /><br>
		<label>Post Code</label>
        <input type="Postal" name="postal" placeholder="Post code" class="myspace" required="" /><br>
        <label>Date of birth</label>
        <input type="Date" name="dob" placeholder="Date Of Birth" class="myspace" max="1995-01-01" required="" /><br>
        <label>Email</label>
	    <input type="Email" name="email" placeholder=" Email eg;bvekjas1@gmail.com" class="myspace" required="" /><br>
	    <label>Userid</label>
        <input id = "txt" type="text" name="userid" placeholder="Userid eg;bvekjas1" required=""  class="myspace" onBlur="loadme()"/><span id = "mydiv" class = "warning"></span></br>        <label>Password</label>
	    <input type="Password" name="pass" placeholder="Password" class="myspace" />
	    
        <div id="myspace">
        <input type="radio" value="male" name="gender">Male
        <input type="radio" value="female" name="gender">Female
    </div>
        <input type="submit" name="reg" onclick="myFunction()" value="Register" class="btn_register"/>
        <a href="login.php">
    <button type="button" class="btn_register">Login</button>
</a>﻿
 </form>
</div>
</div>
<?php  
include 'db.php';
if(isset($_POST['reg']))
{
	$name = $_POST['name'];
	$address=$_POST['address'];
	$postal = $_POST['postal'];
	$dob =$_POST['dob'];
	$email = $_POST['email'];
	$userid = $_POST['userid'];
	$password = $_POST['pass'];
	$gender = $_POST['gender'];
	$logindate = date('Y-m-d');
	$usertype = "Client";

	$qry_ins = "insert into tbl_users values('','$name','$address','$postal','$dob','$email','$userid','$password','$gender','$usertype','$logindate')";
	if($conn->query($qry_ins)==FALSE)
	{
		die("Error: ".$conn->error);
	}

	echo '<script language="javascript">';
	echo 'alert("You are registered now")';
	echo '</script>';


}



?>
       
	<div id="footer">
			
		
  </div>
	
</body>
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
</html>


