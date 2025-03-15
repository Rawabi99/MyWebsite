<?php
$servername = "sql212.infinityfree.com"; // إذا كنت على استضافة مجانية قد يكون السيرفر مختلفًا، تحقق منه
$username = "if0_38521780_XXX";
$password = "MWotliZ7jAG";
$database = "if0_38521780";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $database);

// فحص الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// ضبط الترميز لدعم العربية
$conn->set_charset("utf8mb4");
?>
