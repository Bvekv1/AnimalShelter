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
	<ul>

		
		

	</ul>
  </div>


<div id="mainbody">
	<div id="left">
		<a href="client.php">View User</a><br>
		<a href="animal.php">Add Animals</a><br>
		<a href="don.php">Add Donations</a><br>
		<a href="logout.php">Logout</a>
	</div>
	<div id="bibek">
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





