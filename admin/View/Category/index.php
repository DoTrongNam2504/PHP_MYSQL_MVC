<?php 

include '../Class/category.php';

$class = new category();

    $row = $class->select_category();

if(isset($_GET['delete_id']))
{

    $id = $_GET['delete_id'];
    $check_delete = $class->delete_category($id);
}


?>
 ?>


 <div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Quản lý danh mục</h3>
                </div>
                <div class="col-auto">
                    <a href="category.php?url=add" class="btn btn-primary ml-3">
                        <i class="fas fa-plus"></i> Thêm danh mục
                    </a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Start alert -->
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div style="display: none" id="deletee" class="alert alert-danger text-center" role="alert">
                </div>
            </div>
            <div class="col-4"></div>

        </div>
        <!-- End alert -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">

                            <?php 
                            if(isset($check_delete)){
                                echo '<p class="alert_check">'.$check_delete.'</p>';
                            }

                             ?>

                            <table class="table table-hover table-center mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Mã danh mục</th>
                                        <th>Tên danh mục</th>
                                        <th>Tình trạng </th>
                                        <th class="text-right">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 

                                    $i = 0;
                                    if($row){
                                        while ($row_category =$row ->fetch_assoc()) {
                                        $i++;
                                     ?>
                                    <tr>
                                        <td><?php echo $row_category['category_id']; ?></td>
                                        <td><?php echo $row_category['category_name']; ?></td>
                                        <td>
                                            <?php 

                                            if($row_category['category_status'] == 1){
                                                echo "Hiển thị";
                                            }else{
                                                echo "Tạm ẩn";
                                            }
                                            ?>
                                        </td>
                                        <td class="text-right">
                                            <a href="category.php?url=edit&query=<?php echo $row_category['category_id'];  ?>"
                                                class="btn btn-sm bg-success-light mr-2">
                                                <i class="far fa-edit mr-1"></i> Sửa
                                            </a>
                                            <a  href="category.php?delete_id=<?php echo $row_category['category_id'];  ?>" class="btn btn-sm bg-danger-light mr-2 delete_review_comment"  
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa không')">
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
