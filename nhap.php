<?php
// Định nghĩa các thông số kết nối.
define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // Sử dụng tên người dùng mặc định
define('DB_PASS', ''); // Sử dụng mật khẩu trống nếu không có mật khẩu
define('DB_NAME', 'library2'); // Đảm bảo tên cơ sở dữ liệu là "library2"

// Thiết lập kết nối cơ sở dữ liệu.
try {
    $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Thiết lập chế độ hiển thị lỗi.
} catch (PDOException $e) {
    exit("Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage());
}

// Truy vấn để lấy dữ liệu từ bảng "books"
$sql = "SELECT * FROM btlbooks";
$stmt = $dbh->query($sql);
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Information</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
<i class="fa-brands fa-facebook"></i>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên Sách</th>
            <th>Thể loại</th>
            <th>Tác giả</th>
            <th>ISBN</th>
            <th>Giá</th>
        </tr>
        <?php
        $cnt = 1;
        foreach ($books as $book) {
        ?>
            <tr>
                <td><?php echo $cnt; ?></td>
                <td><?php echo $book['BookName']; ?></td>
                <td><?php echo $book['CatId']; ?></td>
                <td><?php echo $book['AuthorId']; ?></td>
                <td><?php echo $book['ISBNNumber']; ?></td>
                <td><?php echo $book['BookPrice']; ?></td>
            </tr>
        <?php
            $cnt++;
        }
        ?>
    </table>
</body>

</html>