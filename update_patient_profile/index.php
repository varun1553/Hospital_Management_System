<?php 
include '../dbConfig.php';

session_start();
if(!isset($_SESSION['username']))
{
	header("Location:../logout.php");
}

if(isset($_GET['id']))
{
	$rid = $_GET['id'];
	$squery = "SELECT * FROM patient_registration WHERE id='$rid'";
	$row5 = mysqli_fetch_array(mysqli_query($conn,$squery));
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
  $updated_by  = $_SESSION['userid'];
  $updated_datetime = date('Y-m-d H:i:s');


  if($filename=='')
  {
  	$query = mysqli_query($conn,"UPDATE patient_registration SET Patient_Name='$patient_name',Patient_Id='$patient_id',Aadhar_Number='$adhar_number',Relation_Name='$relation_name',Gender='$gender',Blood_Group='$blood_group',Date_of_Birth='$date_of_birth',Age='$age',Mobile_Number='$mobile_number',Emergency_Mobile_Number='$emergency_mobile_number',Email='$email',Pincode='$pincode',Address='$address',Landmark='$landmark',updated_by='$updated_by',updated_datetime='$updated_datetime' WHERE id='$rid'");

	  if ($query) 
	  {
	  	header("Location:../Patient_Details/");
	  }
	  else
	  {
	  	echo "Not inserted <br> ".mysqli_error($conn);
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

  			$query = mysqli_query($conn,"UPDATE patient_registration SET Patient_Name='$patient_name',Patient_Id='$patient_id',Aadhar_Number='$adhar_number',Relation_Name='$relation_name',Gender='$gender',Blood_Group='$blood_group',Date_of_Birth='$date_of_birth',Age='$age',Mobile_Number='$mobile_number',Emergency_Mobile_Number='$emergency_mobile_number',Email='$email',Pincode='$pincode',Address='$address',Landmark='$landmark',updated_by='$updated_by',updated_datetime='$updated_datetime',Photo='$photo' WHERE id='$rid'");
		  if ($query) {
		  	header("Location:../Patient_Details/");
		  }
		  else{
		  	echo "Not inserted <br> ".mysqli_error($conn);
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
		<form method="post" enctype="multipart/form-data">
			<fieldset class="border p-2">
		 		<legend  class="w-auto" style="font-size: 22px;font-family: bold;">Patient Details</legend>
		 		<div class="row">
				  <div class="col-md-2">
				  	<p style="text-align: right;">Patient Name <i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
					<input type="text" required="" name="patient_name" class="form-control"  value="<?php echo $row5['Patient_Name']; ?>" style="border-radius: 7px; background-color: #e1ebfc;">
				  </div>
				  <div class="col-md-2">
						<p style="text-align: right;">Patient ID<i class="required">*</i></p>
				  </div>
				  <div class="col-md-4">
					<input type="text" required="" class="form-control" name="patient_id" value="<?php echo $row5['Patient_Id']; ?>" style="border-radius: 7px; background-color: #e1ebfc;" >
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
					<input type="text" required="" name="Aadhar_number" class="form-control"  value="<?php echo $row5['Aadhar_Number']; ?>" style="border-radius: 7px; background-color: #e1ebfc;">
				  </div>
				  <div class="col-md-2">
						<p style="text-align: right;">Father / Husband Name  <i class="required">*</i></p>
				  </div>
				  <div class="col-md-4">
					<input type="text" required="" class="form-control" name="relation_name" value="<?php echo $row5['Relation_Name']; ?>" style="border-radius: 7px; background-color: #e1ebfc;">
			      </div>
			  </div>
	
		        <br>
		         <div class="row">
				   <div class="col-md-2">
						<p style="text-align: right;">Gender<i class="required">*</i></p>
				  </div>
				  <div class="col-md-4">
						<select name="gender" required="" class="form-control" style="border-radius: 7px; background-color: #e1ebfc;">
							<option value="<?php echo $row5['Gender']; ?>"><?php echo $row5['Gender']." *"; ?></option>
							
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
							<option value="<?php echo $row5['Blood_Group']; ?>"><?php echo $row5['Blood_Group']." *"; ?></option>
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
						<input type="Date" required="" class="form-control" name="date_of_birth" value="<?php echo $row5['Date_of_Birth']; ?>" style="border-radius: 7px; background-color: #e1ebfc;">
			        </div>
			      
			        <div class="col-md-2">
						<p style="text-align: right;">Age<i class="required">*</i></p>
					</div>
					<div class="col-md-4">
						<input type="text" required="" class="form-control" name="age" value="<?php echo $row5['Age']; ?>" style="border-radius: 7px; background-color: #e1ebfc;">
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
						<input type="text" required="" class="form-control" name="mobile_no" value="<?php echo $row5['Mobile_Number']; ?>" style="border-radius: 7px; background-color: #e1ebfc;">
			        </div>
			      
			        <div class="col-md-2">
						<p style="text-align: right;">Emergency Mobile No.<i class="required">*</i></p>
					</div>
					<div class="col-md-4">
						<input type="text" required="" class="form-control" name="Emergency_mobile_no" value="<?php echo $row5['Emergency_Mobile_Number']; ?>" style="border-radius: 7px; background-color: #e1ebfc;">
			        </div>
			    </div>
			    <div class="row">
			        <div class="col-md-2">
						<p style="text-align: right;">Email</p>
					</div>
					<div class="col-md-4">
						<input type="Email" class="form-control" name="Email" value="<?php echo $row5['Email']; ?>" style="border-radius: 7px; background-color: #e1ebfc;">
			        </div>
			        <div class="col-md-2">
						<p style="text-align: right;">Pincode<i class="required">*</i></p>
					</div>
					<div class="col-md-4">
						<input type="text" required="" class="form-control" name="pincode" value="<?php echo $row5['Pincode']; ?>" style="border-radius: 7px; background-color: #e1ebfc;">
			        </div>
			    </div>
			    <br>
			     <div class="row">
			        <div class="col-md-2">
						<p style="text-align: right;">Address<i class="required">*</i></p>
					</div>
					<div class="col-md-4">
						<input type="text" required="" class="form-control" name="Address" value="<?php echo $row5['Address']; ?>" style="border-radius: 7px; background-color: #e1ebfc;">
			        </div>
			        <div class="col-md-2">
						<p style="text-align: right;">Land Mark</p>
					</div>
					<div class="col-md-4">
						<input type="text" class="form-control" name="Landmark" value="<?php echo $row5['Landmark']; ?>" style="border-radius: 7px; background-color: #e1ebfc;">
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
						<input type="file" class="form-control" name="photo" value="<?php echo $row5['Photo']; ?>" style="border-radius: 7px; background-color: #e1ebfc;">
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

