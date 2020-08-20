<?php
$sql = "CREATE TABLE IF NOT EXISTS tnk_articles (
    id INT(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(50) NOT NULL,
    article_no VARCHAR(50) NOT NULL,
    article_title VARCHAR(50) NOT NULL,
    abstract text NOT NULL,
    manu_script VARCHAR(50) NOT NULL,
    copy_right VARCHAR(50) NOT NULL,
    approved_or_not VARCHAR(5) NOT NULL,
    article_id VARCHAR(5) NOT NULL,
    /*uploaded_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,*/
    uploaded_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    approved_date VARCHAR(50) NOT NULL)";

    if ($conn->query($sql) === TRUE) {
        echo ""; /*Table tnk_articles created successfully*/
    } else {
        echo "Error creating table: " . $conn->error;
    }
?>