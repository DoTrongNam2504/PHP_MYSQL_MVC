<?php

include '../Class/product.php';
include '../Class/brand.php';
include '../Class/category.php';
?>
<?php

$pd = new product();
if(isset($_GET['deltteid'])){
    $id = $_GET['deltteid'];
    $row = $pd ->delete_product($id);
}

?>
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Quản lý sản phẩm</h3>
                </div>
                <div class="col-auto text-right">
                    <a class="btn btn-white ml-3"
                       href="javascript:void(0);"
                       id="filter_search">
                        <i class="fas fa-search"></i> Tìm kiếm
                    </a>
                    <a href="product.php?url=add"
                       class="btn btn-primary ml-3">
                        <i class="fas fa-plus"></i> Thêm sản phẩm
                    </a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <!-- Start alert -->
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div style="display: none" id="deletee" class="alert alert-danger text-center" role="alert"></div>
            </div>
            <div class="col-4"></div>

        </div>
        <!-- End alert -->
        <!-- Search Filter -->
        <div class="card filter-card" id="filter_inputs">
            <div class="card-body pb-0">
                <form action="#" method="post">
                    <div class="row filter-row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" type="text" name="SearchString" />
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">
                                    Lọc
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Search Filter -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0 datatable">
                                <thead>
                                <tr>
                                    <th>Mã</th>
                                    <th>Sản phẩm</th>
                                    <th>Danh mục</th>
                                    <th>Thương hiệu</th>
                                    <th>Giá</th>
                                    <th>Tình trạng</th>
                                    <th>Loại</th>
                                    <th>Số lượng tồn</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $list = $pd->select_product();
                                if($list){
                                    while ($value = $list -> fetch_assoc()) {



                                        ?>
                                        <tr>
                                            <td><?php echo $value['product_id']; ?></td>
                                            <td>


                                                <img class="rounded service-img mr-1"
                                                     src="uploads/<?php echo $value['product_image']; ?>"
                                                     alt="" />
                                                <?php echo $value['product_name']; ?>
                                            </td>
                                            <td><?php echo $value['category_name']; ?></td>
                                            <td><?php echo $value['brand_name']; ?></td>
                                            <td><?php echo number_format($value['product_price'],0,',','.').'đ'; ?></td>

                                            <td>

                                                <?php  if($value['product_status']==1){ echo "Hiển thị";}else{ echo "Tạm ẩn";}?>

                                            </td>
                                            <td>
                                                <?php  if($value['product_type']==1){ echo "Nổi bật";}else{ echo "Bình thường";}?>

                                            </td>

                                            </td>
                                            <td><?php echo $value['product_qty']; ?></td>
                                            <td class="text-right">

                                                <a href="product.php?url=edit&query=<?php echo $value['product_id']; ?>"
                                                   class="btn btn-sm bg-success-light mr-2">
                                                    <i class="far fa-edit mr-1"></i>Edit
                                                </a>
                                                <a
                                                    href="product.php?deltteid=<?php echo $value['product_id']; ?>"
                                                    class="
                                                    btn btn-sm
                                                    bg-danger-light
                                                    mr-2
                                                    delete_review_comment
                                                    " onclick="return confirm('Bạn có chắc chắn muốn xóa không')">
                                                    <i class="far fa-trash-alt mr-1"></i> Delete
                                                </a>
                                            </td>
                                        </tr>

                                    <?php  } }?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>