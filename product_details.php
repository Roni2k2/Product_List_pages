<?php
$servername = "localhost";
$username = "root";
$password = "Roni@1521";
$dbname = "productlist";

$conn = new mysqli($servername, $username, $password, $dbname);



// Get the product ID from the URL
$product_id = $_GET['id'];


$sql = "SELECT * FROM products WHERE id = $product_id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $product_name = $row['name'];
    $product_description = $row['description'];
    $product_price = $row['price'];
    $product_image_url = $row['image_url'];
} else {
    echo "Product not found";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/detalis.css">
    <title><?php echo $product_name; ?> Details</title>
    <style>
.cancel-button {
    display: inline-block;
    background-color: #ccc;
    color: #333;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 4px;
    font-size: 18px;
    margin-right: 10px;
}

.cancel-button:hover {
    background-color: #999;
    color: #fff;
}
    </style>
</head>
<body>
    <h1><?php echo $product_name; ?> Details</h1>
    <div class="product-details">
        <img src="<?php echo $product_image_url; ?>" alt="<?php echo $product_name; ?>">
        <hr>
        <h2><?php echo $product_name; ?></h2><hr>
        <p><?php echo $product_description; ?></p><hr>
        <p class="price">Price: $<?php echo $product_price; ?></p>
        <a href="index.php" class="cancel-button">Cancel</a>
    </div>
</body>
</html>
