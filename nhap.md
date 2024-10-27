navbar navbar-inverse set-radius-zero

navbar-collapse collapse

<?php 
// Định nghĩa các thông số kết nối.
define('DB_HOST','localhost');
define('DB_USER','root'); // Sử dụng tên người dùng mặc định
define('DB_PASS',''); // Sử dụng mật khẩu trống nếu không có mật khẩu
define('DB_NAME','library2'); // Đảm bảo tên cơ sở dữ liệu là "library2"

// Thiết lập kết nối cơ sở dữ liệu.
try {
    $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Thiết lập chế độ hiển thị lỗi.
} 
catch (PDOException $e) {
    exit("Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage());
}
?>