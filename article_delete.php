<?php
    session_start();
   /* if(isset($_SESSION['email']))
      header("Location: dashboard.php");*/
    $id=$_GET['id'];

    include 'connect.php';
    $user_id=0;
    $article_no=0;
    $approve_sql="SELECT * FROM `tnk_articles` WHERE `id`='$id'";
      $result1 = $conn->query($approve_sql);
    while ($row=mysqli_fetch_array($result1)) {
    	$user_id=$row['user_id'];
    	$article_no=$row['article_no'];
    }

    $manuscript="upload/".$user_id."-".$article_no."-"."manuscript.pdf";
    $copyright="upload/".$user_id."-".$article_no."-"."copyright.pdf";

    if(!unlink($manuscript))
    	echo "file is not deleteing: ".$manuscript."<br>";
    echo $copyright."<br>";
    if(!unlink($copyright))
    	echo "file is not deleteing: ".$copyright."<br>";

    

    $approved_supplementary_file_query="SELECT * FROM `tnk_supplementary_file` WHERE `user_id`='$user_id' AND `article_no`='$article_no'";
    $result2 = $conn->query($approved_supplementary_file_query);
    $i=0;
    while ($row=mysqli_fetch_array($result2)) {
    	$filename="upload/".$user_id."-".$article_no."-"."supplementary_file-".$i.".pdf";
    	if(!unlink($filename))
    		echo "file is not deleteing: ".$filename."<br>";
    	$i++;
    }

     $approve_sql="DELETE FROM `tnk_articles` WHERE `id`='$id'";
     $conn->query($approve_sql);
     header("Location: admin_dashboard.php");


     

?>