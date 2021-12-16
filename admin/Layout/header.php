
 <?php 
     ob_start();
     include("../Lib/session.php");
    session::checkSession();

 ?>
 <!DOCTYPE html>
<html lang="en">
<!-- Mirrored from truelysell-admin.dreamguystech.com/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Jun 2021 14:21:50 GMT -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>Hệ thống quản trị Vascara</title>

    <base href="http://localhost/PHP_MVC/admin/">
    <!-- Favicons -->
    <link rel="shortcut icon" href="template_admin/favicon.ico" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="template_admin/plugins/bootstrap/css/bootstrap.min.css" />

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="template_admin/plugins/fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="template_admin/plugins/fontawesome/css/all.min.css" />

    <!-- Animate CSS -->
    <link rel="stylesheet" href="template_admin/css/animate.min.css" />

    <!-- Select CSS -->
    <link rel="stylesheet" href="template_admin/css/select2.min.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="template_admin/css/admin.css" />
    <link href="template_admin/css/toastr.css" rel="stylesheet" />





   

</head>

<body>
    <div class="main-wrapper">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <a href="dashboard.html" class="logo logo-small">
                    <img src="template_admin/Asset/logo.png" alt="Logo" width="30" height="30" />
                </a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-align-left"></i>
            </a>
            <a class="mobile_btn" id="mobile_btn" href="javascript:void(0);">
                <i class="fas fa-align-left"></i>
            </a>

            <ul class="nav user-menu">
                <!-- User Menu -->
                <li class="nav-item dropdown">

                    <a href="javascript:void(0)" class="dropdown-toggle user-link nav-link" data-toggle="dropdown">
                        <span class="user-img">

                            <span class="user_name_admin"> <?php echo Session::get("admin_name"); ?></span>
                            <img class="rounded-circle"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQdeeVu5CWReDBpxNGN9QHVsVT6l33OLK4mIfcy6L-obDRXBxgGiSu3w44JIfj-MU9eu3Y&usqp=CAU"
                                width="40" alt="Admin" />
                        </span>
                    </a>

                    <?php if(isset($_GET['url']) && ($_GET['url']=="logout")){
                        Session::destroy();
                    }

                     ?>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="?url=logout">Đăng xuất</a>
                    </div>
                </li>
                <!-- /User Menu -->
            </ul>
        </div>
        <!-- /Header -->