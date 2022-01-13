<?php
session_start();

if(!isset($_SESSION['username']))
{
	header("Location:../logout.php");
}
include '../dbconfig.php';

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$query = "select * from patient_registration where id = '$id'";
	$result1 = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result1);
}

if(isset($_GET['id']))
{
	$rid = $_GET['id'];
	$squery = "SELECT * FROM appointment_details WHERE id='$rid'";
	$row5 = mysqli_fetch_array(mysqli_query($conn,$squery));
}

if(isset($_POST['appointmentbtn']))
{
  
  $patient_id = $_POST['Patient_id'];
  $token = $_POST['Token'];
  $type =$_POST['Type'];
  $doctor = $_POST['Doctor'];
  $fees = $_POST['fees'];
  $validity_period = $_POST['Validity_Period'];
  $time_slots = $_POST['Time_slots'];
  $op_date = date('Y-m-d');
  $updated_datetime = date('Y-m-d H:i:s');
  $updated_by = $_SESSION['userid']; 

  $query = mysqli_query($conn,"UPDATE appointment_details SET Patient_Id='$patient_id',Token_Number='$token',Type='$type',Doctor='$doctor',Fees='$fees',Validity_Period='$validity_period',Time_Slots='$time_slots',op_date='$op_date',updated_datetime='$updated_datetime',updated_by='$updated_by' WHERE id='$rid'");

  

  if ($query) {
  	header ('Location:../Patient_Details/');
  }
  else{
  	echo "Not inserted";
  }
 
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>SRI-AROGYA | Appointment</title>

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
	<div class="container"><br>
		<h4 style="text-align: center ;font-family:'Arial Rounded MT Bold',Arial,Helvetica,sans-serif; font-weight: bold; ">Appointment</h4><br>
		    <form method="POST">
			<fieldset class="border p-2">
		 		<legend  class="w-auto" style="font-size: 22px;font-family: bold;">Appointment Details       </legend>
		 		<div class="row">
				  <div class="col-md-4">
				  	<p style="text-align: right;">Patient ID <i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
					<input type="text" name="Patient_id" class="form-control"  value="<?php if(isset($_GET['id'])){ echo $row['Patient_Id'];} ?>" style="border-radius: 7px; background-color: #e1ebfc;" >
				  </div>			      
			    </div>
			    <br>
			    <div class="row">
				  <div class="col-md-4">
				  	<p style="text-align: right;">Token No. <i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
					<input type="text" name="Token" class="form-control"  value="<?php echo rand(10000,99999); ?>" style="border-radius: 7px; background-color: #e1ebfc;" readonly="">
				  </div>			      
			    </div>
			    <br>
			    <div class="row">
				  <div class="col-md-4">
				  	<p style="text-align: right;">Type<i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
				  	<select name="Type" required="" class="form-control" style="border-radius: 7px; background-color: #e1ebfc;">
							<option value="">--Select--</option>
							<option value="Gynic">Gynic </option>
							<option value="ENT">ENT</option>
							<option value="Ortheopedic">Ortheopedic</option>
			    		</select>
					</div>
				</div>
				<br>
				<div class="row">
				  <div class="col-md-4">
				  	<p style="text-align: right;">Doctor<i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
				  	<select name="Doctor" required="" class="form-control" style="border-radius: 7px; background-color: #e1ebfc;">
							<option value="">--Select--</option>
							<option value="Dr.Ramesh Kumar">Dr.Ramesh Kumar</option>
							<option value="Dr.Shruthi">Dr.Shruthi</option>
							<option value="Dr.Vivek">Dr.Vivek</option>
							
			    		</select>
					</div>
				</div>
				<br>
				<div class="row">
				  <div class="col-md-4">
				  	<p style="text-align: right;">Fees <i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
					<input type="text" required="" name="fees" class="form-control"  value="<?php echo $row5['Fees']; ?>" style="border-radius: 7px; background-color: #e1ebfc;">
				  </div>			      
			    </div>
			    <br>
			    <div class="row">
				  <div class="col-md-4">
				  	<p style="text-align: right;">Validity Period <i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
						<select name="Validity_Period" required="" class="form-control" style="border-radius: 7px; background-color: #e1ebfc;">
							<option value="">--Select--</option>
							<option value="2 Days">2 Days</option>
							<option value="4 Days">4 Days</option>
							<option value="6 Days">6 Days</option>
							
			    		</select>
				  </div>			      
			    </div>
			    <br>
			    <div class="row">
				  <div class="col-md-4">
				  	<p style="text-align: right;">Time Slots <i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
					
					<select name="Time_slots" required="" class="form-control" style="border-radius: 7px; background-color: #e1ebfc;">
							<option value="">--Select--</option>
							<option value="11 A.M - 1 P.M">11 A.M - 1 P.M</option>
							<option value="3 P.M - 5 P.M">3 P.M - 5 P.M</option>
							
					</select>
				  </div>			      
			    </div>
			    <br>
			</fieldset>
			
	
		<br>
	<div class="row">
	<div class="col-md-5">
		<a href="../Appointment_Details/" class="btn btn-warning">Back</a>
	</div>
	<div class="col-md-2">
		<input type="submit" name="appointmentbtn" value="Submit" class="btn btn-success form-control" ><br>
	</div>
		
	</div>
</div>
</form>
</div>
<br>
 <?php include '../footer.php' ?>


