<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Clothing Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2>Add New Clothing Item</h2>
    <form action="add_clothing.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Clothing Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="categoryId" required>
                <!-- Dynamically populate categories -->
                <?php
                // Fetch categories from database
                $conn = new mysqli('localhost', 'root', '', 'angelsfromhell');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $categoryResult = $conn->query("SELECT id, name FROM category");
                while ($category = $categoryResult->fetch_assoc()) {
                    echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
                }
                $conn->close();
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Item</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>