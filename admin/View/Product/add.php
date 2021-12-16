<?php 
    // lấy ra dnah mục và thuơng hiệu
include '../Class/brand.php';
include '../Class/category.php';
include '../Class/product.php';


$pd = new product();

if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['add-pd']))
{


     $check_pd = $pd-> insert_product($_POST, $_FILES);

}


 ?>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Thêm sản phẩm</h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">
                        <!-- Form -->
                        <form method="post"  enctype="multipart/form-data">
                           
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control text-box single-line" id="product_name" name="product_name" type="text" value="" required=""  />
                            </div>


                            <div class="form-group">
                                <label class="col-md-12">Ảnh đại diện</label>
                               
                                <input name="product_image"  type="file" class="form-control"  />
                            </div>

                            <div class="form-group">
                                <label>Giá bán</label>
                                <input class="form-control text-box single-line"  id="product_price" name="product_price" type="text" value="" required=""  />
                            </div>

                            
                            
                            <div class="form-group">
                                <label>Số lượng trong kho</label>
                                <input class="form-control text-box single-line" id="product_amount" name="product_qty" type="number" value="" required="" />
                            </div>



                            <div class="form-group">
                                <label>Danh mục</label>
                                <select class="form-control" id="category_id" name="category_id">
                                    <option >--- Chọn danh mục----</option>
                                    <?php 

                                        $category = new category();
                                        $list = $category ->select_category();
                                        if($list){
                                            while ($result = $list ->fetch_assoc()) {

                                         ?>

                                        <option value="<?php echo $result['category_id']; ?>">
                                            
                                            <?php echo $result['category_name']; ?>
                                        </option>

                                    <?php }} ?>

                                    </select>
                               
                            </div>



                            <div class="form-group">
                                <label>Thương hiệu</label>
                                <select class="form-control" id="brand_id" name="brand_id">
                                    <option >-- Chọn thương hiệu ----</option>
                                   
                                     <?php 

                                        $brand = new brand();
                                        $list = $brand ->select_brand();
                                        if($list){
                                            while ($result = $list ->fetch_assoc()) {

                                         ?>

                                        <option value="<?php echo $result['brand_id']; ?>">
                                            
                                            <?php echo $result['brand_name']; ?>
                                        </option>

                                    <?php }} ?>
                                    
                                    </select>
                                
                            </div>



                            <div class="form-group">
                                <label for="">Mô tả ngắn</label>
                                <textarea name="product_desc" class="form-control" rows="7"></textarea>
                                
                                
                            </div>

                            <div class="form-group">
                                <label for="">Nội dung chi tiết</label>
                                <textarea name="product_con" class="form-control" rows="7"></textarea>
                                
                                
                            </div>

                            <div class="form-group">
                                <label>Thể loại sản phẩm</label>
                                <select class="form-control" id="product_type" name="product_type">

                                    <option value="1">Nổi bật</option>
                                    <option value="0">Bình thường</option>

                                    </select>
                               
                            </div>

                            <div class="form-group">
                                <label>Tình trạng sản phẩm</label>
                                <select class="form-control" id="product_status" name="product_status">
                                    <option value="1">Hiển thị</option>
                                   
                                    <option value="0">Tạm ẩn</option>

                                    </select>
                               
                            </div>



                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit" name="add-pd">
                                    Thêm sản phẩm
                                </button>
                                <a href="product.php" class="btn btn-link">Quay lại</a>
                            </div>
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>