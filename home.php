
<?php

    session_start();
    if(!isset($_SESSION['id'])) {

      header("Location: login.php");
      exit;
    } 
    else {
      
    }
    
    // if($_SERVER['REQUEST_METHOD'] === 'GET')
    // {
        
      // if(!isset($_COOKIE['id'])) {
        
      //   header("Location: login.php");
      //   exit;
      // } else {
        
      // }
    // }
    // if($_SERVER['REQUEST_METHOD'] === 'POST')
    // {
    //     $name = $_POST["name"];
    //     $email = $_POST["email"];
    //     $message = $_POST["message"];
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple E-Commerce Website</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <!-- <header>
    <h1>E _COM</h1>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="product.php">Products</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>
  </header> -->
  <?php include 'border.php'; ?>

  <main>
  <div class="container">
        <h1>All Product List</h1>
        <div class="product-wrapper">
            <div class="product">
                <img src="images/i3.jpeg" alt="Product 1">
                <h2>Product 1</h2>
                <p>Engine Oil</p>
                <span>$45.25</span>
            </div>
           
        <!-- Add more product items here -->
    </div>
    <div class="product">
                <img src="images/i1.jpeg" alt="Product 2">
                <h2>Product 2</h2>
                <p>Engine Oil</p>
                <span>$45.25</span>
            </div>
            <div class="product">
            <img src="images/i2.jpeg" alt="Product 3">
                <h2>Product 3</h2>
                <p>Engine Oil</p>
                <span>$45.25</span>
            </div>
            <div class="product">
            <img src="images/i4.jpeg" alt="Product 4">
                <h2>Product 4</h2>
                <p>Engine Oil</p>
                <span>$45.25</span>
            </div>
            <div class="product">
            <img src="images/i5.jpeg" alt="Product 5">
                <h2>Product 5</h2>
                <p>Engine Oil</p>
                <span>$45.25</span>
            </div>
            <div class="product">
            <img src="images/i6.jpeg" alt="Product 6">
                <h2>Product 6</h2>
                <p>Engine Oil</p>
                <span>$45.25</span>
            </div>
            <div class="product">
            <img src="images/i7.jpeg" alt="Product 7">
                <h2>Product 7</h2>
                <p>Engine Oil</p>
                <span>$45.25</span>
            </div>
            <div class="product">
            <img src="images/i8.jpeg" alt="Product 8">
                <h2>Product 8</h2>
                <p>Engine Oil</p>
                <span>$45.25</span>
            </div>
            <div class="product">
            <img src="images/i9.jpeg" alt="Product 9">
                <h2>Product 9</h2>
                <p>4 L engine oil</p>
                <span>$45</span>
            </div>
        </div>
    <!-- More products can be added here -->
  </main>

  <footer>
    <p>&copy; SHuvoGUB.</p>
  </footer>
</body>
</html>
