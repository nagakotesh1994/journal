<?php
    include 'connect.php';
    
    $sql = "CREATE TABLE IF NOT EXISTS tnk_users (
    id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    country_code VARCHAR(10) NOT NULL,
    phone VARCHAR(10) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email_verification VARCHAR(5) NOT NULL,
    phone_verification VARCHAR(5) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo ""; /*Table MyGuests created successfully*/
    } else {
        echo "Error creating table: " . $conn->error;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $countrycode = $_POST['countrycode'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $email_verification = "0";
        $phone_verification = "0";



        $sql = "INSERT INTO tnk_users (full_name, email, country_code, phone, password, email_verification, phone_verification) VALUES ('$fullname', '$email', '$countrycode', '$phone', '$password', '$email_verification', '$phone_verification')";

        if ($conn->query($sql) === TRUE) {
        echo ""; /*Inseted Data successfully*/
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
    <?php include 'lib_files.php';?>

	<style>
	.divider-text {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
}
.divider-text span {
    padding: 7px;
    font-size: 12px;
    position: relative;   
    z-index: 2;
}
.divider-text:after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid #ddd;
    top: 55%;
    left: 0;
    z-index: 1;
}

.btn-facebook {
    background-color: #405D9D;
    color: #fff;
}
.btn-twitter {
    background-color: #42AEEC;
    color: #fff;
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
                <div class="card text-center shadow p-0 mb-0 bg-white rounded" style="width: 450px;">
                  <img class="card-img-top" src="images/Asset 3.png" alt="Card image cap">
                    <div class="card-body">
                     <form method="post" class="needs-validation">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                 </div>
                <input name="fullname" class="form-control" placeholder="Full name" type="text">
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                 </div>
                <input name="email" class="form-control" placeholder="Email address" type="email">
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                </div>
                <select name="countrycode" class="custom-select" style="max-width: 70px;">
                    <option selected="">+91</option>
                </select>
                <input name="phone" class="form-control" placeholder="Phone number" type="text">
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                </div>
         
                <textarea name="affiliation" class="form-control" rows="5" id="comment" placeholder="Affiliation"></textarea>
            </div> <!-- form-group end.// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name="password" class="form-control" placeholder="Create password" type="password">
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name="repassword" class="form-control" placeholder="Repeat password" type="password">
            </div> <!-- form-group// -->                                      
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
            </div> <!-- form-group// -->      
            <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>                                                                 
                </form>
            </div>
        </div> 
      </div>
    </div>
  </div>
<br>
</body>
</html>
