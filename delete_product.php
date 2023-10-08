<?php
$servername = "localhost";
$username = "root";
$password = "Roni@1521";
$dbname = "productlist";

$conn = new mysqli($servername, $username, $password, $dbname);

$product_id = $_GET['id'];


$sql = "DELETE FROM products WHERE id='$product_id'";

if ($conn->query($sql) === TRUE) {
    echo "Product deleted successfully. <a href='index.php'>Go back</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
