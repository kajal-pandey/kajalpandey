<?php

$con=mysqli_connect('localhost','root');
if($con){
echo	"succes";
}
$db=mysqli_select_db($con,'formdb');
if($con){
echo	"succesh";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container col-lg-6">
		<h2 class="text-center text-danger">Get data from database</h2>
		<form>
			Username:<input type="text" name="" class="form-control"><br>
			Password:<input type="password" name="" class="form-control"><br>
			Degrees:<select class="form-control" onchange="myfun(this.value)">
				 <option>Select Any one</option>


				 <?php
				 $q="select* from degree";
				 $result =mysqli_query($con,$q);
				 while($rows=mysqli_fetch_array($result)){
				 	?>
				 	<option value="<?php echo $rows['mid'];?>"> <?php echo $rows['degrees'];?></option>
				 	<?php
				 }
				 ?>
				
			</select><br>
			school:<select class="form-control"id="dataget">
				<option>Chosse any one</option>	
			</select>
			<br><br>
			<button class="btn btn-primary">Submit</button>
		</form>
	</div>
  <script type="text/javascript">
    function myfun (datavalue){
    	$.ajax({
    		url:'school.php',
    		type:'POST',
    		data:{datapost:datavalue},
    		success:function(result){
    			$('#dataget').html(result);
    		}

    	});
    }
  </script>>

</body>
</html>