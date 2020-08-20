<?php
    session_start();
   /* if(isset($_SESSION['email']))
      header("Location: dashboard.php");*/
    $id=$_GET['id'];

    include 'connect.php';
    $approve_sql="UPDATE `tnk_articles` SET `approved_or_not`='1',`approved_date`=now() WHERE id='$id'";
    $conn->query($approve_sql);
    header("Location: admin_dashboard.php");



?>