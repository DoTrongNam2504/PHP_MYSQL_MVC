 <?php
        if(isset($_GET['id_category'])){
            $id= $_GET['id_category'];
        }
    ?>
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height"
         data-bg-image="Template/images/breadcrumb/bg/1-1-1920x373.jpg"
         style="background-image: url('Template/images/breadcrumb/bg/1-1-1920x373.jpg');">
        <div class="container h-100">
            <div class="row h-100">
                <?php

                $get_name_cate = $cate ->get_row_byID($id);
                if($get_name_cate){
                    while ($row_cate_name = $get_name_cate-> fetch_assoc()){
                ?>
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading"><?php echo $row_cate_name['category_name']; ?></h2>
                        <ul>
                            <li>
                                <a href="index.php">Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li><?php echo $row_cate_name['category_name']; ?></li>
                        </ul>
                    </div>
                </div>
                <?php }}?>
            </div>
        </div>
    </div>
