<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost"; // السيرفر سيكون محليًا
$username = "root"; // اسم المستخدم الافتراضي في XAMPP
$password = ""; // بدون كلمة مرور افتراضيًا في XAMPP
$database = "if0_38521780"; // ضع هنا اسم قاعدة البيانات التي أنشأتها

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $database);

// فحص الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// ضبط الترميز لدعم العربية
$conn->set_charset("utf8mb4");

echo "تم الاتصال بنجاح!";
?>
