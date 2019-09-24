<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
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
		<li><a href="rss/index.php">RSS</a></li>
	</ul>
  </div>


<div id="mainbody">
	<div id="login_box">
		<h2>Login To Continue</h2>
		<?php
		if(isset($_COOKIE['count']) && $_COOKIE['count']>3)
		{
			echo "you are blocked for 5 minutes";
			die();
		}
		?>
		<form action="log.php" method="post">
			<label>Userid</label>
  <input type="text" name="userid" placeholder="userid" class="mytext" autofocus /> 
  <label>Password</label>
  <input type="password" name="password" placeholder="password" class="mytext" />
  <input type="submit" name="login" value="Login" class="btn"/>
  <a href="reg.php">
    <button type="button" class="btn">Register</button>
</a>﻿
</form>
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


