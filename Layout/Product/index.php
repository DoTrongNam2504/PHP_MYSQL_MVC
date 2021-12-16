<?php

if(isset($_GET['id_product'])){
    $id= $_GET['id_product'];
}
?>
<?php

$get_name_pd = $pd ->get_detail_product_byID($id);
if($get_name_pd){
while ($row_pd_name = $get_name_pd-> fetch_assoc()){
?>
    <?php
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['add-to-cart'])){
            $qty_buy = $_POST['add-to-cart-qty'];
            $add_to_cart = $ct -> add_to_cart($id,$qty_buy);
        }


    ?>
<div class="single-product-area section-space-top-100">
    <div class="container">
        <div class="row">

            <!--  image-->
            <div class="col-lg-6">
                <div class="single-product-img">
                    <div class="swiper-container single-product-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">

                                <a href="admin/uploads/<?php echo  $row_pd_name['product_image'];?>"
                                   class="single-img gallery-popup">
                                    <img class="img-full"
                                         src="admin/uploads/<?php echo  $row_pd_name['product_image'];?>"
                                         alt="Product Image">
                                </a>
                            </div>

                        </div>
                        <!-- Add Pagination -->
                    </div>
                </div>
            </div>
            <!--end-image-->
            <!--  content-->
            <div class="col-lg-6 pt-9 pt-lg-0">
                <div class="single-product-content">
                    <h2 class="title"><?php echo $row_pd_name['product_name'];?></h2>
                    <div class="price-box pb-1">
                        <span class="new-price text-danger">
                            <?php echo number_format( $row_pd_name['product_price'], 0 ,',', '.').'đ';?>
                        </span>
                    </div>
                    <div class="rating-box-wrap pb-7">
                        <div class="rating-box">
                            <ul>
                                <li><i class="pe-7s-star"></i></li>
                                <li><i class="pe-7s-star"></i></li>
                                <li><i class="pe-7s-star"></i></li>
                                <li><i class="pe-7s-star"></i></li>
                                <li><i class="pe-7s-star"></i></li>
                            </ul>
                        </div>

                    </div>
                    <p class="short-desc mb-6">
                        <?php
                            echo $row_pd_name['product_desc'];
                        ?>
                    </p>

                    <form action="" method="post">
                    <ul class="quantity-with-btn pb-7">
                        <li class="quantity">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" value="1" min="1" name="add-to-cart-qty" type="number">
                            </div>
                        </li>
                        <li class="add-to-cart">
                            <input type="submit" name ="add-to-cart" class="btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0"
                              value="Add to cart" >
                        </li>
                        <li class="wishlist-btn-wrap">
                            <a class="btn rounded-0" href="wishlist.html">
                                <i class="pe-7s-like"></i>
                            </a>
                        </li>
                    </ul>

                    </form>
                    <p>
                        <?php
                        if(isset($add_to_cart)) {


                                echo '<span style ="color:red">Sản phẩm được thêm rồi !</span>';


                        }
                        ?></p>
                    <div class="product-category text-matterhorn pb-2">
                        <span class="title">Danh mục :</span>
                        <ul>
                            <li>
                                <a href="category.php?id_category=<?php echo $row_pd_name['category_id'];?>">
                                    <?php echo $row_pd_name['category_name'];?>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="product-category product-tags text-matterhorn pb-4">
                        <span class="title">Thương hiệu :</span>
                        <ul>
                            <li>
                                <a href="brand.php?id_brand=<?php echo $row_pd_name['brand_id'];?>">
                                    <?php echo $row_pd_name['brand_name'];?>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="social-link align-items-center">
                        <span class="title pe-3">Chia sẻ:</span>
                        <ul>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="fa fa-pinterest-p"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="fa fa-tumblr"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="fa fa-dribbble"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--end_content-->
        </div>
    </div>
</div>
<div class="product-tab-area section-space-top-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav product-tab-nav product-tab-style-2" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="active btn btn-custom-size" id="description-tab" data-bs-toggle="tab"
                           href="#description" role="tab" aria-controls="description" aria-selected="true">
                            Chi tiết sản phẩm
                        </a>
                    </li>
<!--                    <li class="nav-item" role="presentation">-->
<!--                        <a class="btn btn-custom-size" id="reviews-tab" data-bs-toggle="tab" href="#reviews"-->
<!--                           role="tab" aria-controls="reviews" aria-selected="false">-->
<!--                            Reviews-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item" role="presentation">-->
<!--                        <a class="btn btn-custom-size" id="shipping-tab" data-bs-toggle="tab"-->
<!--                           href="#shipping" role="tab" aria-controls="shipping" aria-selected="false">-->
<!--                            Shipping-->
<!--                        </a>-->
<!--                    </li>-->
                </ul>
                <div class="tab-content product-tab-content">
                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                         aria-labelledby="description-tab">
                        <div class="product-description-body">
                            <p class="short-desc mb-0">

                               <?php echo $row_pd_name['product_con'];?>
                            </p>
                        </div>
                    </div>
<!--                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">-->
<!--                        <div class="product-review-body">-->
<!--                            <h4 class="heading mb-5">3 Review Items</h4>-->
<!--                            <ul class="user-info-wrap">-->
<!--                                <li>-->
<!--                                    <ul class="user-info">-->
<!--                                        <li class="user-avatar">-->
<!--                                            <img src="assets/images/testimonial/user/1.png"-->
<!--                                                 alt="User Image">-->
<!--                                        </li>-->
<!--                                        <li class="user-comment">-->
<!--                                            <div class="rating-box">-->
<!--                                                <ul>-->
<!--                                                    <li><i class="pe-7s-star"></i></li>-->
<!--                                                    <li><i class="pe-7s-star"></i></li>-->
<!--                                                    <li><i class="pe-7s-star"></i></li>-->
<!--                                                    <li><i class="pe-7s-star"></i></li>-->
<!--                                                    <li><i class="pe-7s-star"></i></li>-->
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                            <div class="meta">-->
<!--                                                <span><strong>Oscar -</strong> March 15, 2021</span>-->
<!--                                            </div>-->
<!--                                            <p class="short-desc mb-0">“Sed ligula sapien, fermentum id est-->
<!--                                                eget,-->
<!--                                                viverra auctor sem. Vivamus maximus enim vitae urna porta,-->
<!--                                                ut-->
<!--                                                euismod nibh lacinia ellentesque at diam voluptas quas nisi,-->
<!--                                                culpa-->
<!--                                                in accusantium“</p>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <ul class="user-info">-->
<!--                                        <li class="user-avatar">-->
<!--                                            <img src="assets/images/testimonial/user/1.png"-->
<!--                                                 alt="User Image">-->
<!--                                        </li>-->
<!--                                        <li class="user-comment">-->
<!--                                            <div class="rating-box">-->
<!--                                                <ul>-->
<!--                                                    <li><i class="pe-7s-star"></i></li>-->
<!--                                                    <li><i class="pe-7s-star"></i></li>-->
<!--                                                    <li><i class="pe-7s-star"></i></li>-->
<!--                                                    <li><i class="pe-7s-star"></i></li>-->
<!--                                                    <li><i class="pe-7s-star"></i></li>-->
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                            <div class="meta">-->
<!--                                                <span><strong>Oscar -</strong> March 15, 2021</span>-->
<!--                                            </div>-->
<!--                                            <p class="short-desc mb-0">“Sed ligula sapien, fermentum id est-->
<!--                                                eget,-->
<!--                                                viverra auctor sem. Vivamus maximus enim vitae urna porta,-->
<!--                                                ut-->
<!--                                                euismod nibh lacinia ellentesque at diam voluptas quas nisi,-->
<!--                                                culpa-->
<!--                                                in accusantium“</p>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <ul class="user-info">-->
<!--                                        <li class="user-avatar">-->
<!--                                            <img src="assets/images/testimonial/user/1.png"-->
<!--                                                 alt="User Image">-->
<!--                                        </li>-->
<!--                                        <li class="user-comment">-->
<!--                                            <div class="rating-box">-->
<!--                                                <ul>-->
<!--                                                    <li><i class="pe-7s-star"></i></li>-->
<!--                                                    <li><i class="pe-7s-star"></i></li>-->
<!--                                                    <li><i class="pe-7s-star"></i></li>-->
<!--                                                    <li><i class="pe-7s-star"></i></li>-->
<!--                                                    <li><i class="pe-7s-star"></i></li>-->
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                            <div class="meta">-->
<!--                                                <span><strong>Oscar -</strong> March 15, 2021</span>-->
<!--                                            </div>-->
<!--                                            <p class="short-desc mb-0">“Sed ligula sapien, fermentum id est-->
<!--                                                eget,-->
<!--                                                viverra auctor sem. Vivamus maximus enim vitae urna porta,-->
<!--                                                ut-->
<!--                                                euismod nibh lacinia ellentesque at diam voluptas quas nisi,-->
<!--                                                culpa-->
<!--                                                in accusantium“</p>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                            <div class="feedback-area pt-5">-->
<!--                                <h2 class="heading mb-1">Add a review</h2>-->
<!--                                <p class="short-desc mb-3">Your email address will not be published.</p>-->
<!--                                <div class="rating-box">-->
<!--                                    <span>Your rating</span>-->
<!--                                    <ul class="ps-4">-->
<!--                                        <li><i class="pe-7s-star"></i></li>-->
<!--                                        <li><i class="pe-7s-star"></i></li>-->
<!--                                        <li><i class="pe-7s-star"></i></li>-->
<!--                                        <li><i class="pe-7s-star"></i></li>-->
<!--                                        <li><i class="pe-7s-star"></i></li>-->
<!--                                    </ul>-->
<!--                                </div>-->
<!--                                <form class="feedback-form pt-8" action="#">-->
<!--                                    <div class="group-input">-->
<!--                                        <div class="form-field me-md-6 mb-6 mb-md-0">-->
<!--                                            <input type="text" name="name" placeholder="Your Name*"-->
<!--                                                   class="input-field">-->
<!--                                        </div>-->
<!--                                        <div class="form-field me-md-6 mb-6 mb-md-0">-->
<!--                                            <input type="text" name="email" placeholder="Your Email*"-->
<!--                                                   class="input-field">-->
<!--                                        </div>-->
<!--                                        <div class="form-field">-->
<!--                                            <input type="text" name="number" placeholder="Phone number"-->
<!--                                                   class="input-field">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="form-field mt-6">-->
<!--                                                    <textarea name="message" placeholder="Message"-->
<!--                                                              class="textarea-field"></textarea>-->
<!--                                    </div>-->
<!--                                    <div class="button-wrap mt-8">-->
<!--                                        <button type="submit" value="submit"-->
<!--                                                class="btn btn-custom-size lg-size btn-secondary btn-primary-hover btn-lg rounded-0"-->
<!--                                                name="submit">Submit</button>-->
<!--                                    </div>-->
<!--                                </form>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">-->
<!--                        <div class="product-shipping-body">-->
<!--                            <h4 class="title">Shipping</h4>-->
<!--                            <p class="short-desc mb-4">The item will be shipped from China. So it need 15-20-->
<!--                                days to-->
<!--                                deliver. Our product is good with reasonable price and we believe you will-->
<!--                                worth it.-->
<!--                                So please wait for it patiently! Thanks.Any question please kindly to-->
<!--                                contact us and-->
<!--                                we promise to work hard to help you to solve the problem</p>-->
<!--                            <h4 class="title">About return request</h4>-->
<!--                            <p class="short-desc mb-4">If you don't need the item with worry, you can-->
<!--                                contact us-->
<!--                                then we will help you to solve the problem, so please close the return-->
<!--                                request!-->
<!--                                Thanks</p>-->
<!--                            <h4 class="title">Guarantee</h4>-->
<!--                            <p class="short-desc mb-0">If it is the quality question, we will resend or-->
<!--                                refund to-->
<!--                                you; If you receive damaged or wrong items, please contact us and attach-->
<!--                                some-->
<!--                                pictures about product, we will exchange a new correct item to you after the-->
<!--                                confirmation.</p>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php }}?>
<div class="product-slider-area section-space-top-95 section-space-bottom-100">
    <div class="container">
        <div class="section-title text-center pb-55">
            <span class="sub-title text-primary">You Can Be Love It</span>
            <h2 class="title mb-0">Sản phẩm liên quan</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="swiper-slider-holder swiper-arrow">
                    <div class="swiper-container product-slider border-issue">
                        <div class="swiper-wrapper">
                            <?php
                            $row_product = $pd ->get_noibat();
                            if($row_product){
                            while ($value = $row_product -> fetch_assoc() ){
                            $i++;

                            ?>


                            <div class="swiper-slide">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect">
                                        <a href="detail.php?id_product=<?php echo $value['product_id'];?>">
                                            <img class="img-full" src="admin/uploads/<?php echo $value['product_image']; ?>" alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="pe-7s-shuffle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content texx">
                                        <a class="product-name" href="?detail.php&id=<?php echo $value['product_id'];?>">
                                            <?php echo $value['product_name'];?>
                                        </a>
                                        <div class="price-box pb-1">
                                            <span class="new-price"><?php echo number_format($value['product_price'], 0,',','.').'đ';?></span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>
                                                <li><i class="pe-7s-star"></i></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <?php
                            }}
                            ?>


                        </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</div>

</main>
