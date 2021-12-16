<?php 
// gọi file xử lí đến 
include '../Class/login_admin.php';
?>
<?php  


$class = new adminlogin();// Tạo 1 class mới từ class của file login_admin.php

if($_SERVER['REQUEST_METHOD'] === 'POST'){//kiểm tra phương thức gửi đi của form

    $admin_email = $_POST['admin_email'];
    $admin_pass = md5($_POST['admin_password']);

    $check= $class->login_admin( $admin_email, $admin_pass );// từ class mới  gọi đến hàm login_admin từ file login_admin.php

}


 ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from truelysell-admin.dreamguystech.com/template/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Jun 2021 14:22:17 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Đăng nhâp quản trị Vascara</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="template_admin/favicon.ico">

    <!-- Fontawesome CSS -->
    <link href="template_admin/plugins/fontawesome/css/fontawesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="template_admin/plugins/fontawesome/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="template_admin/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="template_admin/css/admin.css">
   
</head>

<body>
    <div class="main-wrapper">

        <div class="login-page">
            <div class="login-body container">
                <div class="loginbox">
                    <div class="login-right-wrap">
                        <div class="account-header">
                            <div class="account-logo text-center mb-4">
                                <a href="index.php">
                                    <img src="template_admin/vascra.png" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="login-header">

                            <h3 style="text-align: center; margin:30px 20px">Hệ thống quản trị <span class="text-vascara">VASCARA</span></h3>
                        </div>
                        <?php 
                            if(isset($check)){
                                echo '<p class="alert_check">'.$check.'</p>';
                            }

                             ?>

                        <form  action="" method="post">
                            
                            
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input name="admin_email" required class="form-control" type="text" placeholder="Nhập địa chỉ email">
                            </div>
                            <div class="form-group mb-4">
                                <label class="control-label">Mật khẩu</label>
                                <input name="admin_password" required class="form-control" type="password" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="text-center">
                                <input  type="submit" value="Đăng nhập" class="btn bg-vascara btn-block account-btn" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="template_admin/js/jquery-3.5.0.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="template_admin/js/popper.min.js"></script>
    <script src="template_admin/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="template_admin/js/admin.js"></script>

</body>


</html>