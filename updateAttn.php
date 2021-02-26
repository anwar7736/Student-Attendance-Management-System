 <?php 
	require_once 'oop.php';
	$user = new Students();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body class="bg-secondary">
	<div class="container mt-4" style="width: 50%">
		<div class="card">
			<div class="card-header bg-dark text-white">
				<h2 class="text-center"><strong>Student Attendance System</strong></h2>
				<h4 class="text-center text-danger bg-light py-2">Current Date : <?php echo date('d-m-Y');?></h4>
			</div>
		</div>
		<div class="card-body bg-primary">
			<div class="alert alert-success">
				<strong>Success : </strong>Today Attendance data inserted successfully..
			</div>
			<a href="add.php" class="btn btn-info">Add Student</a>
			<a href="view.php" class="btn btn-danger" style="float:right">Back</a>
			<br><br>
			<form method="POST" action="">
				<table class="table table-bordered table-striped mt-3 bg-warning">
					<thead class="text-center">
						<tr>
							<th>Sl.</th>
							<th>Student Name</th>
							<th>Student Roll</th>
							<th>Attendance</th>
						</tr>
					</thead>

					<tbody class="text-center" id="table_body">
					
					
					</tbody>

				</table>
				<input type="submit" id="submitBtn" name="submitBtn" value="Update" class="btn btn-success">
				</form>
		</div>
		
	</div>
		<script type="text/javascript">
		$(document).ready(function(){
			
			})
	</script>
</body>
</html>

