<?php 
	require_once 'oop.php';
	$user = new Students();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>Add Student</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body class="bg-dark">
	<div class="container mt-4" style="width: 50%">
		<div class="card">
			<?php 
				
				if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['addBtn'])) {
					$msg = $user->AddStudent($_POST);
				}

			?>
			<div class="card-header text-center bg-info text-light">
				<h2>Add New Student</h2>	
				<h4 class="text-center text-danger bg-light py-2">Current Date : <?php echo date('d-m-Y');?></h4>		
			</div>
			<div class="card-body">
				<?php 
					if(isset($msg)){
						echo $msg;
					}
				?>					
				<a href="home.php" class="btn btn-danger" style="float:right">Back</a><br>
				<form method="POST">
					<div class="form-group">
						<strong><label for="sid">Student Roll Number</label></strong>
						<input type="text" class="form-control" name="roll" placeholder="Enter student roll number...">
					</div>
					<div class="form-group">
						<strong><label for="name">Student Name</label></strong>
						<input type="text" class="form-control" name="name" id="name" placeholder="Enter student name...">
					</div>
					<input type="submit" name="addBtn" value="Submit" class="btn btn-success">
				</form>		
				</div>
			
			</div>			
			</div>
		</div>
		
	</div>
<script type="text/javascript">
		$(document).ready(function(){

			})
	</script>
</body>
</html>

