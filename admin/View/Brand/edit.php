 <?php 

 include '../Class/brand.php';
$class= new brand();

  ?>



<?php 

    if(isset($_GET['query']) && ($_GET['url'] == 'edit')){

        $id = $_GET['query'];
        $row = $class -> get_brand_byID($id);
    }


    // edit thương hiệu
    if($_SERVER['REQUEST_METHOD']==='POST')
    {
        $brand_name = $_POST['brand_name'];
        $brand_status = $_POST['brand_status'];


        $update_brand = $class -> update_brand($brand_name, $brand_status,$id);
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
                            <h3 class="page-title">Cập nhật thương hiệu</h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">

                        <?php 

                        $i=0;
                        if($row){

                            while ($row_brand= $row ->fetch_assoc()) {
                                
                            $i++;


                         ?>
                        <!-- Form -->
                        <form method="post" action="">

                            <?php 
                            if(isset($update_brand)){
                                echo '<p class="alert_check">'.$update_brand.'</p>';
                            }

                             ?>
                           
                            <div class="form-group">
                                <label>Tên thương hiệu</label>
                                <input class="form-control text-box single-line"  id="brand_name" name="brand_name" type="text" value="<?php echo $row_brand['brand_name']; ?>" />
                            </div>

                            <div class="form-group">
                                <label>Tình trạng</label>
                                <select name="brand_status" id="" class="form-control">
                                    <?php if($row_brand['brand_status']==1){ ?>

                                        <option value="1" selected="">Hiển thị</option>
                                        <option value="0">Tạm ẩn</option>

                                    <?php }else{ ?>

                                         <option value="1">Hiển thị</option>
                                         <option value="0" selected="">Tạm ẩn</option> 

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit">
                                    Cập nhật
                                </button>
                                <a href="brand.php" class="btn btn-link">Huỷ</a>
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