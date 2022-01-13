<?php ;
session_start();

if(!isset($_SESSION['username']))
{
	header("Location:../logout.php");
}
date_default_timezone_set("Asia/kolkata");
include '../dbConfig.php';

if(isset($_GET['deleteId']))
{
	$id = $_GET['deleteId'];
	$deleteQuery = mysqli_query($conn,"DELETE FROM Appointment_Details where id='$id' ");
	if($deleteQuery)
	{
		header("Location:../Appointment_Details/?delete");
	}
	else
	{
		echo "Not deleted <br> ".mysqli_error($conn);
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>SRI-AROGYA | Appointment Details</title>

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
			th{
				background-image: url('../images/bg1.jpg');
				color: white;
				text-align: center;
			}
			td{
			text-align: center;
			}

			.required{
				color: red;
				font-weight: bold;
			}
			.btn{
				border-radius: 20px !important;
			}
		</style>
</head>
<body>
	<?php include '../header.php'; ?>
	<br>
		
		
			<div class="container">
			<h4 style="text-align: center;">Appointment Details</h4><br>
		    <h5 style="text-align: right;"> <b style="color:orange;">  <?php echo date('d-M-Y h:i A'); ?></b> </h5><br>
		    <div class="row">
					<div class="col-md-4">
						<!-- <a href="../Appointment/" class="btn btn-info">Add</a> -->
						<a href="../Dashboard/" class="btn btn-warning"><i class="fa fa-arrow-left" ></i> Back</a>
					</div>
					<div class="col-md-8 text-right">
						<form method="post">
						<input type="text" name="Search" placeholder="Search...">
						<button class="btn btn-success" name="searchBtn"><i class="fa fa-search"></i></button>
					</form>
					</div>
			</div><br>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered ">
						<tr>
							<th>Sl.No.</th>
							<th>Patient ID</th>
							<th>Token No.</th>
							<th>Type</th>
							<th>Doctor</th>
							<th>Fees</th>
							<th>Validity Period</th>
							<th>Time Slot</th>
							<th>Detail</th>
						</tr>
							
						<?php 
							$s=1;
							if(isset($_POST['searchBtn']))
							{
								$search = $_POST['Search'];
								$query = "select * from appointment_details where Patient_Id like '%$search%'";
							}
							else
							{
								$query = "select * from appointment_details";
							}
							
							$result1 = mysqli_query($conn,$query);
							while($row = mysqli_fetch_array($result1))
							{
						 ?>
						<tr>
							<td><?php echo $s++; ?></td>
							<td><?php echo $row['Patient_Id']; ?></td>
							<td><?php echo $row['Token_Number']; ?></td>
							<td><?php echo $row['Type']; ?></td>
							<td><?php echo $row['Doctor']; ?></td>
							<td><?php echo $row['Fees']; ?></td>
							<td><?php echo $row['Validity_Period']; ?></td>
							<td><?php echo $row['Time_Slots']; ?></td>
							<td>
								
								<a href="../prescription/?id=<?php echo $row['id']; ?>" class="btn btn-success">Prescription</a>
								<a href="../prescription_details/?id=<?php echo $row['id']; ?>" class="btn btn-success">Prescription_Details</a><br>
								<a href="../update_appointment/?id=<?php echo $row['id']; ?>" class="btn btn-success"><i class="fa fa-edit" title="Update"></i></a>
								<a title="Delete" href="../Appointment_Details/?deleteId=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash" title="Delete"></i></a>
							</td>
						
						</tr>
					        <?php } ?>
							</table>
					</div>	
					
				</div>	
			</div>
	<br>
	<br>
    <br>
    <br>
	<?php include '../footer.php'; ?>
</body>
</html>