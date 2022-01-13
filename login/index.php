<?php 
session_start();

include '../dbConfig.php';
$msg = 0;
if(isset($_SESSION['userid']))
{
	header("Location:../Dashboard/");
}

if(isset($_POST['loginbtn']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT count(username) AS Count,id,Username FROM staff_registration WHERE Username = '$username' and Password = '$password' ";

	$row = mysqli_fetch_array(mysqli_query($conn,$query));

	$count = $row['Count'];
	if($count!=0)
	{
		$_SESSION['username'] = $row['Username'];
		$_SESSION['userid'] = $row['id'];
		if(isset($_SESSION['userid']))
		{
			header("Location:../Dashboard/");
		}
	}
	else
	{
		$msg = 1;
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>SRI-AROGYA | Login</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
		<script>
			$(document).ready(function()
			{
				$("#batchSelect").select2();
			});
		</script>
		<style type="text/css">
			.btn{
				border-radius: 20px !important;
			}
		</style>
</head>

<body>

	
<!-- <img src="login.jpg"  width="100%" height="100%">--> 
 <br>
	<?php include '../header.php' ?>
	<br>
	<form method="post">
	<div class="row">
		<div class="col-md-4 col-sm-12 col-xs-12 col-lg-4"></div>
		<div class="col-md-4 col-sm-12 col-xs-12 col-lg-4">
			<h3 style="text-align: center; font-size: 28pt;"> Login</h3>
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col-md-4  col-sm-12 col-xs-12 col-lg-4"></div>
		<div class="col-md-4  col-sm-12 col-xs-12 col-lg-4" style="border:3px solid grey;">
			<div class="row">
				<div class="col-md-2  col-sm-12 col-xs-12 col-lg-2"></div>
				<div class="col-md-8  col-sm-12 col-xs-12 col-lg-8">
				<?php 
				if($msg==1)
				{
					echo "<h3 style='color:red;text-align:center;'>Invalid Credentials</h3>";
				}

				 ?>
			<br>
			<h5 style="text-align: center">Username</h5>
				<input type="text" class="form-control" name="username" placeholder="" value="" style="border-radius: 7px; background-color: #e1ebfc;">
			<h5 style="text-align: center">Password</h5>
				<input type="password" class="form-control" name="password" placeholder="" value="" style="border-radius: 7px; background-color: #e1ebfc;"><br>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<input type="submit" name="loginbtn" value="SignIn" class="btn btn-success form-control ">
					</div>
					<div class="col-md-3"></div>
				</div>
			<br>
		</div>	
	</div>
	<div class="row">
				<div class="col-md-4">	
				</div>
				<div class="col-md-6">
					
					<a href="#" style="text-align: left; font-size: 16px;">Forgot Password?</a>
				</div>

			
			</div>
		

		</div>
	</div>
	</form>
	<br>
	<br>
	 <br>
	 

    <?php include '../footer.php' ?>


			
			

</body>
</html>
