<!DOCTYPE html>
<?php
// Database connection parameters
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "ecom";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$userId = $_SESSION['id'];

// Fetch products from the database
$sql = "SELECT p.productName, p.productImage, p.productDescription, p.productPrice
        FROM product p
        JOIN users u ON p.userId = u.id
        WHERE u.id = $userId
        ORDER BY p.productName ASC";
$result = $conn->query($sql);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="product_styles.css">
    <style>
        /* Add some basic styling for the search bar and products */
        .search-bar {
            margin-bottom: 20px;
        }
        .product-wrapper {
            display: flex;
            flex-wrap: wrap;
        }
        .product {
            flex: 1 0 21%; /* four items per row */
            box-sizing: border-box;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ddd;
        }
        .product img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <?php include 'border.php'; ?>
    <div class="container">
        <h1>Product List</h1>
        
        <div class="search-bar">
            <input type="text" id="product-search" placeholder="Search for products...">
        </div>

        <div id="product-container">
            <?php
            if ($result->num_rows > 0) {
                echo '<div class="product-wrapper" id="product-list">';
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                    echo '<img class="product-image" src="images/' . htmlspecialchars($row["productImage"]) . '" alt="' . htmlspecialchars($row["productName"]) . '">';
                    echo '<h2 class="product-title">' . htmlspecialchars($row["productName"]) . '</h2>';
                    echo '<p class="product-description">' . htmlspecialchars($row["productDescription"]) . '</p>';
                    echo '<span class="product-price">$' . htmlspecialchars($row["productPrice"]) . '</span>';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>

    <?php
    // Close connection
    $conn->close();
    ?>

    <script>
        document.getElementById('product-search').addEventListener('input', function() {
            const filter = this.value.toLowerCase();
            const products = Array.from(document.querySelectorAll('.product'));

            products.sort(function(a, b) {
                const titleA = a.querySelector('.product-title').textContent.toLowerCase();
                const titleB = b.querySelector('.product-title').textContent.toLowerCase();

                if (titleA.startsWith(filter) && !titleB.startsWith(filter)) {
                    return -1;
                } else if (!titleA.startsWith(filter) && titleB.startsWith(filter)) {
                    return 1;
                } else {
                    return titleA.localeCompare(titleB);
                }
            });

            const productContainer = document.getElementById('product-list');
            productContainer.innerHTML = '';
            products.forEach(function(product) {
                if (product.querySelector('.product-title').textContent.toLowerCase().includes(filter)) {
                    productContainer.appendChild(product);
                }
            });
        });
    </script>
</body>
</html>
