<?php
session_start();
include('db.php');
if(!isset($_SESSION['ticket']) && $_SESSION['ticket']!='a')
{
 header("location:index.php");

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
 	    	echo "page vist:&nbsp " .$net
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
		<li><a href="rss/index.php">RSS</a></li>
		<li><a href="community.php">Community</a></li>
		<li><a href="profile.php">Profile</a></li>
		
		<li><a></a>
        </li>
	</ul>
  </div>


<div id="mainbody">
	<?php
if(isset($_COOKIE["bibek"])){
	echo "<h2>just viwed item on right side</h2>";
	$arr= json_decode($_COOKIE['bibek'],true);
	 $length = count($arr);
	 for($i= 0; $i< $length; $i++){
         $qry_sel="select * from tbl_animals where id ='$arr[$i]'";
	 $res = $conn->query($qry_sel);
	 while ($show=$res->fetch_array()) {
	 	echo "<div id='history'>
	 
 	<p><b>
 	Name:</b>" .$show['name']."</p>
 	<p><b>
   <a href='activitydel.php'>Remove</a>
 	</div>";

	 }
	}	
}
 else
 {
 	echo "No Animal viwed";
 }

?>
<?php
$start=0;
$max=12;
include 'db.php';
 $qry_sel = "select * from tbl_animals";
 $data = $conn->query($qry_sel);
 $total=$data->num_rows;
 $page=ceil($total/$max);
 if(isset($_GET['bd'])){
 	$start=($_GET['bd']-1)*$max;
 }
 $qry_sel="select * from tbl_animals limit $start, $max";
 $data=$conn->query($qry_sel) or die($conn->error);
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
   <p>
   <a href='querycart.php?uid=".$result['id']."
   '>Adopt</a><br>
   <a href='viewed.php?id=".$result['id']."
   '>view</a>
 	</div>";
 }

?>


   <?php
   echo "<div id='pagenumber'>";
   for($i=1;$i<=$page; $i++){
   	echo "<a href='visit.php?bd=".$i."'>$i</a>";
   }
   echo "</div>";


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
                

  </footer>
	
</body>
</html>


