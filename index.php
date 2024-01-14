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

// ดึงข้อมูลสินค้าจากฐานข้อมูล
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
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
                Add item to cart
            </h1>
                <div class='flex justify-center pb-10'>
                    <a href="viewcart.php" class='text-4xl text-emerald-500'>
                    <span class='flex justify-center'>
                    <ion-icon name="cart-outline"></ion-icon>
                    </span>
                    <p class='text-center text-base text-emerald-500'>
                        Views Cart
                    </p>
                    </a>
                </div>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='flex justify-center py-10'>";
                echo "<div class='border p-2 rounded-md'>";
                echo "<img class='w-40 rounded-xl' src='" . $row['image_url'] . "' alt='" . $row['name'] . "'>";
                echo "<p class='py-4 text-zinc-800'>" . $row['name'] . "</p>";
                echo "<a href='addtocart.php?id=" . $row['id'] . "' class='text-sm border border-emerald-500 text-emerald-500 px-2 rounded-md hover:bg-emerald-500 hover:text-white transition'>Add to Cart</a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        ?>
         <div class='flex justify-center'>
            <a href="./addproduct.php" class='border border-emerald-500 rounded-full text-emerald-500 px-10 py-1 ease-in-out hover:-translate-y-1 hover:scale-110 duration-300'>
                Add Product
            </a>
        </div>
</body>
</html>
