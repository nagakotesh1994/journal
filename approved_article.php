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
				<h3 class="text-center">Inprocess Article</h3><br>
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
											<th>Article_Title</th>
											<th>Article_Id</th>
											<th>Manuscript</th>
											<th>Copyright</th>
											<th>Article_Status</th>
											<th>Uploaded_Date</th>
											<th>Approved_Date</th>
											<th>Refuse</th>
											
										</tr>
									</thead>
									<tbody>
				
						<?php
							$user_id= $_SESSION['id'];
							$Article_Status;
							$Article_Id_Status;
							$Approved_Date;
							$sql = "SELECT * FROM `tnk_articles` WHERE `user_id`='$user_id' AND `approved_or_not`='1'";
							$result = $conn->query($sql);
							while ($row = mysqli_fetch_array($result)) {
								$article_no=$row['article_no'];
								if($row['approved_or_not']==0)
									$Article_Status="Under Process";
								else
									$Article_Status="Approved";

								if($row['article_id']=="")
									$Article_Id_Status="Under Process";
								else
									$Article_Id_Status="";

								if($row['approved_date']=="")
									$Approved_Date="Under Process";
								else
									$Approved_Date=$row['approved_date'];



								echo "

									<tr>
										<td>
											<button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#collapse".$row['article_no']."' aria-expanded='false' aria-controls='collapse".$row['article_no']."'> 	<i class='fa fa-plus-circle' aria-hidden='true'></i></button>
										".$row['article_no']."</td>
										<td>".$row['article_title']."</td>
										<td>".$Article_Id_Status."</td>
										<td><a href='upload/".$row['manu_script']."'>ManuScript</a></td>
										<td><a href='upload/".$row['copy_right']."'>Copyright</a></td>
										<td>".$Article_Status."</td><td>".$row['uploaded_date']."</td>
										<td>".$Approved_Date."</td>
										<td><a class='btn btn-primary btn-sm' href='refuse.php?id=".$row['id']."'>Refuse</a></td>
										
									</tr>
									<tr>
										<td colspan='10'>
											  	<div class='collapse' id='collapse".$row['article_no']."'>
												  	<div class='card card-body'>";
												    
												    $sql1 = "SELECT * FROM `tnk_supplementary_file` WHERE `user_id`='".$_SESSION['id']."' AND `article_no`='".$row['article_no']."'";
												    $result1 = $conn->query($sql1);
												    $i=0;
												    echo "<table>";
												    while ($row1 = mysqli_fetch_array($result1)) {
												    	echo "<tr><td><a href='upload/".$row1['supplementary_file']."'>Supplementary_File_".($i+1)."</a></td></tr>";
												    	$i++;
												    }
												    echo "</table>";
													echo "</div>
												</div>
										</td>
										
									</tr>";		
							}
						?>
							</tbody>
										<tfoot>
											<tr>
												<th>No</th>
												<th>Article_Title</th>
												<th>Article_Id</th>
												<th>Manuscript</th>
												<th>Copyright</th>
												<th>Article_Status</th>
												<th>Uploaded_Date</th>
												<th>Approved_Date</th>
												<th>Refuse</th>
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