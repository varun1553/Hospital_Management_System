<?php 
date_default_timezone_set("Asia/kolkata");

session_start();

if(!isset($_SESSION['username']))
{
	header("Location:../logout.php");
}
 
//   $deleted_by  = $_SESSION['userid'];
//   $deleted_datetime = date('Y-m-d H:i:s');


// if(isset($_POST['deletebtn']))
// {
// 	$query = mysqli_query($conn,"UPDATE patient_registration SET deleted_by='$deleted_by',deleted_datetime='$deleted_datetime'");
// }
include '../dbConfig.php';
if(isset($_GET['deleteId']))
{
	$id = $_GET['deleteId'];
	$deleteQuery = mysqli_query($conn,"DELETE FROM patient_registration where id='$id' ");
	if($deleteQuery)
	{
		header("Location:../Patient_Details/?delete");
	}
	else
	{
		echo "Not deleted..! ".mysqli_error($conn);
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>SRI-AROGYA | Patient Details</title>

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
					<h2 align="center">Patients</h2><br>

					<h5 style="text-align: right;"> <b style="color:orange;">  <?php echo date('d-M-Y h:i A'); ?></b> </h5><br>
					<?php 
					if(isset($_GET['success']))
					{
					?>
					
					<div class="alert alert-success alert-dismissible">
					  <a href="../Patient_Details/" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Success!</strong> Registration Successfully Completed.
					</div>
					<?php 
					}

					 ?>
					<div class="row">
						<div class="col-md-4">
							<a href="../patient_registration/" class="btn btn-info"><i class="fa fa-plus"></i> Add</a>
							<a href="../Dashboard/" class="btn btn-warning"><i class="fa fa-arrow-left" ></i> Back</a>
						</div>
						<div class="col-md-8 text-right">
							<form method="post">
							<input type="text" name="Search" placeholder="Search ID...">
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
							<th>Patient Name</th>
							<th>Relation Name</th>
							<th>Gender</th>
							<th>Age</th>
							<th>Mobile No.</th>
							<th width="20%">Action</th>

						</tr>
							
						<?php 
							$s=1;
							if(isset($_POST['searchBtn']))
							{
								$search = $_POST['Search'];
								$query = "select * from patient_registration where Patient_Id like '%$search%'";
							}
							else
							{
								$query = "select * from patient_registration";
							}
							
							$result1 = mysqli_query($conn,$query);
							while($row = mysqli_fetch_array($result1))
							{
						 ?>
						<tr>
							<td><?php echo $s++; ?></td>
							<td><?php echo $row['Patient_Id']; ?></td>
							<td><?php echo $row['Patient_Name']; ?></td>
							<td><?php echo $row['Relation_Name']; ?></td>
							<td><?php echo $row['Gender']; ?></td>
							<td><?php echo $row['Age']; ?></td>
							<td><?php echo $row['Mobile_Number']; ?></td>
							<td>
								
								<a href="../Appointment/?id=<?php echo $row['id']; ?>" class="btn btn-success"><i class="fa fa-file" title="Appointment"></i></a>
								<a href="../Patient_Profile/?id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fa fa-eye" title="View"></i> </a>
								<a href="../update_patient_profile/?id=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="fa fa-edit" title="Update"></i> </a>
								
								<a title="Delete" name="deletebtn" href="../Patient_Details/?deleteId=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash" title="Delete"></i></a>
							
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