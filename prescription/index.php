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
	}
	else
	{
		header('Location:../Appointment_Details/');
	}

if(isset($_POST['btnn']))
{
	$patient_id = $row['Patient_Id'];
	$r_dv_sph = $_POST['sph1'];
	$r_dv_cyl = $_POST['cyl1'];
	$r_dv_axis = $_POST['axis1'];
	$r_dv_vision = $_POST['vision1'];
	$r_add_sph = $_POST['sph2'];
	$r_add_cyl = $_POST['cyl2'];
	$r_add_axis = $_POST['axis2'];
	$r_add_vision = $_POST['vision2'];
	$l_dv_sph = $_POST['sph3'];
	$l_dv_cyl = $_POST['cyl3'];
	$l_dv_axis = $_POST['axis3'];
	$l_dv_vision = $_POST['vision3'];
	$l_add_sph = $_POST['sph4'];
	$l_add_cyl = $_POST['cyl4'];
	$l_add_axis = $_POST['axis4'];
	$l_add_vision = $_POST['vision4'];
	$ipd = $_POST['ipd'];
	$admit = $_POST['admit'];
	$Id  = $_GET['id'];
	$advice = $_POST['advice'];
	$advice = implode(',',$advice);

	$req = $row['Patient_Id'];

	$query3 = mysqli_query($conn,"INSERT INTO prescription(patient_id,r_dv_sph,r_dv_cyl,r_dv_axis,r_dv_vision,r_add_sph,r_add_cyl,r_add_axis,r_add_vision,l_dv_sph,l_dv_cyl,l_dv_axis,l_dv_vision,l_add_sph,l_add_cyl,l_add_axis,l_add_vision,ipd,admit,advice)VALUES('$patient_id','$r_dv_sph','$r_dv_cyl','$r_dv_axis','$r_dv_vision','$r_add_sph','$r_add_cyl','$r_add_axis','$r_add_vision','$l_dv_sph','$l_dv_cyl','$l_dv_axis','$l_dv_vision','$l_add_sph','$l_add_cyl','$l_add_axis','$l_add_vision','$ipd','$admit','$advice')");

	$query4 = mysqli_query($conn,"UPDATE appointment_details SET op_status=0 WHERE Patient_Id = '$req'");

	if ($query3) {
  	header("Location:../prescription_details/?success&id=".$Id);
  }
  else{
  	echo "Not inserted <br> ".mysqli_error($conn);
  }
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
		<form method="post">
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
	            		
	            		<td><input class="form-control" type="text" name="sph1" style="width:130px;height:100%;"> </td>
	            		<td><input class="form-control" type="text" name="cyl1" style="width:130px;height:100%;"> </td>
	            		<td><input class="form-control" type="text" name="axis1" style="width:130px;height:100%;"> </td>
	            		<td><input type="text" class="form-control" name="vision1" style="width:130px;height:100%;"> </td>
	            	</tr>
	            	<tr>
	            		
	            		<td><input type="text" class="form-control" name="sph2" style="width:130px;height:100%;"></td>
	            		<td><input type="text" class="form-control" name="cyl2" style="width:130px;height:100%;"></td>
	            		<td><input type="text" class="form-control" name="axis2" style="width:130px;height:100%;"></td>
	            		<td><input type="text" class="form-control" name="vision2" style="width:130px;height:100%;"></td>
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
	            		<td><input type="text" class="form-control" name="sph3" style="width:130px;height:100%;"> </td>
	            		<td><input type="text" class="form-control" name="cyl3" style="width:130px;height:100%;"> </td>
	            		<td><input type="text" class="form-control" name="axis3" style="width:130px;height:100%;"> </td>
	            		<td><input type="text" class="form-control" name="vision3" style="width:130px;height:100%;"> </td>
	            	</tr>
	            	<tr>
	            		<td><input type="text" class="form-control" name="sph4" style="width:130px;height:100%;"> </td>
	            		<td><input type="text" class="form-control" name="cyl4" style="width:130px;height:100%;"> </td>
	            		<td><input type="text" class="form-control" name="axis4" style="width:130px;height:100%;"> </td>
	            		<td><input type="text" class="form-control" name="vision4" style="width:130px;height:100%;"> </td>
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
			<div class="col-md-8 " style="border: 1px solid black; width: 100%" >
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" name="advice[]" id="inlineCheckbox1" value="Glass">
				  <label class="form-check-label" for="inlineCheckbox1">Glass</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" name="advice[]" id="inlineCheckbox2" value="PolyCarbonate">
				  <label class="form-check-label" for="inlineCheckbox2">PolyCarbonate</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" name="advice[]" id="inlineCheckbox3" value="CR 39" >
				  <label class="form-check-label" for="inlineCheckbox3">CR 39</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" name="advice[]" id="inlineCheckbox4" value="Unifocal">
				  <label class="form-check-label" for="inlineCheckbox14">Unifocal</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" name="advice[]" id="inlineCheckbox5" value="'D'Bifocal">
				  <label class="form-check-label" for="inlineCheckbox5">"D"Bifocal</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" name="advice[]" id="inlineCheckbox6" value="Kryptok">
				  <label class="form-check-label" for="inlineCheckbox6">Kryptok</label>
				</div><br>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" name="advice[]" id="inlineCheckbox11" value="Progressive">
				  <label class="form-check-label" for="inlineCheckbox11">Progressive</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" name="advice[]" id="inlineCheckbox12" value="Office Lens">
				  <label class="form-check-label" for="inlineCheckbox12">Office Lens</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" name="advice[]" id="inlineCheckbox13" value="Tint">
				  <label class="form-check-label" for="inlineCheckbox13">Tint</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" name="advice[]" id="inlineCheckbox14" value="Photochromic">
				  <label class="form-check-label" for="inlineCheckbox14">Photochromic</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" name="advice[]" id="inlineCheckbox15" value="ARC">
				  <label class="form-check-label" for="inlineCheckbox15">ARC</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" name="advice[]" id="inlineCheckbox16" value="SRC">
				  <label class="form-check-label" for="inlineCheckbox16">SRC</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" name="advice[]" id="inlineCheckbox17" value="Polarised">
				  <label class="form-check-label" for="inlineCheckbox17">Polarised</label>
				</div>
				
			</div>

			<div class="col-md-1" style="text-align: right;"><h5>IPD</h5></div>
			<div class="col-md-1" >
				<input type="text" class="form-control" name="ipd" style="width:170px;padding-left:0px;height:50px;text-align: left;"> 
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-md-2">
				<h5>Doctor Name : </h5>
			</div>
			<div class="col-md-2"> <h5><?php echo $row['Doctor']; ?></h5></div>
			<div class="col-md-2"></div>
			<div class="col-md-3"><h5>Doctor's Signature : </h5></div>
			<div class="col-md-3" style="font-family: italic;"><h5><?php echo $row['Doctor']; ?></div>

		</div>
		<br>
		<br>

		<div class="row">
			<div class="col-md-3">
				<div class="form-check">
				  <input class="form-check-input" type="checkbox" name="admit" value="Yes" id="check" required="">
				  <label class="form-check-label" for="check">
				    <h5>Admit</h5>(Check the box to Admit)
				  </label>
				</div>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-2">
				<button type="Submit" name="btnn" class="btn btn-primary form-control">Submit</button>
			</div>
		</div>
		<br>

		<div class="row">
			<div class="col-md-2">
				<a href="../Appointment_Details/" class="btn btn-warning">Back</a>
			</div>
		</div>
	</form>
	</div>
	<br>


	<?php include '../footer.php'; ?>
</body>
</html>