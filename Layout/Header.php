<?php
    ob_start();
    include_once 'Lib/session.php';
    Session::init();
?>
<?php
    include_once 'Lib/database.php';
    include_once  'Helper/format.php';
    $fm = new Format();
    $db = new Database();
    ?>

<?php
    spl_autoload_register(function ($className){
        include_once "Class/".$className.".php";
    });

    $cate =new category();
    $pd = new product();
    $br = new brand();
    $ct = new cart();
    $lg = new login();
?>

<?php if(isset($_GET['url']) && ($_GET['url']=="logout")){
    Session::destroy();
    $detele_cart = $ct ->delete_data_cart();
}

?>
  <!-- Begin Main Header Area -->
        <header class="main-header_area position-relative">

            <div class="header-middle py-5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="header-middle-wrap">
                                <a href="index.php" class="header-logo">
                                    <img src="Template/images/logo/dark.png" alt="Header Logo">
                                </a>
                                <div class="header-search-area d-none d-lg-block">
                                    <form action="#" class="header-searchbox">

                                        <input class="input-field" type="text" placeholder="Search Products">
                                        <button class="btn btn-outline-whisper btn-primary-hover" type="submit"><i class="pe-7s-search"></i></button>
                                    </form>
                                </div>
                                <div class="header-right">
                                    <ul>
                                        <li class="dropdown d-none d-md-block">
                                            <?php
                                            $check = Session::get("check_user");
                                            $name_user = Session::get("user_name");
                                                if($check == false){

                                            ?>
                                                    <a class="btn btn-link dropdown-toggle ht-btn p-0" href="login.php">
                                                        <i class="pe-7s-users"></i> Đăng nhập
                                                    </a>

                                            <?php
                                                }else{
                                            ?>
                                            <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button" id="settingButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="pe-7s-users"></i> <?php echo $name_user;  ?>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingButton">
                                                <li><a class="dropdown-item" href="login.php?url=update_user">Tài khoản</a></li>
                                                <li><a class="dropdown-item" href="login.php?url=logout">Đăng xuất</a></li>
                                            </ul>
                                            <?php
                                            }
                                            ?>
                                        </li>
                                        <li class="d-none d-md-block">
                                            <a href="wishlist.php">
                                                <i class="pe-7s-like"></i>
                                            </a>
                                        </li>
                                        <li class="d-block d-lg-none">
                                            <a href="#searchBar" class="search-btn toolbar-btn">
                                                <i class="pe-7s-search"></i>
                                            </a>
                                        </li>
                                        <li class="minicart-wrap me-3 me-lg-0">
                                            <a href="cart.php" class="minicart-btn ">
                                                <i class="pe-7s-shopbag"></i>
                                                <span class="quantity">
                                                    <?php
                                                    $qty = 0;
                                                    $checkCart = $ct->check_cart();
                                                    if(isset($checkCart)){
                                                        $qty= Session::get("qty");
                                                        echo $qty;
                                                    }else{


                                                        echo '0';
                                                    }

                                                    ?>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="mobile-menu_wrap d-block d-lg-none">
                                            <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                                <i class="pe-7s-menu"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-header header-sticky" data-bg-color="#bac34e">
                <div class="container">
                    <div class="main-header_nav position-relative">
                        <div class="row align-items-center">
                            <div class="col-lg-12 d-none d-lg-block">
                                <div class="main-menu">
                                    <nav class="main-nav">
                                        <ul>
                                            <li >
                                                <a href="index.php">Trang chủ
                                                </a>

                                            </li>
                                            <?php
                                                $row_category = $cate ->select_category();
                                                if($row_category){
                                                     $i=0;while ($value= $row_category -> fetch_array()){
                                                        $i++;
                                                        ?>
                                            <li>
                                                <a href="category.php?id_category=<?php echo $value['category_id']; ?>">
                                                    <?php echo $value['category_name']; ?>
                                                </a>
                                            </li>
                                            <?php }} ?>

                                            <li>
                                                <a href="contact.php">Liên hệ</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu_wrapper" id="mobileMenu">
                <div class="harmic-offcanvas-body">
                    <div class="inner-body">
                        <div class="harmic-offcanvas-top">
                            <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                        </div>
                        <div class="offcanvas-user-info text-center px-6 pb-5">

                            <ul class="dropdown-wrap justify-content-center text-silver">

                                <li class="dropdown dropup">
                                    <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button" id="settingButtonTwo" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="pe-7s-users"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingButtonTwo">
                                        <li><a class="dropdown-item" href="my-account.php">My account</a></li>
                                        <li><a class="dropdown-item" href="login.php">Login | Register</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="wishlist.php">
                                        <i class="pe-7s-like"></i>
                                    </a>

                                </li>
                            </ul>
                        </div>
                        <div class="offcanvas-menu_area">
                            <nav class="offcanvas-navigation">
                                <ul class="mobile-menu">
                                    <li class="menu-item-has-children">
                                        <a href="#">
                                            <span class="mm-text">Trang chủ</span>
                                        </a>
                                    </li>

                                        <?php
                                        $row_category = $cate ->select_category();
                                        if($row_category)
                                        {
                                        $i=0;while ($value= $row_category -> fetch_assoc()){
                                            $i++;
                                            ?>
                                            <li>
                                                <a href="category.php?id_category=<?php echo $value['category_id']; ?>">
                                                     <span class="mm-text"><?php echo $value['category_name']; ?></span>
                                                </a>
                                            </li>
                                        <?php }} ?>




                                    <li>
                                        <a href="contact.php">
                                            <span class="mm-text">Liên hệ</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-search_wrapper" id="searchBar">
                <div class="harmic-offcanvas-body">
                    <div class="container h-100">
                        <div class="offcanvas-search">
                            <div class="harmic-offcanvas-top">
                                <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                            </div>
                            <span class="searchbox-info">Start typing and press Enter to search</span>
                            <form action="#" class="hm-searchbox">
                                <input type="text" placeholder="Search">
                                <button class="search-btn" type="submit"><i class="pe-7s-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-minicart_wrapper" id="miniCart">
                <div class="harmic-offcanvas-body">
                    <div class="minicart-content">
                        <div class="minicart-heading">
                            <h4 class="mb-0">Shopping Cart</h4>
                            <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                        </div>
                        <ul class="minicart-list">
                            <li class="minicart-product">
                                <a class="product-item_remove" href="#"><i
                                    class="pe-7s-close"></i></a>
                                <a href="shop.php" class="product-item_img">
                                    <img class="img-full" src="Template/images/product/small-size/1-1-112x124.jpg" alt="Product Image">
                                </a>
                                <div class="product-item_content">
                                    <a class="product-item_title" href="shop.php">Black Pepper Grains</a>
                                    <span class="product-item_quantity">1 x $80.00</span>
                                </div>
                            </li>
                            <li class="minicart-product">
                                <a class="product-item_remove" href="#"><i
                                    class="pe-7s-close"></i></a>
                                <a href="shop.php" class="product-item_img">
                                    <img class="img-full" src="Template/images/product/small-size/1-2-112x124.jpg" alt="Product Image">
                                </a>
                                <div class="product-item_content">
                                    <a class="product-item_title" href="shop.php">Peanut Big Bean</a>
                                    <span class="product-item_quantity">1 x $80.00</span>
                                </div>
                            </li>
                            <li class="minicart-product">
                                <a class="product-item_remove" href="#">
                                    <i class="pe-7s-close"></i>
                                </a>
                                <a href="shop.php" class="product-item_img">
                                    <img class="img-full" src="Template/images/product/small-size/1-3-112x124.jpg" alt="Product Image">
                                </a>
                                <div class="product-item_content">
                                    <a class="product-item_title" href="shop.php">Dried Lemon Green</a>
                                    <span class="product-item_quantity">1 x $80.00</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="minicart-item_total">
                        <span>Subtotal</span>
                        <span class="ammount">$240.00</span>
                    </div>
                    <div class="group-btn_wrap d-grid gap-2">
                        <a href="cart.php" class="btn btn-secondary btn-primary-hover">View Cart</a>
                        <a href="checkout.php" class="btn btn-secondary btn-primary-hover">Checkout</a>
                    </div>
                </div>
            </div>
            <div class="global-overlay"></div>
        </header>
        <!-- Main Header Area End Here -->