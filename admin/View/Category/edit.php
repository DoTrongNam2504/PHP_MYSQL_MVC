 <?php 

 include '../Class/category.php';

?>

<?php 

$class = new category();

if(isset($_GET['query']) && ($_GET['url'] == 'edit'))
{

    $id = $_GET['query'];
    $row = $class->get_row_byID($id);
}


?>

<?php 

    if($_SERVER['REQUEST_METHOD']==='POST'){

         $category_name = $_POST['category_name'];
         $category_status = $_POST['category_status'];

         $update_category = $class -> update_category($category_name, $category_status, $id);

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
                            <h3 class="page-title">Cập nhật danh mục</h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">
                        <!-- Form -->

                         <?php 

                            $i = 0;
                            if($row){
                                while ($row_category =$row ->fetch_assoc()) {
                                $i++;
                             ?>

                        <form method="post">
                        
                            <?php 
                            if(isset($check_category)){
                                echo '<p class="alert_check">'.$check_category.'</p>';
                            }

                             ?>
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input class="form-control text-box single-line" id="category_name" name="category_name" type="text" value="<?php echo $row_category['category_name']; ?>" />
                            </div>

                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="category_status" id=""  class="form-control">
                                    <?php if( $row_category['category_status'] == 1){ ?>
                                        <option value="1" selected="">Hiển thị</option>
                                        <option value="0">Tạm ẩn</option>
                                    <?php }else{ ?>
                                        <option value="1" >Hiển thị</option>
                                        <option value="0" selected="">Tạm ẩn</option>

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit">
                                    Cập nhật
                                </button>
                                <a href="category.php" class="btn btn-link">Huỷ</a>
                            </div>
                        </form>
                        <!-- Form -->

                    <?php }} ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>