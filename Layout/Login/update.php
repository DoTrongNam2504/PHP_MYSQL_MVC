<?php
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update_user'])){

    $user_row = $lg -> update_user($_POST);
}
?>
<div class="col-md-2"></div>
<div class="myaccount-details col-md-8" style="margin: 0 auto">
    <h2 class="text-center mt-3 mb-3">Thông tin người dùng</h2>
    <?php
    $row =  $lg->select_user();
    if($row){
        while ($row_item = $row -> fetch_assoc()){
    ?>
    <form action="#" method="post" class="myaccount-form">


        <div class="myaccount-form-inner">
            <div class="single-input single-input-half">
                <label>Họ và tên*</label>
                <input type="text" name="user_name" value="<?php echo $row_item['user_name'];?>">
            </div>
            <div class="single-input single-input-half">
                <label>Điện thoại*</label>
                <input type="text" name="user_phone" value="<?php echo $row_item['user_phone'];?>">
            </div>
            <div class="single-input">
                <label>Email*</label>
                <input type="email" name="user_email" value="<?php echo $row_item['user_email'];?>">
            </div>
            <div class="single-input">
                <label>Địa chỉ</label>
                <input type="text" name="user_address" value="<?php echo $row_item['user_address'];?>">
            </div>

            <div class="single-input">
                <label>Mật khẩu mới</label>
                <input type="password" name="user_password_new">
            </div>

            <div class="single-input">
                <button class="btn btn-custom-size lg-size btn-secondary btn-primary-hover rounded-0" type="submit" name="update_user">
                    <span>Cập nhật</span>
                </button>
                <a href="index.php" class="btn btn-custom-size lg-size btn-secondary btn-primary-hover rounded-0" >
                    <span>Về trang chủ</span>
                </a>
            </div>
        </div>
    </form>
    <?php
    }}
    ?>
</div>
<div class="col-md-2"></div>
