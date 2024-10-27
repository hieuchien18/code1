<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        .content-wrapper {
            background-image: url('assets/img/back1.png');
            background-size: cover; /* Đảm bảo hình nền bao phủ toàn bộ phần tử */
            background-position: center; /* Đặt vị trí hình nền ở giữa */
            background-repeat: no-repeat; /* Ngăn hình nền lặp lại */
            height: 100vh; /* Chiều cao 100% của viewport */
            width: 100%; /* Chiều rộng 100% của phần tử cha */
            display: flex; /* Sử dụng flexbox để căn giữa nội dung */
            align-items: center; /* Căn giữa theo chiều dọc */
            justify-content: center; /* Căn giữa theo chiều ngang */
        }
        
        .start-btn {
            padding: 10px 25px; /* Kích thước của nút */
            font-size: 18px; /* Kích thước chữ */
            background-color: #CC6666; /* Màu nền của nút */
            color: white; /* Màu chữ của nút */
            border: none; /* Loại bỏ đường viền */
            border-radius: 5px; /* Bo tròn góc của nút */
            text-decoration: none; /* Loại bỏ gạch chân */
            text-align: center;
            border-radius: 10px;
            font-weight: bold; /* Căn giữa văn bản */
        }

        .start-btn:hover {
            background-color: #009900; /* Màu nền khi hover */
            text-decoration: none; /* Loại bỏ gạch chân khi hover */
        }
    </style>
</head>
<body>
    <!------MENU SECTION START-->
    <?php include('includes/header2.php'); ?>
    <!-- MENU SECTION END-->

    <div class="content-wrapper">
        <a href="login.php" class="start-btn">START</a>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php'); ?>
    <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
