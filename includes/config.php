
<?php 
// Định nghĩa các thông số kết nối.
define('DB_SERVER', 'qltv1.database.windows.net');
define('DB_USER', 'admin123'); // Tên người dùng SQL Server của bạn
define('DB_PASS', 'Loan2002@'); // Mật khẩu của bạn
define('DB_NAME', 'qltv1'); // Tên cơ sở dữ liệu là "nhom7-2"

// Thiết lập kết nối cơ sở dữ liệu.
try {
    // Tạo kết nối với PDO
    $dbh = new PDO("sqlsrv:server=".DB_SERVER.";Database=".DB_NAME, DB_USER, DB_PASS);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Thiết lập chế độ hiển thị lỗi.
} 
catch (PDOException $e) {
    exit("Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage());
}
?>
