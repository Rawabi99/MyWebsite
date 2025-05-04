<?php
include('config.php'); // ربط ملف الاتصال بقاعدة البيانات

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ تم إرسال الرسالة بنجاح!";
    } else {
        echo "❌ خطأ أثناء الإرسال: " . $conn->error;
    }
}

$conn->close();
?>
