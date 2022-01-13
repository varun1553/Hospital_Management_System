<?php 
session_start();

if(!isset($_SESSION['username']))
{
	header("Location:../logout.php");
}

   include '../dbConfig.php';
	if(isset($_GET['id']))
	{
		$id  = $_GET['id'];
		$query = "select * from patient_registration where id = '$id'";
		$result1 = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result1);
	}
	else
	{
		header('Location:../Patient_Details/');
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>SRI-AROGYA | PATIENT PROFILE</title>

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

	<?php include '../header.php'; ?>
	<div class="container"><br>
		<h4 style="text-align: center ;font-family:'Arial Rounded MT Bold',Arial,Helvetica,sans-serif; font-weight: bold; ">Patient Details</h4><br>
		<h5 style="text-align: right;">Patient ID : <b style="color:orange;"> GPM/<?php echo $row['Patient_Id']; ?> </b> </h5><br>
			<fieldset class="border p-2">
		 		<legend  class="w-auto" style="font-size: 22px;font-family: bold;">Profile Details</legend>
		 		
		 		
		 		<div class="row">
		 			<div class="col-md-12">
		 			<table class="table table-bordered">
		 			<tr>
			
				  	<td  width="25%" style="text-align: right;">Full Name : </td>
				  
				
					<th width="25%"  colspan="3"><?php echo $row['Patient_Name']; ?></th>
				 	
					<td width="25%" rowspan="4"><img src="<?php echo $row['Photo']; ?>" style="height: 170px;width: 170px;" alt="Upload a Photo"></td>
					
				</tr>
				<tr>
		       <td  width="25%" style="text-align: right;">Father/Husband Name : </td>
					
					<th width="25%" ><?php echo $row['Relation_Name']; ?></th>
						<td width="25%" style="text-align: right;">Gender : </td>
						<th width="25%" ><?php echo $row['Gender']; ?></th>
						
			        
			    </tr>
			     
		       <tr>
		       	<td  width="25%" style="text-align: right;">Aadhaar Number : </td>
				
					<th width="25%" ><?php echo $row['Aadhar_Number']; ?></th>
						
		       <td  width="25%" style="text-align: right;">Blood Group : </td>
				
					<th width="25%" ><?php echo $row['Blood_Group']; ?></th>
						
			        
			    </tr>
			    <tr>
					<td width="25%" style="text-align: right;">Date of Birth : </td>
						<th width="25%" ><?php echo $row['Date_of_Birth']; ?></th>
						
  
				  <td  width="25%" style="text-align: right;">Age : </td>
					<th width="25%" ><?php echo $row['Age']; ?></th>
				</tr>
			    <tr>
					<td width="25%" style="text-align: right;"> Address :</td>
				        <th width="25%" colspan="4"><?php echo $row['Address']; ?></th>
  
				 </tr>
				 <tr>
					<td width="25%" style="text-align: right;">Land Mark :</td>
				        <th width="25%" colspan="4"><?php echo $row['Landmark']; ?></th>
				  </tr>
				<tr>
					 <td  width="25%" style="text-align: right;">Pincode : </td>
					<th width="25%" ><?php echo $row['Pincode']; ?></th>
				
					<td width="25%" style="text-align: right;"> Mobile No. :</td>
				        <th width="25%"colspan="2" ><?php echo $row['Mobile_Number']; ?></th>
  
				</tr>
				<tr>
					<td  width="25%" style="text-align: right;">Emergency Mobile No. : </td>
					<th width="25%"  ><?php echo $row['Emergency_Mobile_Number']; ?></th>
					<td width="25%" style="text-align: right;"> Email</td>
				        <th width="25%" colspan="2" ><?php echo $row['Email']; ?></th>		
				  
				</tr>
				 
			     </table>
			 </div>
			</div>
	
		    </fieldset>
		    <div class="text-center">
		    <a href="../Patient_Profile" class="btn btn-primary mt-3 ">Back to Details Page</a>
		</div>
		    <br>
		    
		<br>
</div>
<br>

<br>
 <?php include '../footer.php' ?>
		    





