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
		<script type="text/javascript">
			$(document).ready(function(){
				$("form").submit(function(){
					var roll = true;
					$(':radio').each(function(){
						name = $(this).attr('name');
						if(roll && !$(':radio[name="'+ name +'"]:checked').length){
							alert('Student roll number missing');
							roll = false;
						}
					});
				});
				});
		</script>
		<?php 
			error_reporting(0);
			if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submitBtn'])) 
			{
				$attend = $_POST['attend'];
				$msg = $user->insertAttend($attend);
			}

		?>

		<div class="card">
			<div class="card-header bg-success text-white">
				<h2 class="text-center"><strong>Student Attendance System</strong></h2>
				<h4 class="text-center text-danger bg-light py-2">Current Date : <?php echo date('d-m-Y');?></h4>
			</div>
		</div>
		<div class="card-body bg-dark">
			<?php 
				if (isset($msg))
					{
						echo $msg;
					}
			?>
			<div class="alert alert-danger" style="display:none"><strong>Error : </strong>Student roll number missing..</div>
			<a href="add.php" class="btn btn-primary">Add Student</a>
			<a href="view.php" class="btn btn-danger" style="float:right">View All</a>
			<br><br>
			<form method="POST" action="">
				<table class="table table-bordered table-striped mt-3 bg-info">
					<thead class="text-center">
						<tr>
							<th>Sl.</th>
							<th>Student Name</th>
							<th>Student Roll</th>
							<th>Attendance</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php 
							$i=0;
							foreach ($user->ReadAll() as $key => $value) {$i++;	?>			
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $value['name']; ?></td>
									<td><?php echo $value['roll']; ?></td>
									<td>
										<label class="form-check-label"><input type="radio" name="attend[<?php echo $value['roll'];?>]" value="present">P</label>
										<label class="form-check-label"><input type="radio" name="attend[<?php echo $value['roll'];?>]" value="absent">A</label>
									</td>
								</tr>

							<?php } ?>

						
					
					</tbody>

				</table>
				<input type="submit" id="submitBtn" name="submitBtn" value="Submit" class="btn btn-success">
				</form>
		</div>
		
	</div>
</body>
</html>

