<?php
header ("Content-type: text/xml");
echo '<?xml version ="1.0" encoding="utf-8" ?>';
include("../db.php");
$query= "select * from tbl_animals";
$res = $conn->query($query);



echo "<spencer>";
while($data = $res->fetch_array())
{
	?>
  <pet>
  	<pet_animaltype><?php echo $data['animaltype'];?></pet_animaltype>
  	<pet_name><?php echo $data['name'];?></pet_name>
  	<pet_age><?php echo $data['age'];?></pet_age>
  	<pet_gender><?php echo $data['gender'];?></pet_gender>
  	<pet_height><?php echo $data['height'];?></pet_height>
    
  </pet>
  <?php
}
	echo "</spencer>";


?>
