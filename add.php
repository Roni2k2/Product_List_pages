<form action="add_product.php" method="post">

    <h2>Add a New Product</h2>
    
    <label for="name">Product Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="description">Description:</label><br>
    <textarea id="description" name="description" required></textarea><br><br>

    <label for="price">Price:</label><br>
    <input type="text" id="price" name="price" required><br><br>

    <label for="image_url">Image URL:</label><br>
    <input type="text" id="image_url" name="image_url"><br><br>

    <input type="submit" value="Add Product">
</form>
