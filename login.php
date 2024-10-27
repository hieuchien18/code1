<?php
session_start();
ob_start(); // Bật bộ đệm đầu ra
error_reporting(0);
include('includes/config.php');

if ($_SESSION['login'] != '') {
    $_SESSION['login'] = '';
}

if (isset($_POST['login'])) {
    // Mã xác minh captcha
    if ($_POST["vercode"] != $_SESSION["vercode"] || $_SESSION["vercode"] == '') {
        echo "<script>alert('Incorrect verification code');</script>";
    } else {
        $email = $_POST['emailid'];
        $password = $_POST['password']; // Không mã hóa

        $sql = "SELECT EmailId, Password, StudentId, Status FROM tblstudents WHERE EmailId=:email AND Password=:password";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {
            foreach ($results as $result) {
                $_SESSION['stdid'] = $result->StudentId;
                if ($result->Status == 1) {
                    $_SESSION['login'] = $_POST['emailid'];
                    header("Location: dashboard.php");
                    exit();
                } else {
                    echo "<script>alert('Your Account Has been blocked. Please contact admin');</script>";
                }
            }
        } else {
            echo "<script>alert('Invalid Details');</script>";
        }
    }
}
?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | </title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        .social-icons {
            margin-bottom: 20px; /* Khoảng cách giữa các biểu tượng và form đăng nhập */
        }
        
        .social-icons .social-icon {
            display: inline-block;
            margin: 0 10px; /* Khoảng cách giữa các biểu tượng */
        }
        
        .social-icons .social-icon img {
            width: 40px; /* Chiều rộng biểu tượng */
            height: auto; /* Đảm bảo tỷ lệ khung hình của biểu tượng */
        }
        
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">USER LOGIN FORM</h4>
</div>
</div>
<div class="social-icons text-center">
                <a href="#" class="social-icon">
                    <img src="assets/img/fb.png" alt="Facebook" />
                </a>
                <a href="#" class="social-icon">
                    <img src="assets/img/gg.png" alt="Google" />
                </a>
                <a href="#" class="social-icon">
                    <img src="assets/img/mcr.png" alt="Microsoft" />
                </a>
            </div>        
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 LOGIN FORM
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Enter Email id</label>
<input class="form-control" type="text" name="emailid" required autocomplete="off" />
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password" required autocomplete="off"  />
<p class="help-block"><a href="user-forgot-password.php">Forgot Password</a></p>
</div>

 <div class="form-group">
<label>Verification code : </label>
<input type="text" class="form-control1"  name="vercode" maxlength="5" autocomplete="off" required  style="height:25px;" />&nbsp;<img src="captcha.php">
</div> 

 <button type="submit" name="login" class="btn btn-info">LOGIN </button> | <a href="signup.php">Not Register Yet</a>
</form>
 </div>
</div>
</div>
</div>  
<!---LOGIN PANEL END-->            
             
 
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>
</html>