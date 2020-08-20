<?php
   /* session_start();
    if(isset($_SESSION['email']))
      header("Location: dashboard.php");*/

    include 'connect.php';

    $users_count_query = "SELECT * FROM `tnk_users`";
    $users_count_query_result=$conn->query($users_count_query);
    $users_count= $users_count_query_result->num_rows;

    $admins_count_query="SELECT * FROM `tnk_admin`";
    $admins_count_query_result=$conn->query($admins_count_query);
    $admins_count= $admins_count_query_result->num_rows;

    $articles_not_approved_count_query = "SELECT * FROM `tnk_articles` WHERE `approved_or_not`='1'";
    $articles_not_approved_count_result = $conn->query($articles_not_approved_count_query);
    $articles_not_approved_count = $articles_not_approved_count_result->num_rows;


    $articles_approved_count_query = "SELECT * FROM `tnk_articles` WHERE `approved_or_not`='0'";
    $articles_approved_count_result = $conn->query($articles_approved_count_query);
    $articles_approved_count = $articles_approved_count_result->num_rows;





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
  		<br>
  		<div class="container">
  			
  			<div class="row">
	  			
	  			
	  			<div class="col-sm-3 col-md-6 col-lg-3">
			        <div class="card text-white bg-primary mb-4 shadow-lg" style="background-image: linear-gradient(to right, #6B0F1A ,#B91372);">
			             <a href="users.php" class="btn btn-primary stretched-link" style="background-image: linear-gradient(to right, #6B0F1A ,#B91372); border: #d05fce;">
			            <div class="card-header">Users <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></div>
			        	</a>
			            <div class="card-body">
			                <h1 class="card-title"><?php echo $users_count;?></h1>
			                <h3 class="card-text"><i class="fa fa-users" aria-hidden="true"></i> Users</h3>
			            </div>

			        </div>
			    </div>

	  			<div class="col-sm-3 col-md-6 col-lg-3">
			        <div class="card text-white bg-success mb-4 shadow-lg" style="background-image: linear-gradient(to right, #2B32B2, #1488CC);">
			            <a href="admins.php" class="btn btn-success stretched-link" style="background-image: linear-gradient(to right, #2B32B2, #1488CC);border: #d05fce;">
			            <div class="card-header">Admin Users <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></div>
			        	</a>
			            <div class="card-body">
			                
			                <h1 class="card-title"><?php echo $admins_count;?></h1>
			                <h3 class="card-text"><i class="fa fa-user" aria-hidden="true"></i> Admins</h3>
			            </div>
			        </div>
			    </div>	


	  			<div class="col-sm-3 col-md-6 col-lg-3">
			        <div class="card text-white mb-4 shadow-lg" style="background-image: linear-gradient(to right, #4408d2, #b72cee);">
			        	<a href="approved_article.php" class="btn btn-info stretched-link" style="background-image: linear-gradient(to right, #4408d2, #b72cee); border: #d05fce;">
			            <div class="card-header">Approved Articles <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></div>
			        	</a>
			            <div class="card-body">
			                <h1 class="card-title"><?php echo $articles_not_approved_count;?></h1>
			                <h3 class="card-text"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Approved</h3>
			            </div>
			        </div>
			    </div>			    

		    

	  			<div class="col-sm-3 col-md-6 col-lg-3">
			        <div class="card text-white bg-danger mb-4 shadow-lg" style="background-image: linear-gradient(to right, #1e8a5d,#2ea5fc );">
			        	<a href="inprocess_article.php" class="btn btn-danger stretched-link" style="background-image: linear-gradient(to right, #1e8a5d,#2ea5fc );border: #d05fce;">
			            <div class="card-header">Inprocess Articles <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></div>
			        	</a>
			            <div class="card-body">
			                
			                <h1 class="card-title"><?php echo $articles_approved_count;?></h1>
			                <h3 class="card-text"><i class="fa fa-pencil-square" aria-hidden="true"></i> Inprocess</h3>
			            </div>
			        </div>
			    </div>			    

		</div>

  			<div class="row">

  				<div class="col-sm-3">
			        <div class="card text-white  mb-4 shadow-lg" style="background: #611be6;">
			        	<a href="admin_upload.php" class="btn btn-secondary stretched-link" style="background: #611be6; border: #611be6; ">
			            <div class="card-header">Upload User Files <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></div>
			        	</a>
			            <div class="card-body">
			                
			                <h1 class="card-title"></h1>
			                <h3 class="card-text"><i class="fa fa-cloud-upload" aria-hidden="true"></i>Upload</h3>
			            </div>
			        </div>
			    </div>	

  			</div>
  		</div>




  		
		<hr>

  		</div>
	</body>
</html>