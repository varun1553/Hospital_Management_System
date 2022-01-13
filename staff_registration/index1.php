<?php ;
include '../dbConfig.php';


if(isset($_POST['staffBtn']))
{
  
  $employee_name = $_POST['employee_name'];
  $employee_id = $_POST['employee_id'];
  $department =$_POST['Department'];
  $designation = $_POST['Designation'];
  $date_of_join = $_POST['Date_of_Join'];
  $role = $_POST['Role'];
  $aadhar_number = $_POST['Aadhar_number'];
  $relation_name = $_POST['relation_name'];
  $gender = $_POST['gender'];
  $blood_group = $_POST['blood_group'];
  $date_of_birth = $_POST['date_of_birth'];
  $age = $_POST['age'];
  $employee_mobile_number = $_POST['Employee_mobile_no'];
  $emergency_mobile_number = $_POST['Emergency_mobile_no'];
  $email = $_POST['Email'];
  $pincode = $_POST['pincode'];
  $address = $_POST['Address'];
  $landmark = $_POST['Landmark'];
  
  $query = mysqli_query($conn,"INSERT INTO staff_registration(Employee_Name,Employee_ID,Department,Designation,Date_of_Join,Role,Aadhar_Number,Relation_Name,Gender,Blood_Group,Date_of_Birth,Age,Employee_Mobile_Number,Emergency_Mobile_Number,Email,Pincode,Address,Landmark)VALUES('$employee_name','$employee_id','$department','$designation','$date_of_join','$role','$aadhar_number','$relation_name','$gender','$blood_group','$date_of_birth','$age','$employee_mobile_number','$emergency_mobile_number','$email','$pincode','$address','$landmark')");

  

  if ($query) {
  	echo "INSERTED";
  }
  else{
  	echo "Not inserted";
  }
 
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>SRI-AROGYA | Staff Registration</title>

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
		<h4 style="text-align: center ;font-family:'Arial Rounded MT Bold',Arial,Helvetica,sans-serif; font-weight: bold; ">Staff Registration</h4><br>
		<form method="POST">
			<fieldset class="border p-2">
		 		<legend  class="w-auto" style="font-size: 22px;font-family: bold;">User Details</legend>
		 		<div class="row">
				  <div class="col-md-2">
				  	<p style="text-align: right;">Name <i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
					<input type="text" name="name" class="form-control"  value="" style="border-radius: 7px; background-color: #e1ebfc;">
				  </div>
				  <div class="col-md-2">
						<p style="text-align: right;">Username<i class="required">*</i></p>
				  </div>
				  <div class="col-md-4">
					<input type="text" class="form-control" name="username" value="" style="border-radius: 7px; background-color: #e1ebfc;">
			      </div>
			     
			      
			    </div>
			    <br>
			   
			    <div class="row">
				  <div class="col-md-2">
				  	<p style="text-align: right;">Password <i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
					<input type="password" name="password" class="form-control"  value="" style="border-radius: 7px; background-color: #e1ebfc;">
				  </div>
				  <div class="col-md-2">
						<p style="text-align: right;">Role<i class="required">*</i></p>
				  </div>
				  <div class="col-md-4">
					<select name="role" class="form-control" style="border-radius: 7px; background-color: #e1ebfc;">
							<option>--Select--</option>
							
							<option></option>
							
			    		</select>
			      </div>
			     
			      
			    </div>
			    <br>
			


			<br>
		
			</div>
<br>
<br>
<div class="row">
	<div class="col-md-5"></div>
	<div class="col-md-2">
		<input type="submit" name="staffBtn" value="Register" class="btn btn-success form-control" ><br>
	</div>
		
	</div>
</form>
</div>

<br>
 <?php include '../footer.php' ?>

