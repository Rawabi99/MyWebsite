<?php
$servername = "sql12.freesqldatabase.com"; // ضعي اسم المضيف الذي حصلتِ عليه
$username = "sql12765971"; // ضعي اسم المستخدم
$password = "dkTjl62gu9"; // ضعي كلمة المرور
$dbname = "sql12765971"; // ضعي اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact_messages (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "تم إرسال رسالتك بنجاح!";
    } else {
        echo "خطأ: " . $conn->error;
    }
}
echo "<pre>";
print_r($_POST);
echo "</pre>";
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
} else {
    echo "تم الاتصال بقاعدة البيانات بنجاح!";
}

$conn->close();
?>
