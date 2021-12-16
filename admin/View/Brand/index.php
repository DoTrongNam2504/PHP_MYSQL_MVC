<?php 

    include '../Class/brand.php';
    $class = new brand();

    if(isset($_GET['delete_id'])){

        $id = $_GET['delete_id'];
        $check_delete = $class ->delete_brand($id);

    }


 ?>

<div class="page-wrapper">
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Quản lý thương hiệu</h3>
            </div>
            <div class="col-auto">
                <a href="brand.php?url=add"
                   class="btn btn-primary ml-3">
                    <i class="fas fa-plus"></i> Thêm thương hiệu
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

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>Mã</th>
                                    <th>Tên thương hiệu</th>
                                    <th>Trạng thái</th>
                                    <th class="text-right">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $check= $class ->select_brand();
                                    $i=0;
                                    if($check){
                                    while ($row = $check -> fetch_assoc()) {
                                        $i++;
                                        
                                 ?>
                                    <tr>
                                        <td><?php echo $row['brand_id']; ?></td>
                                        <td><?php echo $row['brand_name']; ?></td>
                                        <td>
                                            <?php if($row['brand_status']==1){
                                                echo 'Hiển thị';


                                            }else{
                                                echo 'Tạm ẩn';
                                            } ?>


                                        </td>
                                        <td class="text-right">
                                            <a href="brand.php?url=edit&query=<?php echo $row['brand_id']; ?>"
                                               class="btn btn-sm bg-success-light mr-2">
                                                <i class="far fa-edit mr-1"></i> Sửa
                                            </a>
                                            <a 
                                               href="brand.php?delete_id=<?php echo $row['brand_id'];  ?>"
                                               class="btn btn-sm bg-danger-light
                                                mr-2 delete_review_comment" onclick="return confirm('Bạn có chắc chắn muốn xóa không')">
                                                <i class="far fa-trash-alt mr-1"></i> Xoá
                                            </a>
                                        </td>
                                    </tr>

                                    <?php }} ?>
                                   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


        </div>