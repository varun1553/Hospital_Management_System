<?php date_default_timezone_set("Asia/kolkata") ?>
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
				background-image: url('bg1.jpg');
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
	<?php include 'header.php'; ?>
	<br>
		<h4 style="text-align: center;">Patient Details</h4><br>
		<h5 style="text-align: right;"> <b style="color:orange;">  <?php echo date('d-M-Y h:i A'); ?></b> </h5><br>
		
			<div class="container">
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
							<th>Profile</th>
							
						</tr>
						<tr>
							<td>1</td>
							<td>GPM/1234567897</td>
							<td>Kiran seelam</td>
							<td>Giriprasad</td>
							<td>Male</td>
							<td>31</td>
							<td>7675920722</td>
							<td><input type="submit" name="" value="View" class="btn btn-primary form-control"></td>
							
						</tr>
						
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							
						</tr>
						
							</table>
					</div>	
					
				</div>	
			</div>
	<br>
	<br>
    <br>
    <br>
	<?php include 'footer.php'; ?>

	
</body>
</html>