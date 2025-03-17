<?php
include 'connection.php'; // الاتصال بقاعدة البيانات

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // التحقق من إدخال جميع الحقول المطلوبة
    if (!empty($name) && !empty($email) && !empty($message)) {
        // استخدام استعلام آمن لحماية البيانات
        $stmt = $conn->prepare("INSERT INTO Contact_Us (name, email, phone, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $message);

        if ($stmt->execute()) {
            echo "✅ تم إرسال الرسالة بنجاح!";
        } else {
            echo "❌ خطأ في الإدخال: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "❌ الرجاء ملء جميع الحقول المطلوبة!";
    }
}

$conn->close();
?>
