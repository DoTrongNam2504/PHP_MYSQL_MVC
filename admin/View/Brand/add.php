 <?php 
// gọi đến file điều khiến
 include '../Class/brand.php';
 $class = new brand();
 if($_SERVER['REQUEST_METHOD']==='POST'){

    $brand_name = $_POST['brand_name'];
    $brand_status = $_POST['brand_status'];

    $check_brand = $class -> insert_brand($brand_name, $brand_status);
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
                            <h3 class="page-title">Thêm thương hiệu</h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">
                        <!-- Form -->
                        <form method="post" action="">
                           
                            <div class="form-group">
                                <label>Tên thương hiệu</label>
                                <input class="form-control text-box single-line"  id="brand_name" name="brand_name" type="text" value="" />
                            </div>

                            <div class="form-group">
                                <label>Tình trạng</label>
                                <select name="brand_status" id="" class="form-control">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Tạm ẩn</option>
                                </select>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit">
                                    Thêm
                                </button>
                                <a href="brand.php" class="btn btn-link">Huỷ</a>
                            </div>
                        </form>
                        <!-- Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>