<?php

$servername = '127.0.0.1';
$username = 'username';
$password = 'UserPass';
$dbname = 'mysqlPHPtoad';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Successfully connected<br>";

$sqltext = "
CREATE DATABASE IF NOT EXISTS mysqlPHPtoad;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(45) NOT NULL,
    role CHAR(1) NOT NULL DEFAULT 'U',
    created_at DATETIME NOT NULL,
    about_me VARCHAR(255) NULL,
    password VARCHAR(256) NOT NULL,
    UNIQUE KEY name_UNIQUE (name)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS forum_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(45) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS forums (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(45) NOT NULL,
    description VARCHAR(125) NOT NULL,
    category_id INT NOT NULL,
    CONSTRAINT fk_category 
        FOREIGN KEY (category_id) 
        REFERENCES forum_categories (id) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS topics (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(45) NOT NULL,
    user_id INT NOT NULL,
    forum_id INT NOT NULL,
    CONSTRAINT fk_topic_user 
        FOREIGN KEY (user_id) 
        REFERENCES users (id) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION,
    CONSTRAINT fk_topic_forum 
        FOREIGN KEY (forum_id) 
        REFERENCES forums (id) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    text VARCHAR(3000) NOT NULL,
    replied_to INT NULL,
    user_id INT NOT NULL,
    topic_id INT NOT NULL,
    CONSTRAINT fk_post_user 
        FOREIGN KEY (user_id) 
        REFERENCES users (id) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION,
    CONSTRAINT fk_post_topic 
        FOREIGN KEY (topic_id) 
        REFERENCES topics (id) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
) ENGINE = InnoDB;
"; ?>
<a href="index.php">Homepage</a>
<?php
if ($conn->multi_query($sqltext)) {
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->more_results() && $conn->next_result());
    echo "Tables created successfully";
} else {
    echo "Error creating tables: " . $conn->error;
}

$conn->close();
?>
