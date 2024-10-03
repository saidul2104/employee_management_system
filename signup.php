<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup_styles.css">
</head>
<body>
    <div class="container">
        <h1>Sign Up</h1>
        <form action="#" method="post" enctype="multipart/form-data">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>
            
            <button type="submit">Sign Up</button>
            <p style="color: red;">Already have an account? <a href="login.php">Sign In</a></p>
        </form>
    </div>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $photoPath = '';

    // Handle photo upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo = $_FILES['photo'];
        $photoPath = 'uploads/' . basename($photo['name']);
        move_uploaded_file($photo['tmp_name'], $photoPath);
    }

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query("SHOW DATABASES LIKE 'ecom'");
    if ($result->num_rows == 0) {
        // Database does not exist, create it
        $sql = "CREATE DATABASE ecom";
        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $conn->error;
        }
    } 

    $query = "USE ecom";
    if ($conn->query($query) !== true) {
        die("Error");
    }

    $result = $conn->query("SHOW TABLES LIKE 'Users'");
    if ($result->num_rows == 0) {
        // Table does not exist, create it
        $sql = "CREATE TABLE Users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            u_name VARCHAR(30) NOT NULL,
            email VARCHAR(50) NOT NULL,
            u_password VARCHAR(30) NOT NULL,
            photo VARCHAR(100) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        
        if ($conn->query($sql) !== TRUE) {
            echo "Error creating table: " . $conn->error;
        }
    }

    $query = "INSERT INTO Users (u_name, email, u_password, photo) VALUES ('$name', '$email', '$password', '$photoPath')";
    if ($conn->query($query) === true) {
        include 'redirect.php';
    } else {
        die("Error: " . $conn->error);
    }

    $conn->close();
}
?>
