<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config.php'; // الاتصال بقاعدة البيانات
session_start(); // بدء الجلسة لاسترجاع sender_id

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // التأكد من أن المستخدم مسجل الدخول
    if (!isset($_SESSION['user_id'])) {
        die("خطأ: يجب تسجيل الدخول لإرسال الرسالة.");
    }

    $sender_id = $_SESSION['user_id']; // المرسل هو المستخدم الحالي
    $message_text = isset($_POST['message_text']) ? $_POST['message_text'] : null;

    // ✅ استخراج `receiver_id` تلقائيًا من جدول الأصدقاء `friends_list`
    $sql_get_receiver = "SELECT friend_id FROM friends_list WHERE user_id = ?";
    $stmt_receiver = $conn->prepare($sql_get_receiver);
    $stmt_receiver->bind_param("i", $sender_id);
    $stmt_receiver->execute();
    $stmt_receiver->bind_result($receiver_id);
    $stmt_receiver->fetch();
    $stmt_receiver->close();

    // التحقق من وجود `receiver_id` والرسالة
    if (!empty($receiver_id) && !empty($message_text)) {
        // ✅ إدراج الرسالة في قاعدة البيانات
        $sql = "INSERT INTO messages (sender_id, receiver_id, message_text, sent_at) VALUES (?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $sender_id, $receiver_id, $message_text);

        if ($stmt->execute()) {
            echo "تم إرسال الرسالة بنجاح!";
        } else {
            echo "خطأ أثناء إرسال الرسالة: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "لا يمكن العثور على معرف المستلم أو الرسالة فارغة!";
    }
}

$conn->close();
?>
