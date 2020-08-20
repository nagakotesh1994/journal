<?php
	session_start();
	include 'connect.php';
	include 'tnk_articles_table.php';
	include 'tnk_supplementary_file_table.php';





	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		$user_id = $_SESSION['id'];
		$articletitle = $_POST['articletitle'];
		$abstract = $_POST['abstract'];

		$sql = "SELECT article_no FROM tnk_articles WHERE `user_id`='".$user_id."' ORDER BY article_no ASC";
		$result=$conn->query($sql);
		if($result->num_rows)
		{
			while ($row=mysqli_fetch_array($result))
			{
				$new_article_number = $row['article_no']+1; // to shift next article number i am adding one to it.
			}
		}
		else
		{
			$new_article_number = $result->num_rows + 1;// to shift next article number i am adding one to it.
		}
        
		
		$manuscript_file= $_SESSION['id']."-".$new_article_number."-manuscript.pdf";
		move_uploaded_file($_FILES['manuscript']['tmp_name'],'upload/'.$manuscript_file);

	 	$copyright_file= $_SESSION['id']."-".$new_article_number."-copyright.pdf";
		move_uploaded_file($_FILES['copyright']['tmp_name'],'upload/'.$copyright_file);

		$sql = "INSERT INTO tnk_articles (user_id, article_no, article_title, abstract, manu_script, copy_right, approved_or_not, article_id, approved_date) VALUES ('$user_id','$new_article_number','$articletitle','$abstract','$manuscript_file','$copyright_file','0','','')";

		if ($conn->query($sql) === TRUE) {
        echo ""; /*tnk_articles table Inseted Data successfully*/
        } else {
            echo "Error inserting data: " . $conn->error;
        }


		// Count total files
		$countfiles = count($_FILES['supplementary']['name']);
		 
		// Looping all files
		for($i=0;$i<$countfiles;$i++)
		{
			$supplementary_file = $_SESSION['id']."-".$new_article_number."-supplementary_file-".$i.".pdf";
			// Upload file
			move_uploaded_file($_FILES['supplementary']['tmp_name'][$i],'upload/'.$supplementary_file);

			$sql = "INSERT INTO tnk_supplementary_file (user_id, article_no, article_title, supplementary_file) VALUES ('$user_id','$new_article_number','$articletitle','$supplementary_file')";
			if ($conn->query($sql) === TRUE) {
        		echo ""; /*tnk_articles table Inseted Data successfully*/
        	} else {
            echo "Error inserting data: " . $conn->error;
       		}
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
			<h3 class="  text-center">New Article</h3>
			<p class="text-center">Get started with your article uploading</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-sg-12" >
				<div class="card bg-light" style="border: 0px;">
					<article class="card-body">
					<h3>Add Your New Article</h3>
					<hr>
					<form method='post' enctype='multipart/form-data'>
						<div class="form-group input-group">
							<div class="input-group-prepend">
							    <span class="input-group-text"> <i class="fa fa-book" aria-hidden="true"></i></span>
							</div>
					        <input name="articletitle" class="form-control" placeholder="Article title" type="text" required>
				    	</div>

				    	<label for="inputFile">Write your abstract</label>
				    	<div class="form-group input-group">
							<!--<div class="input-group-prepend">
							    <span class="input-group-text"> <i class="fa fa-file-text" aria-hidden="true"></i></span>
							</div>-->
					        <textarea name="abstract" class="form-control" placeholder="Abstract"></textarea>
				    	</div>

				    	<label for="inputFile">Upload Manuscript</label>
				    	<div class="form-group input-group">
							<div class="input-group-prepend">
							    <span class="input-group-text"> <i class="fa fa-cloud-upload" aria-hidden="true"></i></span>
							</div>
					        	<input type="file" class="form-control" name="manuscript" id="manuscript" accept=".pdf">
				    	</div>


					    	<label for="inputFile">Upload Supplementary Files</label>
					    	<div class="form-group input-group">
								<div class="input-group-prepend">
								    <span class="input-group-text"> <i class="fa fa-cloud-upload" aria-hidden="true"></i></span>
								</div>
						        	<input type="file" class="form-control" name="supplementary[]" id="supplementary" accept=".pdf" multiple>
					    	</div>

					    	<label for="inputFile">Upload Copyright Form | <font color="red">Note: </font> <a href="documents/CopyrightAgreementAndAuthorshipResponsibility.doc">Download Copyright form</a> then sign it and upload here. </label>
					    	<div class="form-group input-group">
								<div class="input-group-prepend">
								    <span class="input-group-text"> <i class="fa fa-cloud-upload" aria-hidden="true"></i></span>
								</div>
						        	<input type="file" class="form-control" name="copyright" id="copyright" accept=".pdf">
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
	<script>
    	CKEDITOR.replace( 'abstract' );
    </script>
	
</body>
</html>