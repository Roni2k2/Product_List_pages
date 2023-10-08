<?php
$servername = "localhost";
$username = "root";
$password = "Roni@1521";
$dbname = "productlist";

$conn = new mysqli($servername, $username, $password, $dbname);


$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$image_url = $_POST['image_url'];


$sql = "INSERT INTO products (name, description, price, image_url)
        VALUES ('$name', '$description', '$price', '$image_url')";

if ($conn->query($sql) === TRUE) {
    echo "Product added successfully. <a href='index.php'>Go back</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
