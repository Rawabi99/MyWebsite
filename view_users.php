<?php
include('config.php'); // ربط الاتصال

$sql = "SELECT * FROM Users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["user_id"]. " - اسم المستخدم: " . $row["username"]. "<br>";
    }
} else {
    echo "لا توجد نتائج.";
}

$conn->close();
?>
