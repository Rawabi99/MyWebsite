<?php
$servername = "sql12.freesqldatabase.com"; // ضعي هنا الـ Host Name الذي حصلتِ عليه
$username = "sql12765971"; // ضعي هنا اسم المستخدم
$password = "dkTjl62gu9"; // ضعي هنا كلمة المرور
$dbname = "sql12765971"; // ضعي هنا اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
echo "تم الاتصال بقاعدة البيانات بنجاح!";
?>
