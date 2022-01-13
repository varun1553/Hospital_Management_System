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

	<?php include 'header.php'; ?>
	<div class="container"><br>
		<h4 style="text-align: center ;font-family:'Arial Rounded MT Bold',Arial,Helvetica,sans-serif; font-weight: bold; ">Appointment</h4><br>
			<fieldset class="border p-2">
		 		<legend  class="w-auto" style="font-size: 22px;font-family: bold;">Appointment Details       </legend>
		 		<div class="row">
				  <div class="col-md-4">
				  	<p style="text-align: right;">Patient ID <i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
					<input type="text" name="Patient_id" class="form-control"  value="" style="border-radius: 7px; background-color: #e1ebfc;">
				  </div>			      
			    </div>
			    <br>
			    <div class="row">
				  <div class="col-md-4">
				  	<p style="text-align: right;">Token No. <i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
					<input type="text" name="Token_no." class="form-control"  value="" style="border-radius: 7px; background-color: #e1ebfc;">
				  </div>			      
			    </div>
			    <br>
			    <div class="row">
				  <div class="col-md-4">
				  	<p style="text-align: right;">Type<i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
				  	<select name="Type" class="form-control" style="border-radius: 7px; background-color: #e1ebfc;">
							<option>--Select--</option>
							
							
			    		</select>
					</div>
				</div>
				<br>
				<div class="row">
				  <div class="col-md-4">
				  	<p style="text-align: right;">Doctor<i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
				  	<select name="Doctor" class="form-control" style="border-radius: 7px; background-color: #e1ebfc;">
							<option>--Select--</option>
							
							
			    		</select>
					</div>
				</div>
				<br>
				<div class="row">
				  <div class="col-md-4">
				  	<p style="text-align: right;">Fees <i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
					<input type="text" name="Fees" class="form-control"  value="" style="border-radius: 7px; background-color: #e1ebfc;">
				  </div>			      
			    </div>
			    <br>
			    <div class="row">
				  <div class="col-md-4">
				  	<p style="text-align: right;">Validity Period <i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
					<input type="text" name="Validity_Period" class="form-control"  value="" style="border-radius: 7px; background-color: #e1ebfc;">
				  </div>			      
			    </div>
			    <br>
			    <div class="row">
				  <div class="col-md-4">
				  	<p style="text-align: right;">Time Slots <i class="required">*</i></p>
				  </div> 
				  <div class="col-md-4">
					<input type="text" name="Time_slots" class="form-control"  value="" style="border-radius: 7px; background-color: #e1ebfc;">
				  </div>			      
			    </div>
			    <br>
			</fieldset>
		</div>
		<br>
		<div class="row">
	<div class="col-md-5"></div>
	<div class="col-md-2">
		<input type="submit" name="" value="Submit" class="btn btn-success form-control" ><br>
	</div>
		
	</div>
</div>

<br>
 <?php include 'footer.php' ?>


