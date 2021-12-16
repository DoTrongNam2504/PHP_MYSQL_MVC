
        <!-- Begin Shipping Area -->
        <div class="shipping-area section-space-top-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="shipping-item">
                            <div class="shipping-img">
                                <img src="Template/images/shipping/icon/plane.png" alt="Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h5 class="title">Free Shipping</h5>
                                <p class="short-desc mb-0">Miễn phí ship cho đơn hàng từ 500.000đ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 pt-6 pt-md-0">
                        <div class="shipping-item">
                            <div class="shipping-img">
                                <img src="Template/images/shipping/icon/earphones.png" alt="Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h5 class="title">Online Support</h5>
                                <p class="short-desc mb-0">Hỗ trợ khách hàng 24/7</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 pt-6 pt-lg-0">
                        <div class="shipping-item">
                            <div class="shipping-img">
                                <img src="Template/images/shipping/icon/shield.png" alt="Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h5 class="title">Secure Payment</h5>
                                <p class="short-desc mb-0">Hệ thống thanh toán bảo mật</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shipping Area End Here -->

        <!-- Begin Product Area -->
        <div class="product-area section-space-top-100">
            <div class="container">
                <div class="section-title text-center pb-55">
                    <span class="sub-title text-primary">NEW BRAND</span>
                    <h2 class="title mb-0">Thương hiệu nổi bật</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav product-tab-nav pb-10" id="myTab" role="tablist">

                            <?php
                                $row_brand = $br ->select_brand();
                                if($row_brand){
                                while ($value = $row_brand -> fetch_assoc() ){
                                    $i++;

                            ?>
                            <li class="nav-item" role="presentation">
                                <a  href="brand.php?id_brand=<?php echo $value['brand_id'];?>" >
                                    <div class="product-tab-icon">
                                        <img src="Template/images/product/icon/5.png" alt="Product Icon">
                                    </div>
                                    <?php
                                        echo $value['brand_name'];
                                    ?>
                                </a>
                            </li>

                            <?php
                                }}
                            ?>
                        </ul>

                    </div>
                </div>
            </div>
        </div>



        <!-- Begin Product Area -->
        <div class="product-area section-space-y-axis-100">
            <div class="container">
                <div class="section-title text-center pb-55">
                    <span class="sub-title text-primary">NEW PRODUCT</span>
                    <h2 class="title mb-0">Sản phẩm nổi bật</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper-container product-slider swiper-arrow with-radius border-issue">
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


                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="detail.php?id_product=<?php echo $value['product_id'];?>">
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
                            <!-- Add Arrows -->
                            <div class="swiper-nav-wrap">
                                <div class="swiper-button-next"></div>
                            </div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End Here -->

        <!-- Begin Banner Area -->
        <div class="banner-area banner-with-parallax py-10" data-bg-image="Template/images/banner/2-1-1920x523.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="parallax-img-wrap">
                            <div class="papaya">
                                <div class="scene fill">
                                    <div class="expand-width" data-depth="0.2">
                                        <img src="Template/images/banner/inner-img/2-1-503x430.png" alt="Banner Images">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="banner-content text-white text-center text-md-start">
                            <div class="section-title">
                                <span class="sub-title">Mua hàng ngay để nhận ưu đãi</span>
                                <h2 class="title font-size-60 mb-6">SALE OFF 20% </h2>
                            </div>
                            <div class="button-wrap pt-10">
                                <a class="btn btn-custom-size lg-size btn-white rounded-0" href="">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End Here -->

        <!-- Begin Product Area -->
        <div class="product-area section-space-top-100">
            <div class="container">
                <div class="section-title text-center pb-55">
                    <span class="sub-title text-primary">WISHLIST</span>
                    <h2 class="title mb-0">Sản phẩm yêu thích</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper-container product-list-slider border-issue">
                            <div class="swiper-wrapper">


                                <div class="swiper-slide">
                                    <div class="product-list-item">
                                        <div class="product-img img-zoom-effect">
                                            <a href="single-product.php">
                                                <img class="img-full" src="Template/images/product/small-size/1-1-112x124.jpg" alt="Product Images">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="single-product.php">Black Pepper Grains</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">$80.00</span>
                                            </div>
                                            <div class="rating-box-wrap">
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="cart.php">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
        <!-- Product Area End Here -->

        <!-- Begin Blog Area -->
        <div class="blog-area section-space-y-axis-100">
            <div class="container">
                <div class="section-title text-center pb-55">
                    <span class="sub-title text-primary">NEW BLOG</span>
                    <h2 class="title mb-0">Bài viết mới nhất</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper-container blog-slider">
                            <div class="swiper-wrapper">


                                <div class="swiper-slide">
                                    <div class="blog-item">
                                        <div class="blog-img img-zoom-effect">
                                            <a href="blog-detail-left-sidebar.php">
                                                <img class="img-full" src="Template/images/blog/medium-size/1-1-370x315.jpg" alt="Blog Image">
                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-meta text-dim-gray pb-3">
                                                <ul>
                                                    <li class="date"><i class="fa fa-calendar-o me-2"></i>May 21, 2021</li>
                                                    <li>
                                                        <span class="comments me-3">
                                                        <a href="javascript:void(0)">2 Comments</a>
                                                    </span>
                                                        <span class="link-share">
                                                        <a href="javascript:void(0)">Share</a>
                                                    </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5 class="title mb-4">
                                                <a href="blog-detail-left-sidebar.php">Lorem ipsum dolor consec adipisicing elit</a>
                                            </h5>
                                            <p class="short-desc mb-5">Lorem ipsum dolor sit amet, consectet adipi elit, sed do eius tempor incididunt ut labore gthydolore magna aliqua.</p>
                                            <div class="button-wrap">
                                                <a class="btn btn-custom-size btn-dark btn-lg rounded-0" href="blog-detail-left-sidebar.php">Read More</a>
                                            </div>
                                        </div>
                                    </div>
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
        <!-- Blog Area End Here -->