<?php
    session_start();
    if(isset($_SESSION['email']))
      header("Location: dashboard.php");

    include 'connect.php';
    include 'tnk_admin_table.php';


    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM `tnk_admin` WHERE `email`='$email' AND `password`='$password'";
      //echo $sql;

      $result=$conn->query($sql);
        if($result->num_rows > 0)
        {
          $_SESSION['email']=$email;
          
          $sql = "SELECT * FROM `tnk_admin` WHERE `email`='$email' AND `password`='$password'";
          $result=$conn->query($sql);


          while ($row=mysqli_fetch_array($result)) {
            $_SESSION['id']=$row['id'];
          }
          $_SESSION['admin']=1;
          header("Location: admin_dashboard.php");
          //echo date('Y m d H:i:s', $_SESSION['time']);
        }
        else
        {
          $_SESSION['admin']=0;
          //if error in login.
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'lib_files.php';?>

    <style>
    html,body {
      height: 100%;
    } 

.body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>


</head>
<body>
  <?php include 'headerinfo.php';?>
  <?php include 'menu_login.php';?>
  <br>
  <div class="container-fluid">
    <div class="row">
      <div class="col d-flex justify-content-center">
        <div class="card text-center shadow p-0 mb-0 bg-white rounded" style="width: 350px;">
          <img class="card-img-top" src="images/Asset 4.png" alt="Card image cap">
            <div class="card-body">
              <form class="form-signin" method="post">
              <!--<h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>-->
              <!--<h4 class="h4 mb-3 font-weight-normal">Please sign in</h4>-->
              <label for="inputEmail" class="sr-only">Email address</label>
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
              <label for="inputPassword" class="sr-only">Password</label>
              <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
              <!--<div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div>-->
              <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br>
              <!--<p class="text-center">You don't have an account? <a href="#">Register</a></p>-->
              <!--<p class="mt-0 mb-0 text-muted">&copy; 2017-2020</p>-->
              </form>
            </div>
        </div> 
      </div>
    </div>
  </div>
  <br><br>
</body>
</html>