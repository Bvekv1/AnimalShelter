<?php
session_start();
$aid = $_GET['id'];
if(isset($_COOKIE["bibek"])){
	$arr= array();
	$arr=json_decode($_COOKIE['bibek'],true);
	array_push($arr,$aid);
	setcookie('bibek',json_encode($arr),time()+3600);
}
else{
	$arr= array($aid);
	setcookie('bibek',json_encode($arr),time()+3600);
}

?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="engine/engine.js"></script>
	<title></title>
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

		<li><a href="login.php">Login</a></li>
		<li><a href="rss/index.php">RSS</a></li>
		<li><a href="store.php">Activity</a></li>
	</ul>
  </div>


<div id="mainbody">
  <?php
   include 'db.php';

      $qry_sel = "select * from tbl_animals where id='$aid'";
 $data = $conn->query($qry_sel);
 while ($result= $data->fetch_assoc()) {
  # code...
 	echo "<div id='list'>
 	<img src='animalimage/".$result['image']."' height='70' width='80' style='margin:0 40px;'>
 	<p><b>
 	Name:</b>" .$result['name']."</p>
 	<p><b>
 	Age:</b>" .$result['age']."</p>
 	<p><b>
 	Gender:</b>".$result['gender']."</p>
 	<p><b>
 	Gender:</b>".$result['height']."</p>
   <p><b>
   Description:</b>".$result['description']."</p>
    <a href='querycart.php?uid=".$result['id']."
   '>Adopt</a><br>
   <a href='visit.php'>Back</a>
 	</div>";
 }
   

  ?>
	
	
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
                
   <footer>

  
	
</body>
</html>


