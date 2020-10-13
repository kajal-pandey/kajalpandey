<!DOCTYPE>
<html>
<head>
	<title>Test</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
$con =mysqli_connect('localhost','root');
mysqli_select_db($con,'test');

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
} 

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $q="INSERT INTO  showdata (username, password) VALUES ('$username','$password')";
    if (!mysqli_query($con,$q))
    {
      echo "Error: " . $sql . "<br>" . $con->error;
    }else{
     // echo "inserted";
    }//end of if else
}//end of if 
?>
	<div class="container">
		
		<h2 class="text-center text-danger">Get data from database</h2>
	<br>
	<div class="col-lg-8 m-auto">
		<form id="myform" action="" method="post">
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control">
		</div>
        <div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control">
		</div>

        <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">
        <button id="displaydata" name="displaydata"  id="displaydata"class="btn btn-danger">Display </button>
          <br>
    <br>
    <br>
    
        </form>
    </div>
    
    	    	<table class="table table-striped table-bordered text-center">
    		<thead>
    			<th>ID</th>
    			<th>username</th>
    			<th>Password</th>
    		</thead>
    		<tbody id="response">
     	
     </tbody>
    </table>
</div>
</body>
<script type="text/javascript">

	$(document).ready(function(){

		var form =$('#myform');

		$('#myform').click(function(){
 			e.preventDefault(); 
			$.ajax({

				url:'displayajax1.php',
				type:'post',
				data:$("#myform").serialize (),
                   success:function(data){
                   	console.log(data);

                   }
			});				
		});
	

	//$('#displaydata').click (function(){
		  displaydata();

         function displaydata(){ 
		$.ajax({

			url:'displayajax1.php',
			type:'post',

			success:function(responsedata){

				$('#response').html(responsedata);

			}
		});
    }

    });
</script>
