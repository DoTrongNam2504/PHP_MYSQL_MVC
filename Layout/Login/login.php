
<?php
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])){

    $insert_user = $lg -> insert_user($_POST);
}

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){

    $login_user = $lg -> login_user($_POST);
}
?>
<!-- Begin Main Content Area -->
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="Template/images/breadcrumb/bg/1-1-1920x373.jpg">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Đăng nhập</h2>
                        <ul>
                            <li>
                                <a href="index.php">Home <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>Đăng nhập</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="login-register-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <form action="#" method="post">
                        <div class="login-form">
                            <h4 class="login-title">Đăng nhập</h4>
                            <?php
                            if(isset($login_user)){
                                echo '<span class="color-red">'.$login_user.'</span>';
                            }
                            ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Email *</label>
                                    <input type="email" name="login_email" placeholder="Nhập Email........">
                                </div>
                                <div class="col-lg-12">
                                    <label>Password</label>
                                    <input type="password" name="login_password" placeholder="Nhập Password....">
                                </div>


                                <div class="col-lg-12 pt-5">
                                    <button class="btn btn-custom-size lg-size btn-secondary btn-primary-hover rounded-0" type="submit" name="login">
                                        Đăng nhập</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 pt-10 pt-lg-0">

                    <form action="#" method="post">
                        <div class="login-form">
                            <?php
                            if(isset($insert_user)){
                                echo '<span class="color-red">'.$insert_user.'</span>';
                            }
                            ?>
                            <h4 class="login-title">Đăng ký</h4>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label>Full Name</label>
                                    <input type="text" name="res_name" placeholder="Họ và tên ....">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label>Phone</label>
                                    <input type="tel" name ="res_phone" placeholder="Phone">
                                </div>
                                <div class="col-md-12">
                                    <label>Email Address*</label>
                                    <input type="email" name ="res_email" placeholder="Email Address">
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input type="password"  name ="res_password" placeholder="Password">
                                </div>
                                <div class="col-md-6">
                                    <label>Địa chỉ</label>
                                    <input type="text" name ="res_address" placeholder="Address...">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-custom-size lg-size btn-secondary btn-primary-hover rounded-0" type="submit" name="register">Đăng kí</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->
