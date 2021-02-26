 <?php 
	require_once 'oop.php';
	$user = new Students();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>Update Attendance</title>
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
		<?php 
			error_reporting(0);
			if ($_SERVER['REQUEST_METHOD']=='POST')
			{
				$attend = $_POST['attend'];
				$dt = $_GET['date'];
				$msg = $user->updateAttend($dt,$attend);
			}

		?>

		<div class="card">
			<div class="card-header bg-success text-white">
				<h2 class="text-center"><strong>Student Attendance System</strong></h2>
				<h4 class="text-center text-danger bg-light py-2">Date : <?php  echo $_GET['date'];?></h4>
			</div>
		</div>
		<div class="card-body bg-dark">
			<?php 
				if (isset($msg))
					{
						echo $msg;
					}
			?>
			<a href="home.php" class="btn btn-warning">Take Attendance</a>
			<a href="view.php" class="btn btn-danger" style="float:right">Back</a>
			<br><br>
			<form method="POST">
				<table class="table table-bordered table-striped mt-3 bg-info">
					<thead class="text-center">
						<tr>
							<th>Sl.</th>
							<th>Student Roll</th>
							<th>Attendance</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php 	
							$dt = $_GET['date'];						
							$i=0;
							foreach ($user->ReadByDate($dt) as $key => $value) {$i++;?>			
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $value['roll']; ?></td>
									<td>
										<input type="radio" name="attend[<?php echo $value['roll'];?>]" value="present" <?php if($value['attend']=='present'){ echo  'checked';} ?> >P
										<input type="radio" name="attend[<?php echo $value['roll'];?>]" value="absent" <?php if($value['attend']=='absent'){ echo  'checked';} ?> >A
									</td>
								</tr>

							<?php } ?>

						
					
					</tbody>

				</table>
				<input type="submit" id="updatebtn" name="updatebtn" value="Update" class="btn btn-success">
				</form>
		</div>
		
	</div>
</body>
</html>

