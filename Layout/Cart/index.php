<?php
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update_cart'])){
    $qty_buy = $_POST['cart_qty'];
    $cart_id = $_POST['cart_id'];
    $add_to_cart = $ct -> update_to_cart($cart_id,$qty_buy);
}
if(isset($_GET['id_cart'])){
    $cart_id = $_GET['id_cart'];
    $result = $ct -> delete_from_cart($cart_id);
}
if(!isset($_GET['id'])){
    echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}

?>
<div class="cart-area section-space-y-axis-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="product_remove">Xóa</th>
                                <th class="product-thumbnail">Hình ảnh</th>
                                <th class="cart-product-name">Tên Sản phẩm</th>
                                <th class="product-price">Giá </th>
                                <th class="product-quantity">Số lượng </th>
                                <th class="product-subtotal">Tạm tính</th>
                            </tr>
                            </thead>


                        <tbody>
                                <?php
                                $get_cart= $ct ->get_cart();
                                if(isset($get_cart)){

                                    $tong_tam_tinh =0;
                                    $tongsl =0;
                                    $i=0;
                                    while ($cart_item = $get_cart -> fetch_assoc()){
                                        $i++;
                                        $tamtinh =  $cart_item['cart_price'] *$cart_item['cart_qty'];
                                        $tong_tam_tinh += $tamtinh;
                                        $tongsl +=$cart_item['cart_qty']; ?>
                                        <tr>
                                    <td class="product_remove">
                                        <a href="?id_cart=<?php echo $cart_item['product_id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không !?');">
                                            <i class="pe-7s-close" title="Remove"></i>
                                        </a>
                                    </td>
                                    <td class="product-thumbnail">
                                        <a href="detail.php?id_product=<?php echo $cart_item['product_id']; ?>">
                                            <img src="admin/uploads/<?php echo $cart_item['image']; ?>" alt="Cart Thumbnail" style="height: 100px ; width: 100px" >
                                        </a>
                                    </td>
                                    <td class="product-name"><a href="detail.php?id_product=<?php echo $cart_item['product_id']; ?>"><?php echo $cart_item['cart_product_name']; ?></a></td>
                                    <td class="product-price"><span class="amount">
                                            <?php echo number_format( $cart_item['cart_price'], 0,',', '.').'đ'; ?></span></td>
                                    <form action=""method="post">
                                    <td class="quantity">
                                            <input class="cart-plus-minus-box"name="cart_id" value="<?php echo $cart_item['cart_id']; ?>" type="hidden" style="width: 40px">
                                            <input class="cart-plus-minus-box"  name="cart_qty"value="<?php echo $cart_item['cart_qty']; ?>" type="number" min="1" style="width: 40px">
                                            <input class="button" name="update_cart" value="Update" type="submit">

                                    </td>
                                    </form>
                                    <td class="product-subtotal"><span class="amount">
                                             <?php echo number_format( $tamtinh, 0,',', '.').'đ'; ?>
                                        </span></td>
                                </tr>


                                <?php  }} ?>
                                <?php
                                Session::set("qty",$tongsl);
                                ?>

                        </tbody>

                        </table>
                    </div>
                <?php
                $checkCart = $ct->check_cart();
                if(isset($checkCart)){

                ?>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Tổng đơn hàng</h2>
                                <ul>
                                    <li>Tổn đơn hàng

                                        <span>  <?php echo number_format( $tong_tam_tinh, 0,',', '.').'đ'; ?></span></li>

                                </ul>
                                <?php
                                $check = Session::get("check_user");
                                if($check == false){?>
                                <a href="login.php">Thanh toán</a>
                                <?php }else{ ?>
                                    <a href="payment.php">Thanh toán</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>