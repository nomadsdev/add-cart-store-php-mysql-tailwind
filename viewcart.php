<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "add-cart_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
    <title>View Cart</title>
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
    <h2 class='text-3xl text-center p-10 text-emerald-500'>Your Cart</h2>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='flex justify-center'>";
            echo "<div class='border p-2 rounded-md'>";
            echo "<img class='w-40 rounded-xl' src='" . $row['image_url'] . "' alt='" . $row['name'] . "'>";
            echo "<p class='text-zinc-800 py-5'>" . $row['name'] . "</p>";
            echo "<a href='removecart.php?id=" . $row['id'] . "' class='text-sm border border-emerald-500 text-emerald-500 px-2 rounded-md hover:bg-emerald-500 hover:text-white transition'>Remove from Cart</a>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p class='text-zinc-300 text-5xl text-center p-20'>Your cart is empty</p>";
    }
    ?>
    <br>
    <div class='flex justify-center'>
        <a href="index.php" class='text-emerald-500 ease-in-out hover:-translate-y-1 hover:scale-110 duration-300'>Back to Product List</a>
    </div>
</body>
</html>