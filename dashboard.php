<?php
	session_start();
	if(!isset($_SESSION['email']))
		header("Location: login.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<title></title>
	<style type="text/css">
		.nav-link{
			font-family: "Lato", Sans-serif;
			font-weight: 600;
			font-size: 15px;
			
		}
	</style>
	<link rel="stylesheet" type="text/css" href="headerinfo.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="jquery/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
	
	
</head>
<body>		
	<?php include 'headerinfo.php';?>
	<?php include 'menu.php';?>
	<?php header("Location: new_article.php"); ?>
</body>
</html>