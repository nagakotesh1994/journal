<?php
    session_start();
   /* if(isset($_SESSION['email']))
      header("Location: dashboard.php");*/

    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Document</title>
	    <?php include 'lib_files.php';?>
	</head>
	<body>
		<?php include 'headerinfo.php';?>
  		<?php include 'menu_admin.php';?>
  		
		<div class="container-fluid banner">
			<div class="row">
				<div class="col-12">
					<h3 class="text-center">Admins List</h3><br>
					<!--<p class="text-center">Check your articles status you uploaded</p>-->
				</div>
			</div>
		</div>

	<div class="container-fluid">
		<div class="row shadow p-3 mb-5 bg-white rounded">
			<div class="col">
				<br>
				<div class="table-responsive-xl">
					<table align='center' id='myTable' class='display table' style='width:100%'>
									<thead>
										<tr>
											<th>No</th>
											<th>Full_Name</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Password</th>
											<th>Reg_Date</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$sql="SELECT * FROM `tnk_admin`";
										$result = $conn->query($sql);
										while ($row = mysqli_fetch_array($result)) {
											echo "<tr><td>".$row['id']."</td><td>".$row['full_name']."</td><td>".$row['email']."</td><td>".$row['country_code']." ".$row['phone']."</td><td>".$row['password']."</td><td>".$row['reg_date']."</td></tr>";
										}
									?>
									</tbody>
										<tfoot>
											<tr>
												<th>No</th>
												<th>Full_Name</th>
												<th>Email</th>
												<th>Phone</th>
												<th>Password</th>
												<th>Reg_Date</th>
											</tr>
										</tfoot>
									</table>
				</div>
			</div>
		</div>
	</div>

	
	<script type="text/javascript">
		$(document).ready( function () {
    		$('#myTable').DataTable( {
			    responsive: true,
			    
			} );
		} );
	</script>



  	</body>
</html>