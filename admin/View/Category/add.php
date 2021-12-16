 <?php 

 include '../Class/category.php';

?>

<?php 

$class = new category();

if($_SERVER['REQUEST_METHOD']==='POST'){

    $category_name = $_POST['category_name'];
    $category_status = $_POST['category_status'];

     $check_category = $class-> insert_category($category_name, $category_status);

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
                            <h3 class="page-title">Thêm danh mục</h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">
                        <!-- Form -->
                        <form method="post">
                        
                            <?php 
                            if(isset($check_category)){
                                echo '<p class="alert_check">'.$check_category.'</p>';
                            }

                             ?>
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input class="form-control text-box single-line" id="category_name" name="category_name" type="text" value="" />
                            </div>

                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="category_status" id=""  class="form-control">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Tạm ẩn</option>
                                </select>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit">
                                    Thêm
                                </button>
                                <a href="category.php" class="btn btn-link">Huỷ</a>
                            </div>
                        </form>
                        <!-- Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>