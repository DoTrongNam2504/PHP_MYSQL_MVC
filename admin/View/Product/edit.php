<?php 
    // lấy ra dnah mục và thuơng hiệu
include '../Class/brand.php';
include '../Class/category.php';
include '../Class/product.php';


$pd = new product();

?>

<?php if(isset($_GET['query']) && $_GET['url']=='edit'){
    $id= $_GET['query'];
 } ?>
 <?php 
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['edit-pd']))
{

     $check_pd = $pd-> update_product($_POST, $_FILES,$id);

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
                            <h3 class="page-title">Cập nhật sản phẩm</h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">
                        <!-- Form -->

                        <?php 
                            $edit= $pd -> get_product_byID($id);
                            if($edit){
                                while ($value = $edit-> fetch_assoc()) {
                                    
                                
                         ?>

                          <?php 
                            if(isset($check_pd)){
                                echo '<p class="alert_check">'.$check_pd.'</p>';
                            }?>
                        <form method="post"  enctype="multipart/form-data">
                           
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control text-box single-line" id="product_name" name="product_name" type="text" value="<?php echo $value['product_name']; ?>" required=""  />
                            </div>


                            <div class="form-group">
                                <label class="col-md-12">Ảnh đại diện</label>
                               <img src="uploads/<?php echo $value['product_image']; ?>" alt="" style="height: 400px; width: 400px">
                                <input name="product_image"  type="file" class="form-control"  />
                            </div>

                            <div class="form-group">
                                <label>Giá bán</label>
                                <input class="form-control text-box single-line"  id="product_price" name="product_price" type="text" value="<?php echo $value['product_price']; ?>" required=""  />
                            </div>

                            
                            
                            <div class="form-group">
                                <label>Số lượng trong kho</label>
                                <input class="form-control text-box single-line" id="product_amount" name="product_qty" type="number" value="<?php echo $value['product_qty']; ?>" required="" />
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


                                         <?php 
                                            if($result['category_id']==$value['category_id']){
                                          ?>

                                            <option value="<?php echo $result['category_id']; ?>" selected>
                                            
                                            <?php echo $result['category_name']; ?>
                                            </option>

                                        <?php }else{ ?>
                                        <option value="<?php echo $result['category_id']; ?>">
                                            
                                            <?php echo $result['category_name']; ?>
                                        </option>
                                    <?php } ?>

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


                                        <?php if($result['brand_id']==$value['brand_id']) {  ?>

                                            <option value="<?php echo $result['brand_id']; ?>" selected>
                                                <?php echo $result['brand_name']; ?>
                                            </option>

                                        <?php } else{ ?>


                                            <option value="<?php echo $result['brand_id']; ?>">
                                                
                                                <?php echo $result['brand_name']; ?>
                                            </option>

                                        <?php } ?>

                                    <?php }} ?>
                                    
                                    </select>
                                
                            </div>



                            <div class="form-group">
                                <label for="">Mô tả ngắn</label>
                                <textarea name="product_desc" class="form-control" rows="7"><?php echo $value['product_desc']; ?></textarea>
                                
                                
                            </div>

                            <div class="form-group">
                                <label for="">Nội dung chi tiết</label>
                                <textarea name="product_con" class="form-control" rows="7"><?php echo $value['product_con']; ?></textarea>
                                
                                
                            </div>

                            <div class="form-group">
                                <label>Thể loại sản phẩm</label>
                                <select class="form-control" id="product_type" name="product_type">

                                    <?php if( $value['product_type'] == 1){ ?>

                                    <option value="1" selected="">Nổi bật</option>
                                    <option value="0">Bình thường</option>
                                    <?php }else{ ?>

                                        <option value="1" >Nổi bật</option>
                                        <option value="0" selected="">Bình thường</option>

                                    <?php } ?>

                                </select>
                               
                            </div>

                            <div class="form-group">
                                <label>Tình trạng sản phẩm</label>
                                <select class="form-control" id="product_status" name="product_status">

                                     <?php if( $value['product_status'] == 1){ ?>

                                         <option value="1" selected="">Hiển thị</option>
                                         <option value="0">Tạm ẩn</option>

                                    <?php }else{ ?>

                                         <option value="1">Hiển thị</option>
                                        <option value="0" selected="">Tạm ẩn</option>

                                    <?php } ?>


                                   

                                    </select>
                               
                            </div>



                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit" name="edit-pd">
                                    Cập nhật sản phẩm
                                </button>
                                <a href="product.php" class="btn btn-link">Quay lại</a>
                            </div>
                        </form>
                        <!-- /Form -->
                    <?php }} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>