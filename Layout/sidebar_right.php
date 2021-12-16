<div class="col-lg-3 order-2 pt-10 pt-lg-0">
    <div class="sidebar-area">
        <!-- danh mục sản phẩm-->
        <div class="widgets-area mb-9">
            <h2 class="widgets-title mb-5">DANH MỤC SẢN PHẨM</h2>
            <div class="widgets-item">
                <ul class="widgets-checkbox">
                    <?php
                    $get_all_cate = $cate->select_category();
                    if($get_all_cate){
                        $i = 0;
                        while ($row_cate = $get_all_cate -> fetch_assoc()){ $i++;
                            ?>
                            <li>
                                <a href="category.php?id_category=<?php echo $row_cate['category_id']; ?>" class="category-sidebar">
                                <?php echo $row_cate['category_name']; ?>
                                </a>
                            </li>

                        <?php }} ?>

                </ul>
            </div>
        </div>
        <!--   end danh muc-->


        <!---------banner------->
        <div class="widgets-area mb-9">
                <h2 class="widgets-title mb-5">THƯƠNG HIỆU SẢN PHẨM</h2>
            <div class="widgets-item">
                <ul class="widgets-checkbox">
                    <?php
                    $get_all_brand = $br->select_brand();
                    if($get_all_brand){
                        $i = 0;
                        while ($row_brand = $get_all_brand -> fetch_assoc()){ $i++;
                            ?>
                            <li>
                                <a href="brand.php?id_brand=<?php echo $row_brand['brand_id']; ?>" class="category-sidebar">
                                    <?php echo $row_brand['brand_name']; ?>
                                </a>
                            </li>

                        <?php }} ?>

                </ul>
            </div>
        </div>

    </div>
</div>
