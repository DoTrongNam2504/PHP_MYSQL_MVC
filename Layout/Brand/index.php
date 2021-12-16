<?php
if(isset($_GET['id_brand'])){
    $id = $_GET['id_brand'];
}
?>
<div class="shop-area section-space-y-axis-100">
    <div class="container">
        <div class="row">
            <?php
            include 'Layout/sidebar_right.php'
            ?>
            <div class="col-lg-9 order-1">
                <div class="product-topbar">
                    <ul>
                        <li class="product-view-wrap">
                            <ul class="nav" role="tablist">
                                <li class="grid-view" role="presentation">
                                    <a class="active" id="grid-view-tab" data-bs-toggle="tab" href="#grid-view" role="tab" aria-selected="true">
                                        <i class="fa fa-th"></i>
                                    </a>
                                </li>
                                <li class="list-view" role="presentation">
                                    <a id="list-view-tab" data-bs-toggle="tab" href="#list-view" role="tab" aria-selected="true">
                                        <i class="fa fa-th-list"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="short">
                            <select class="nice-select wide rounded-0">
                                <option value="1">Sort by Default</option>
                                <option value="2">Sort by Popularity</option>
                                <option value="3">Sort by Rated</option>
                                <option value="4">Sort by Latest</option>
                                <option value="5">Sort by High Price</option>
                                <option value="6">Sort by Low Price</option>
                            </select>
                        </li>
                    </ul>
                </div>
                <div class="tab-content text-charcoal pt-8">
                    <div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
                        <div class="product-grid-view row">


                            <?php
                            $row_product = $pd ->get_product_by_brandID($id);
                            if($row_product){
                                while ($value = $row_product -> fetch_assoc() ){
                                    $i++;

                                    ?>
                                    <div class="col-lg-4 col-sm-6 pt-6">
                                        <div class="product-item">
                                            <div class="product-img img-zoom-effect">
                                                <a href="detail.php?id_product=<?php echo $value['product_id']; ?>">
                                                    <img class="img-full" src="admin/uploads/<?php echo $value['product_image']; ?>" alt="Product Images">
                                                </a>
                                                
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="detail.php?id_product=<?php echo $value['product_id']; ?>">
                                                    <?php echo $value['product_name']; ?>
                                                </a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price"><?php echo number_format( $value['product_price'],0,',','.').'đ'; ?></span>
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
                    <div class="tab-pane fade" id="list-view" role="tabpanel" aria-labelledby="list-view-tab">
                        <div class="product-list-view row">

                            <?php
                            $row_product = $pd ->get_product_by_brandID($id);
                            if($row_product){
                                while ($value = $row_product -> fetch_assoc() ){
                                    $i++;

                                    ?>


                                    <div class="col-12 pt-6">
                                        <div class="product-item">
                                            <div class="product-img img-zoom-effect">
                                                <a href="detail.php?id_product=<?php echo $value['product_id']; ?>">
                                                    <img class="img-full" src="admin/uploads/<?php echo $value['product_image']; ?>" alt="Product Images">
                                                </a>
                                                
                                            </div>
                                            <div class="product-content align-self-center">
                                                <a class="product-name" href="detail.php?id_product=<?php echo $value['product_id']; ?>">
                                                    <?php echo $value['product_name']; ?>
                                                </a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price"><?php echo number_format( $value['product_price'],0,',','.').'đ'; ?></span>
                                                </div>
                                                <div class="rating-box pb-2">
                                                    <ul>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                    </ul>
                                                </div>
                                                <p class="short-desc mb-0"> <?php echo $value['product_desc']; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                <?php }}?>

                        </div>
                    </div>
                </div>
                <div class="pagination-area pt-10">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span class="fa fa-chevron-left"></span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span class="fa fa-chevron-right"></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
</main>