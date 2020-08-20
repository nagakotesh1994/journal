<?php
	session_start();
	include 'connect.php';
	include 'tnk_articles_table.php';
	include 'tnk_supplementary_file_table.php';





	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		


		// Count total files
		$countfiles = count($_FILES['supplementary']['name']);
		 
		// Looping all files
		for($i=0;$i<$countfiles;$i++)
		{
			$supplementary_file = $_FILES['supplementary']['name'][$i];
			// Upload file
			move_uploaded_file($_FILES['supplementary']['tmp_name'][$i],'upload/'.$supplementary_file);
	 	}

	}
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title></title>
	<style type="text/css">
		.banner{
		background-image: linear-gradient(to right, #611be6, #f8973a);
		color: #FFFFFF;
		}
	</style>
	<style type="text/css">
		.nav-link{
			font-family: "Lato", Sans-serif;
			font-weight: 600;
			font-size: 15px;
			
		}
	</style>
	<link rel="stylesheet" type="text/css" href="headerinfo.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="jquery/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
	
	
</head>
<body>
	<?php include 'headerinfo.php';?>
	<?php include 'menu.php';?>

	<div class="container-fluid">
		<div class="row banner">
			<div class="col">
			<h3 class="  text-center">Upload Modified Article</h3>
			<p class="text-center">Get started with your article uploading</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-sg-12" >
				<div class="card bg-light" style="border: 0px;">
					<article class="card-body">
					<h3>Add Modified  Article</h3>
					<hr>
					<form method='post' enctype='multipart/form-data'>
						
				    	<label for="inputFile">Write your abstract</label>
				    	

				    	


					    	<label for="inputFile">Upload Supplementary Files</label>
					    	<div class="form-group input-group">
								<div class="input-group-prepend">
								    <span class="input-group-text"> <i class="fa fa-cloud-upload" aria-hidden="true"></i></span>
								</div>
						        	<input type="file" class="form-control" name="supplementary[]" id="supplementary" accept=".pdf" multiple>
					    	</div>


					    	<div class="form-group input-group">
								<div class="input-group-prepend">
								</div>
						        	<button class="btn btn-primary" type="submit" name="submit">Submit Article</button>
					    	</div>
					</form>
					</article>
				</div>

			</div>
			<div class="col-lg-6 col-sg-12"><img src="images/Asset 1.svg"></div>
		</div>
	</div>
	
</body>
</html>