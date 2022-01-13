<?php ;
include '../dbConfig.php';

session_start();
$errormsg = "";
if(!isset($_SESSION['username']))
{
	header("Location:../logout.php");
}


if(isset($_POST['staffBtn']))
{
	$errors = array();
	$filename = $_FILES['photo']['name'];
  
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
  $username = $_POST['Username'];
  $password = $_POST['Password'];
  $created_by  = $_SESSION['userid'];
  $created_datetime = date('Y-m-d H:i:s');

  if($filename=='')
  {
  	$query = mysqli_query($conn,"INSERT INTO staff_registration(Employee_Name,Employee_ID,Department,Designation,Date_of_Join,Role,Aadhar_Number,Relation_Name,Gender,Blood_Group,Date_of_Birth,Age,Employee_Mobile_Number,Emergency_Mobile_Number,Email,Pincode,Address,Landmark,Username,Password,created_by,created_datetime)VALUES('$employee_name','$employee_id','$department','$designation','$date_of_join','$role','$aadhar_number','$relation_name','$gender','$blood_group','$date_of_birth','$age','$employee_mobile_number','$emergency_mobile_number','$email','$pincode','$address','$landmark','$username','$password','$created_by','$created_datetime')");
  	if ($query) {
  	header("Location:../Staff_Details/?success");
  }
  else{
  	$errormsg = "Not inserted...! ".mysqli_error($conn);
  }
  }
  else
  	{ 
  		$file_name = $_FILES['photo']['name'];
  		$file_size = $_FILES['photo']['size'];
  		$file_tmp = $_FILES['photo']['tmp_name'];
  		$file_type = $_FILES['photo']['type'];

  		$separateExtension = explode('.',$file_name);
  		$getExtension = end($separateExtension);
  		$file_ext = strtolower($getExtension);

  		$extensions = array("jpeg","jpg","png");

  		if(in_array($file_ext,$extensions)===false)
  		{
  			$errors[] = "Extension not allowed, Please choose a JPEG,JPG or PNG file.";
  		}

  		if($file_size > 2097152)
  		{
  			$errors[]="File size not more than 2 MB";
  		}

  		if(empty($errors)==true)
  		{
  			is_dir("../Img/Staff") || mkdir("../Img/Staff","0777",true);
  			move_uploaded_file($file_tmp , "../Img/Staff/".$username.".".$file_ext);
  			$photo = "../Img/Staff/".$username.".".$file_ext;

  			$query = mysqli_query($conn,"INSERT INTO staff_registration(Employee_Name,Employee_ID,Department,Designation,Date_of_Join,Role,Aadhar_Number,Relation_Name,Gender,Blood_Group,Date_of_Birth,Age,Employee_Mobile_Number,Emergency_Mobile_Number,Email,Pincode,Address,Landmark,Username,Password,Photo)VALUES('$employee_name','$employee_id','$department','$designation','$date_of_join','$role','$aadhar_number','$relation_name','$gender','$blood_group','$date_of_birth','$age','$employee_mobile_number','$emergency_mobile_number','$email','$pincode','$address','$landmark','$username','$password','$photo')");
  			
  			if ($query) {
				  	header("Location:../Staff_Details/?success");
				  }
				  else{
				  	$errormsg = "Not inserted...! ".mysqli_error($conn);
				  }
  		}
  		else
  		{
  			foreach ($errors as $error) 
  			{

  				echo $error;

  			}
  		}
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
		<div style="text-center">
			<?php 
			if($errormsg != "")
			{ 

			 ?>
			<h3 style="color:red;">
				<?php echo $errormsg; ?>
			</h3>
			<?php } ?>
		</div>
		<form method="POST" enctype="multipart/form-data">
			<fieldset class="border p-2">
		 		<legend  class="w-auto" style="font-size: 22px;font-family: bold;">Employee Details</legend>
		 		<div class="row">
				  <div class="col-md-2">
				  	<p style="text-align: right;">Employee Name <i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
					<input type="text" required="" name="employee_name" class="form-control"  value="" style="border-radius: 7px; background-color: #e1ebfc;">
				  </div>
				  <div class="col-md-2">
						<p style="text-align: right;">Employee ID<i class="required">*</i></p>
				  </div>
				  <div class="col-md-4">
					<input type="text" required="" class="form-control" name="employee_id" value="" style="border-radius: 7px; background-color: #e1ebfc;">
			      </div>
			     
			      
			    </div>
			    <br>
			    <div class="row">
				  <div class="col-md-2">
				  	<p style="text-align: right;">Department <i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
					<input type="text" required="" name="Department" class="form-control"  value="" style="border-radius: 7px; background-color: #e1ebfc;">
				  </div>
				  <div class="col-md-2">
						<p style="text-align: right;">Designation<i class="required">*</i></p>
				  </div>
				  <div class="col-md-4">
					<input type="text" required="" class="form-control" name="Designation" value="" style="border-radius: 7px; background-color: #e1ebfc;">
			      </div>
			     
			      
			    </div>
			    <br>
			    <div class="row">
				  <div class="col-md-2">
				  	<p style="text-align: right;">Date of Join <i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
					<input type="Date" required="" name="Date_of_Join" class="form-control"  value="" style="border-radius: 7px; background-color: #e1ebfc;">
				  </div>
				  <div class="col-md-2">
						<p style="text-align: right;">Role<i class="required">*</i></p>
				  </div>
				  <div class="col-md-4">
					<select name="Role" required="" class="form-control" style="border-radius: 7px; background-color: #e1ebfc;">
							<option value="">--Select--</option>
							<option value="Doctor">Doctor</option>
							<option value="Nurse">Nurse</option>
							<option value="Receptionist">Receptionist</option>
							<option value="Pharmacy">Pharmacy</option>
							<option value="Worker">Worker</option>
							<option value="Others">Others</option>
							
			    		</select>
			      </div>
			     
			      
			    </div>
			    <br>
			</fieldset>
	
		        <br>
		         
		    <fieldset class="border p-2">
		 		<legend  class="w-auto" style="font-size: 22px;font-family: bold;">Personal Details</legend>
		 		<div class="row">
				  <div class="col-md-2">
				  	<p style="text-align: right;">Aadhaar Number <i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
					<input type="text" required="" name="Aadhar_number" class="form-control"  value="" style="border-radius: 7px; background-color: #e1ebfc;">
				  </div>
				  <div class="col-md-2">
						<p style="text-align: right;">Father / Husband Name  <i class="required">*</i></p>
				  </div>
				  <div class="col-md-4">
					<input type="text" required="" class="form-control" name="relation_name" value="" style="border-radius: 7px; background-color: #e1ebfc;">
			      </div>
			  </div>
	
		        <br>
		         <div class="row">
				   <div class="col-md-2">
						<p style="text-align: right;">Gender<i class="required">*</i></p>
				  </div>
				  <div class="col-md-4">
						<select name="gender" required="" class="form-control" style="border-radius: 7px; background-color: #e1ebfc;">
							<option value="">--Select--</option>
							
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Transgender">Transgender</option>
			    		</select>
					</div>
				    <div class="col-md-2">
						<p style="text-align: right;">Blood Group</p>
					</div>
					<div class="col-md-4">
							<select name="blood_group" class="form-control" style="border-radius: 7px; background-color: #e1ebfc;">
							<option value="">--Select--</option>
							<option value="O-">O-</option>
							<option value="O+">O+</option>
							<option value="A-">A-</option>
							<option value="A+">A+</option>
							<option value="B-">B-</option>
							<option value="B+">B+</option>
							<option value="AB-">AB-</option>
							<option value="AB+">AB+</option>
							
			    			</select>
						
			            
			        </div>

</div>
		        
			   
			    <br>
			    <div class="row">
			    	 <div class="col-md-2">
						<p style="text-align: right;">Date of Birth<i class="required">*</i></p>
					</div>
					<div class="col-md-4">
						<input type="Date" required="" class="form-control" name="date_of_birth" value="" style="border-radius: 7px; background-color: #e1ebfc;">
			        </div>
			      
			        <div class="col-md-2">
						<p style="text-align: right;">Age<i class="required">*</i></p>
					</div>
					<div class="col-md-4">
						<input type="text" required="" class="form-control" name="age" value="" style="border-radius: 7px; background-color: #e1ebfc;">
			        </div>
			    </div>
			    <br>
			</fieldset>
			<br>
			<fieldset class="border p-2">
		 		<legend  class="w-auto" style="font-size: 22px;font-family: bold;">Contact Details</legend>
		 		<div class="row">
				  <div class="col-md-2">
						<p style="text-align: right;">Employee Mobile No.<i class="required">*</i></p>
					</div>
					<div class="col-md-4">
						<input type="text" required="" class="form-control" name="Employee_mobile_no" value="" style="border-radius: 7px; background-color: #e1ebfc;">
			        </div>
			      
			        <div class="col-md-2">
						<p style="text-align: right;">Emergency Mobile No.<i class="required">*</i></p>
					</div>
					<div class="col-md-4">
						<input type="text" required="" class="form-control" name="Emergency_mobile_no" value="" style="border-radius: 7px; background-color: #e1ebfc;">
			        </div>
			    </div>
			    <div class="row">
			        <div class="col-md-2">
						<p style="text-align: right;">Email<i class="required">*</i></p>
					</div>
					<div class="col-md-4">
						<input type="Email" required="" class="form-control" name="Email" value="" style="border-radius: 7px; background-color: #e1ebfc;">
			        </div>
			        <div class="col-md-2">
						<p style="text-align: right;">Pincode<i class="required">*</i></p>
					</div>
					<div class="col-md-4">
						<input type="text" required="" class="form-control" name="pincode" value="" style="border-radius: 7px; background-color: #e1ebfc;">
			        </div>
			    </div>
			    <br>
			     <div class="row">
			        <div class="col-md-2">
						<p style="text-align: right;">Address<i class="required">*</i></p>
					</div>
					<div class="col-md-4">
						<input type="text" required="" class="form-control" name="Address" value="" style="border-radius: 7px; background-color: #e1ebfc;">
			        </div>
			        <div class="col-md-2">
						<p style="text-align: right;">Land Mark</p>
					</div>
					<div class="col-md-4">
						<input type="text" class="form-control" name="Landmark" value="" style="border-radius: 7px; background-color: #e1ebfc;">
			        </div>
			    </div>
				<br>
			</fieldset>
			<br>
			<fieldset class="border p-2">
		 		<legend  class="w-auto" style="font-size: 22px;font-family: bold;">Upload Photo</legend>
		 		
		 		<div class="row">
		 			
		 			<div class="col-md-3">
							<p style="text-align: right;">Photo </p>
			    	</div>
			    	<div class="col-md-3">
						<input type="file" class="form-control" name="photo" value="" style="border-radius: 7px; background-color: #e1ebfc;">
					</div>
				</div>
				<br>
			</fieldset>
			<br>
	
<fieldset class="border p-2">
		 		<legend  class="w-auto" style="font-size: 22px;font-family: bold;">Login Credentials</legend>
		 		<div class="row">
				  <div class="col-md-3">
				  	<p style="text-align: right;">User Name <i class="required">*</i> </p>
				  </div> 
				  <div class="col-md-3">
					<input type="text" name="Username" required="" class="form-control"  value="" style="border-radius: 7px; background-color: #e1ebfc;">
				  </div>
				  <div class="col-md-3">
						<p style="text-align: right;">Password <i class="required">*</i>  </p>
				  </div>
				  <div class="col-md-3">
					<input type="password" class="form-control" required="" name="Password" value="" style="border-radius: 7px; background-color: #e1ebfc;">
			      </div>
				</div>
		        <br>
		        
		    </fieldset>



			<br>
		
		<br>
			<input type="checkbox" required="" name=""> I hereby declare that the details furnished above are true and correct to the best of my knowledge and belief and I undertake to inform you of any changes therein, immediately.
		
<br>
<br>

<div class="row">
	<div class="col-md-5">
		<a href="../Staff_Details/" class="btn btn-warning">Back</a>
	</div>
	<div class="col-md-2">
		<input type="submit" name="staffBtn" value="Register" class="btn btn-success form-control" ><br>
	</div>
		
	</div>
</form>
</div>

<br>
 <?php include '../footer.php' ?>

