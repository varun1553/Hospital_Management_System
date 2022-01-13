<?php 
include '../dbConfig.php';

$errormsg = "";
session_start();
if(!isset($_SESSION['username']))
{
	header("Location:../logout.php");
}

if(isset($_POST['RegisterBtn']))
{
	$errors = array();
	$filename = $_FILES['photo']['name'];
  
  $patient_name = $_POST['patient_name'];
  $patient_id = $_POST['patient_id'];
  $adhar_number = $_POST['Aadhar_number'];
  $relation_name = $_POST['relation_name'];
  $gender = $_POST['gender'];
  $blood_group = $_POST['blood_group'];
  $date_of_birth = $_POST['date_of_birth'];
  $age = $_POST['age'];
  $mobile_number = $_POST['mobile_no'];
  $emergency_mobile_number = $_POST['Emergency_mobile_no'];
  $email = $_POST['Email'];
  $pincode = $_POST['pincode'];
  $address = $_POST['Address'];
  $landmark = $_POST['Landmark'];
  $created_by  = $_SESSION['userid'];
  $created_datetime = date('Y-m-d H:i:s');

  if($filename=='')
  {
  	$query = mysqli_query($conn,"INSERT INTO patient_registration(Patient_Name,Patient_Id,Aadhar_Number,Relation_Name,Gender,Blood_Group,Date_of_Birth,Age,Mobile_Number,Emergency_Mobile_Number,Email,Pincode,Address,Landmark,created_by,created_datetime)VALUES('$patient_name','$patient_id','$adhar_number','$relation_name','$gender','$blood_group','$date_of_birth','$age','$mobile_number','$emergency_mobile_number','$email','$pincode','$address','$landmark','$created_by','$created_datetime')");

	  if ($query) 
	  {
	  	header("Location:../Patient_Details/?success");
	  }
	  else
	  {
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
  			is_dir("../Img/Patient") || mkdir("../Img/Patient","0777",true);
  			move_uploaded_file($file_tmp , "../Img/Patient/".$patient_name.".".$file_ext);
  			$photo = "../Img/Patient/".$patient_name.".".$file_ext;

  			$query = mysqli_query($conn,"INSERT INTO patient_registration(Patient_Name,Patient_Id,Aadhar_Number,Relation_Name,Gender,Blood_Group,Date_of_Birth,Age,Mobile_Number,Emergency_Mobile_Number,Email,Pincode,Address,Landmark,created_by,created_datetime,Photo)VALUES('$patient_name','$patient_id','$adhar_number','$relation_name','$gender','$blood_group','$date_of_birth','$age','$mobile_number','$emergency_mobile_number','$email','$pincode','$address','$landmark','$created_by','$created_datetime','$photo')");

		  if ($query) {
		  	header("Location:../Patient_Details/?success");
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
	<title>SRI-AROGYA | Patient Registration</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
		<h4 style="text-align: center ;font-family:'Arial Rounded MT Bold',Arial,Helvetica,sans-serif; font-weight: bold; ">Patient Registration</h4><br>
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
		<form method="post" enctype="multipart/form-data">
			<fieldset class="border p-2">
		 		<legend  class="w-auto" style="font-size: 22px;font-family: bold;">Patient Details</legend>
		 		<div class="row">
				  <div class="col-md-2">
				  	<p style="text-align: right;">Patient Name <i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
					<input type="text" required="" name="patient_name" class="form-control"  value="" style="border-radius: 7px; background-color: #e1ebfc;">
				  </div>
				  <div class="col-md-2">
						<p style="text-align: right;">Patient ID<i class="required">*</i></p>
				  </div>
				  <div class="col-md-4">
					<input type="text" required="" class="form-control" name="patient_id" value="" style="border-radius: 7px; background-color: #e1ebfc;" >
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
						<p style="text-align: right;">Mobile No.<i class="required">*</i></p>
					</div>
					<div class="col-md-4">
						<input type="text" required="" class="form-control" name="mobile_no" value="" style="border-radius: 7px; background-color: #e1ebfc;">
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
						<p style="text-align: right;">Email</p>
					</div>
					<div class="col-md-4">
						<input type="Email" class="form-control" name="Email" value="" style="border-radius: 7px; background-color: #e1ebfc;">
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
							<p style="text-align: right;">Photo</p>
			    	</div>
			    	<div class="col-md-3">
						<input type="file" class="form-control" name="photo" value="" style="border-radius: 7px; background-color: #e1ebfc;">
					</div>
				</div>
				<br>
			</fieldset>
			<br>
			<div class="row">
				<div class="col-md-5">
					<a href="../Patient_Details/" class="btn btn-warning">Back</a>
				</div>
				<div class="col-md-2">
					<input type="submit" name="RegisterBtn" value="Register" class="btn btn-success form-control" ><br>
				</div>
					
			</div>
			</form>
			</div>


</div>

<br>
<?php include '../footer.php' ?>

