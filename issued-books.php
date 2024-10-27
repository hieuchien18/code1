<?php
session_start();
error_reporting(E_ALL); // Bật báo lỗi để giúp việc gỡ lỗi
ini_set('display_errors', 1); // Hiển thị lỗi trên trình duyệt

// Kết nối đến cơ sở dữ liệu
$serverName = "tcp:qlnt-server.database.windows.net,1433"; // Tên máy chủ
$database = "qltv1"; // Tên cơ sở dữ liệu
$username = "admin123"; // Tên người dùng
$password = "Loan2002@"; // Mật khẩu

try {
    // Tạo kết nối đến cơ sở dữ liệu
    $dbh = new PDO("sqlsrv:Server=$serverName;Database=$database", $username, $password);
    // Thiết lập chế độ báo lỗi
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Bật chế độ báo lỗi
} catch (PDOException $e) {
    // Nếu kết nối không thành công, hiển thị thông báo lỗi
    echo "Connection failed: " . $e->getMessage(); // Hiển thị lỗi kết nối
    exit; // Thoát nếu không kết nối được
}

if(strlen($_SESSION['login']) == 0) {   
    header('location:index.php');
    exit; // Đảm bảo thoát ngay sau khi chuyển hướng
} else { 
    if(isset($_GET['del'])) {
        $id = $_GET['del'];
        $sql = "DELETE FROM tblbooks WHERE id = :id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $_SESSION['delmsg'] = "Book deleted successfully";
        header('location:manage-books.php');
        exit; // Đảm bảo thoát ngay sau khi chuyển hướng
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Manage Issued Books</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <!-- MENU SECTION START -->
    <?php include('includes/header.php'); ?>
    <!-- MENU SECTION END -->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Manage Issued Books</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Issued Books</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>ISBN</th>
                                            <th>Issued Date</th>
                                            <th>Return Date</th>
                                            <th>Fine in (USD)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$sid = $_SESSION['stdid'];
$sql = "SELECT BookName, ISBNNumber, IssuesDate, ReturnDate, fine FROM tblbooks WHERE student_id = :sid"; // Câu lệnh SQL lấy thông tin sách đã phát
$query = $dbh->prepare($sql);
$query->bindParam(':sid', $sid, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;

if ($query->rowCount() > 0) {
    foreach ($results as $result) {              
?>                                      	
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt); ?></td>
                                            <td class="center"><?php echo htmlentities($result->BookName); ?></td>
                                            <td class="center"><?php echo htmlentities($result->ISBNNumber); ?></td>
                                            <td class="center"><?php echo htmlentities($result->IssuesDate); ?></td>
                                            <td class="center">
                                                <?php if ($result->ReturnDate == "") { ?>
                                                    <span style="color:red">Not Returned Yet</span>
                                                <?php } else {
                                                    echo htmlentities($result->ReturnDate);
                                                } ?>
                                            </td>
                                            <td class="center"><?php echo htmlentities($result->fine); ?></td>
                                        </tr>
<?php 
        $cnt++;
    }
} else {
    echo "<tr><td colspan='6' class='center'>No records found</td></tr>";
}
?>                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Advanced Tables -->
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END -->
    <?php include('includes/footer.php'); ?>
    <!-- FOOTER SECTION END -->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THỜI GIAN TẢI -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
