<?php
$con =mysqli_connect('localhost','root');
mysqli_select_db($con,'formdb');
$nameid= $_POST['datapost'];

$q="select * from  schools where mid = '$nameid'";
 $result=mysqli_query($con,$q);
  while($rows= mysqli_fetch_array($result)){
  	?>
  	<option> <?php echo $rows ['school'];?></option>
  	<?php
  }
?>