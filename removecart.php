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

    // ลบสินค้าออกจากตะกร้า
    $sql = "DELETE FROM cart WHERE product_id = '$product_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Product removed from cart successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid product ID";
}

$conn->close();
?>