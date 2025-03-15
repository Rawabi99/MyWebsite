<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';

if ($conn) {
    echo "✅ تم الاتصال بقاعدة البيانات بنجاح!";
} else {
    echo "❌ هناك مشكلة في الاتصال!";
}
?>
