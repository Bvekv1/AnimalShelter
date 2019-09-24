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
        echo "page visit:&nbsp" .$net
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
    <li><a href="profile.php">Profile</a></li>
    <li><a href="visit.php">Main</a></li>
    
    <li><a></a>
        </li>
  </ul>
  </div>


<div id="mainbody">
<div id="gift">
   <h2>Gifts for your pets</h2>
  <img src="gifts/dogcage1.jpeg" width="220px"; height="140px";><br>
  <p>Dog Cage</p>
  <input type="submit" name="buy" value="Buy"><br>
  
  <img src="gifts/dogcollar.jpeg" width="220px"; height="140px";><br>
  <p>Collar for cat and Dog</p>
  <input type="submit" name="buy" value="Buy"><br>
  <img src="gifts/birdcage.jpeg" width="220px"; height="140px";>
  <p>Bird Cage</p>
  <input type="submit" name="buy" value="Buy"><br>
  <img src="gifts/dogbowl.jpg" width="220px"; height="140px";>
  <p>Dog Bowl</p>
  <input type="submit" name="buy" value="Buy"><br>
  <img src="gifts/catbed.jpg" width="220px"; height="120px";>
  <p>Cat bed</p>
  <input type="submit" name="buy" value="Buy"><br>



    </div>
<form method="post" id="question">
  <p>Ask question</p>
  <input type="area" name="question">
  <input type="submit" name="que">

</form>
   <?php
     include 'db.php';
     
       $id=$_SESSION['id'];
     if(isset($_POST['que'])){
     $question=$_POST['question'];
     $qry_bibek="insert into tbl_questions values('','$id','$question')";

     if($conn->query($qry_bibek)==FALSE)
{
die("Error: ".$conn->error);
}
else {
  echo "question Posted";
}
}
   ?>
   <div id='first'>
   <div id='last'>
   <?php
  include 'db.php';
  $start=0;
  $max=3;

     $qry_sel="select * from tbl_questions "; 
     $data=$conn->query($qry_sel);
     $total=$data->num_rows;
 $page=ceil($total/$max);
 if(isset($_GET['bd'])){
  $start=($_GET['bd']-1)*$max;
 }
 $qry_sel="select * from tbl_questions limit $start, $max";
 $show= $conn->query($qry_sel);
  while ($result= $show->fetch_assoc()) {
         $qid=$result['qid'];
         $bid=$result['userid'];
         $qry_name="select * from tbl_users where id='$bid'";
         $res=$conn->query($qry_name);
         while($data_u=$res->fetch_array()){
          $u_name=$data_u['name'];
         }
         $ques=$result['question'];
        echo "<div  style= 'width:300px; margin-left:10px; text-align:justify;  height:auto;  background:#ccc; float:left; 
         '>
     <p><b>question by:".$u_name."</br></b>Q." .$ques."?</p>
  <a href='deletequestion.php?qid=".$result['qid']."'>Delete</a>
  
  
  <form method='post'>
  <input type='text' name='answer$result[qid]'>
  <input type='submit' name='ans$result[qid]' value='Reply'>
         </form>";          
        
   $sel="select * from tbl_answer where qid='$qid'"; 
   $res=$conn->query($sel); 
   $data=$res->fetch_array();
   $hd=$data['userid'];
   $aid=$data['aid'];
   $bibek="select * from tbl_users where id='$hd'";
   $resy=$conn->query($bibek);
   $resultb=$resy->fetch_array();
   $thor=$resultb['name'];
   while($data=$res->fetch_array()){ 
          
    echo 
      "<p>Reply By</p> 
      <p><b>".$thor."&nbsp</b><br>".$data['answer']."</p>
      <a href='answerdel.php?aid=".$data['aid']."'>Delete</a>
      ";
      
}  
 

         if(isset($_POST['ans'.$result['qid']])){
      $id=$_SESSION['id'];
      $answer=$_POST['answer'.$result['qid']];
      $qry_bibek="insert into tbl_answer values('','$id','$answer','$qid')";


      if($conn->query($qry_bibek)==FALSE){
        die("Error:$conn->error");
      }
      else{
        header("location:community.php");
      }

    }

    echo"</div>";
 }

    ?>
  </div>
  <?php
   echo "<div id='page1>'>";
  for($i=1; $i<=$page; $i++){
    echo "<a href='community.php?bd=".$i."'>$i</a>";
  }
  echo "</div>";
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


