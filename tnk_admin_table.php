<?php
    $sql = "CREATE TABLE IF NOT EXISTS tnk_admin (
    id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    gender VARCHAR(10) NOT NULL,
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
?>