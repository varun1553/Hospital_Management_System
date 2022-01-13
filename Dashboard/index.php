<?php 
session_start();

include '../dbConfig.php';

if(!isset($_SESSION['username']))
{
	header("Location:../logout.php");
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
		
</head>
<body>
	<?php include '../header.php'; ?>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<p style="font-size: 20px;color: orange;"><b>Hello,<?php echo $_SESSION['username']; ?> </b></p>
			</div>
			<div class="col-md-4">
				<div class="text-center "><h1>Dashboard</h1></div>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-1" >
				<a href="../Logout.php" align="" class="btn btn-danger">Logout</a>
			</div>
		</div>
	</div>


	
	<br>
	<?php 
		$staffCountQuery = mysqli_query($conn,"SELECT COUNT(id) AS StaffCount FROM staff_registration");
		$staffRow = mysqli_fetch_array($staffCountQuery);

		$patientCountQuery = mysqli_query($conn,"SELECT COUNT(id) AS PatientCount FROM patient_registration");
		$patientRow = mysqli_fetch_array($patientCountQuery);

		$appointmentCountQuery = mysqli_query($conn,"SELECT COUNT(id) AS AppointmentCount FROM appointment_details");
		$appointmentRow = mysqli_fetch_array($appointmentCountQuery);

		$date=date('Y-m-d');
		$todayappointmentCountQuery = mysqli_query($conn,"SELECT COUNT(id) AS TodayAppointmentCount FROM appointment_details WHERE op_date='$date'");
		$todayappointmentRow = mysqli_fetch_array($todayappointmentCountQuery);

		$pendingappointmentCountQuery = mysqli_query($conn,"SELECT COUNT(id) AS PendingAppointmentCount FROM appointment_details WHERE op_status=1");
		$pendingappointmentRow = mysqli_fetch_array($pendingappointmentCountQuery);



	 ?>
	 <div class="container-fluid">
	<table class="table table-bordered">
		<tr class="text-center">
			<th>No. of Staff<h2><?php echo $staffRow['StaffCount']; ?></h2></th>
			<th>No. of Patients<h2><?php echo $patientRow['PatientCount']; ?></h2></th>
			<th>No. of Appointments<h2><?php echo $appointmentRow['AppointmentCount']; ?></h2></th>
			<th>Today's Appointments<h2><?php echo $todayappointmentRow['TodayAppointmentCount']; ?></h2></th>
			<th>Pending Appointments<h2><?php echo $pendingappointmentRow['PendingAppointmentCount']; ?></h2></th>
			<th>Completed Appointments<h2><?php echo $appointmentRow['AppointmentCount']-$pendingappointmentRow['PendingAppointmentCount']; ?></h2></th>
		</tr>
	</table>
</div>
	<br>
	<div class="container">
		<div class="row">
		<div class="col-md-3"><a href="../Staff_Details/" class="btn btn-success form-control" style="height:70px;font-size:24px;font-weight: bold;padding-top:17px; ">Staff</a></div>
		<div class="col-md-3"><a href="../Patient_Details/" class="btn btn-success form-control" style="height:70px;font-size:24px;font-weight: bold;padding-top:17px; ">Patients</a></div>
		<div class="col-md-3"><a href="../Appointment_Details/" class="btn btn-success form-control" style="height:70px;font-size:24px;font-weight: bold;padding-top:17px; ">Appointments</a></div>
		<div class="col-md-3"><a href="#" class="btn btn-success form-control" style="height:70px;font-size:24px;font-weight: bold;padding-top:17px; ">Reports</a></div>

	</div>
	</div>
	<br>
	
	
	<br><br><br><br><br><br><br>
	<?php include '../footer.php'; ?>
</body>
</html>