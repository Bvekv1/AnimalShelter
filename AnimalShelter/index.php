<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="engine/engine.js"></script>
	<?php include 'setup.php';  ?>
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
	<ul>

		<li><a href="login.php">Login</a></li>
		<li><a href="rss/index.php">RSS</a></li>
	</ul>
  </div>


<div id="mainbody">

	<img src="back/dog.png" id='slide_1'>
	<img src="back/play.png" id='slide_2'>
	
	
	
    <script >
  $(document).ready(function(){
   setInterval(callMe,50);
});
function callMe(){
   $("#slide_1").animate({right:'250px'}).fadeOut().animate({left:'0'}).fadeIn();
}
	function callMe(){
   $("#slide_2").animate({right:'250px'}).fadeOut().animate({left:'0'}).fadeIn();
}

</script>

	
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


