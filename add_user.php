<?php
include('config.php'); // ربط ملف الاتصال بقاعدة البيانات

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // تشفير كلمة المرور
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // استعلام لإدخال البيانات في جدول Users
    $sql = "INSERT INTO Users (username, password) VALUES ('$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "تم إضافة المستخدم بنجاح!";
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!-- نموذج HTML لإضافة مستخدم -->
<form method="POST" action="add_user.php">
    <label for="username">اسم المستخدم:</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">كلمة المرور:</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="إضافة المستخدم">
</form>

