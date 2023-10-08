<?php
$servername = "localhost";
$username = "root";
$password = "Roni@1521";
$dbname = "productlist";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

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
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $product_id = intval($_POST['product_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = floatval($_POST['price']);
    $image_url = mysqli_real_escape_string($conn, $_POST['image_url']);

    
    $sql = "UPDATE products
            SET name='$name', description='$description', price=$price, image_url='$image_url'
            WHERE id=$product_id";

    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully. <a href='index.php'>Go back</a>";
    } else {
        echo "Error updating product: " . $conn->error;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="update_product.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $product_name; ?>" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required><?php echo $product_description; ?></textarea><br><br>

        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" value="<?php echo $product_price; ?>" required><br><br>

        <label for="image_url">Image URL:</label><br>
        <input type="text" id="image_url" name="image_url" value="<?php echo $product_image_url; ?>"><br><br>

        <input type="submit" value="Save Changes">
    </form>
</body>
</html>
