<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "add-cart_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบว่ามีการส่งข้อมูล ID สินค้ามาหรือไม่
if(isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // เพิ่มสินค้าลงในตะกร้า
    $sql = "INSERT INTO cart (product_id) VALUES ('$product_id')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Product added to cart successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid product ID";
}

$conn->close();
?>