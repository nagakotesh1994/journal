<?php

$sql = "CREATE TABLE IF NOT EXISTS tnk_supplementary_file (
    id INT(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(50) NOT NULL,
    article_no VARCHAR(50) NOT NULL,
    article_title VARCHAR(50) NOT NULL,
    supplementary_file VARCHAR(50) NOT NULL,
    uploaded_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";

    if ($conn->query($sql) === TRUE) {
        echo ""; /*Table tnk_articles created successfully*/
    } else {
        echo "Error creating table: " . $conn->error;
    }
?>
