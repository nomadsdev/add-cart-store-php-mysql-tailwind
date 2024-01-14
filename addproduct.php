<?php
// คอมเม้นต์: เชื่อมต่อกับ MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "add-cart_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจากฟอร์มและบันทึกลงฐานข้อมูล
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $image_url = $_POST['image_url'];

    $sql = "INSERT INTO products (name, image_url) VALUES ('$name', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT products.id, products.name, products.image_url FROM products
        INNER JOIN cart ON products.id = cart.product_id";
$result = $conn->query($sql);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
        <h1 class='text-center p-10 text-3xl text-emerald-500'>
            Add Product
        </h1>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <div class='flex justify-center'>
                    <div>
                        <label for="name" class='text-emerald-500'>Product Name :</label>
                        <input type="text" name="name" required class='border border-emerald-500 rounded-md pl-2'>
                        <br>
                        <br>
                        <label for="image_url" class='text-emerald-500'>Image URL :</label>
                        <input type="text" name="image_url" required class='border border-emerald-500 rounded-md pl-2'>
                    </div>
                </div>

                <div class='flex justify-center py-5'>
                    <input type="submit" value="Add Product" class='border border-emerald-500 rounded-full text-emerald-500 px-10 py-1 hover:bg-emerald-500 hover:text-white transition'>
                </div>
            </form>
            <div class='flex justify-center'>
                <a href="index.php" class='text-emerald-500'>
                    Back to Home
                </a>
            </div>
</body>
</html>
