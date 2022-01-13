<?php ;
date_default_timezone_set("Asia/kolkata");

session_start();

if(!isset($_SESSION['username']))
{
	header("Location:../logout.php");
}
 
include '../dbConfig.php';

if(isset($_GET['id']))
	{
		$id  = $_GET['id'];
		$query = "SELECT * from appointment_details where id = '$id'";
		$result1 = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result1);

		$repa = $row['Patient_Id'];
		$query1 = "SELECT * from patient_registration where Patient_Id= '$repa'";
		$result2 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_array($result2);

		$query3 = "SELECT * FROM prescription WHERE patient_id = '$repa'";
		$result3 = mysqli_query($conn,$query3);
		$row3 = mysqli_fetch_array($result3);
	}
	else
	{
		header('Location:../Appointment_Details/');
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>SRI-AROGYA | Prescription </title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
</head>
<body>
	<?php include '../header.php'; ?>

	<div class="container">
		
		<div class="text-center"> 
		<h3>Spectacle Prescription</h3>
	     </div>
	     <br>
		<div class="row">
			
			<h5>Patient ID : <b style="color:orange;"> GPM/<?php echo $row['Patient_Id']; ?> </b></h5>
		</div>
		<div class="row">
			<div class="col-md-1">
				<h5>Name:</h5>
			</div>
			<div class="col-md-2">
				<h5><?php echo $row1['Patient_Name']; ?></h5>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-1">
				<h5>Age/Sex:</h5>
			</div>
			<div class="col-md-1">
				<h5><?php echo $row1['Gender']; ?></h5>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-1" style="text-align: right;" >
				<h5>Date:</h5>
			</div>
			<div class="col-md-2" style="align-items: left;">
				<h5 ><?php echo date('d-M-Y'); ?></h5>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6">
				<div class="text-center"> 
		            <h3>Right Eye</h3>
	            </div>
	            <table border="1" style="height:150px;width:100%;text-align: center;">
	            	<tr>
	            		<th>SPH</th>
	            		<th>CYL</th>
	            		<th>Axis</th>
	            		<th>Vision</th>
	            	</tr>
	            	<tr>
	            		
	            		<td><?php echo $row3['r_dv_sph']; ?></td>
	            		<td><?php echo $row3['r_dv_cyl']; ?></td>
	            		<td><?php echo $row3['r_dv_axis']; ?></td>
	            		<td><?php echo $row3['r_dv_vision']; ?></td>
	            	</tr>
	            	<tr>
	            		
	            		<td><?php echo $row3['r_add_sph']; ?></td>
	            		<td><?php echo $row3['r_add_cyl']; ?></td>
	            		<td><?php echo $row3['r_add_axis']; ?></td>
	            		<td><?php echo $row3['r_add_vision']; ?></td>
	            	</tr>
	            	
	            </table>
			</div>
			<div class="col-md-6">
				<div class="text-center"> 
		            <h3>Left Eye</h3>
	            </div>
	            <table border="1" style="height:150px;width:100%;text-align: center;">
	            	<tr>
	            		<th>SPH</th>
	            		<th>CYL</th>
	            		<th>Axis</th>
	            		<th>Vision</th>
	            	</tr>
	            	<tr>
	            		<td><?php echo $row3['l_dv_sph']; ?></td>
	            		<td><?php echo $row3['l_dv_cyl']; ?></td>
	            		<td><?php echo $row3['l_dv_axis']; ?></td>
	            		<td><?php echo $row3['l_dv_vision']; ?></td>
	            	</tr>
	            	<tr>
	            		<td><?php echo $row3['l_add_sph']; ?></td>
	            		<td><?php echo $row3['l_add_cyl']; ?></td>
	            		<td><?php echo $row3['l_add_axis']; ?></td>
	            		<td><?php echo $row3['l_add_vision']; ?></td>
	            	</tr>
	            	
	            </table>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-md-1">
				<h5>Advice</h5>
			</div>
			<div class="col-md-6 " style="border: 1px solid black; width: 100%" >
				<?php echo $row3['advice']; ?>
				
			</div>

			<div class="col-md-1" style="text-align: right;"><h5>IPD</h5></div>
			<div class="col-md-1" style="border: 1px solid black; width: 100%" >
				<?php echo $row3['ipd']; ?>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-md-2">
				<h5>Doctor Name : </h5>
			</div>
			<div class="col-md-3"> <h5><?php echo $row['Doctor']; ?></h5></div>
			<div class="col-md-1"></div>
			<div class="col-md-3"><h5>Doctor's Signature : </h5></div>
			<div class="col-md-3" style="font-family: italic;"><h5><?php echo $row['Doctor']; ?></div>

		</div>
		<br>
		
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-2">
			</div>
		</div>
		<br>

		<div class="row">
			<div class="col-md-2">
				<a href="../Appointment_Details/" class="btn btn-warning">Back</a>
			</div>
		</div>
	
	</div>
	<br>


	<?php include '../footer.php'; ?>
</body>
</html>