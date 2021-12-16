<?php if(isset($_GET['order_id']) && $_GET['order_id'] =='order'){
    $user_id = Session::get("user_id");
    $insert_order = $ct -> insert_cart_db($user_id);
    $detele_cart = $ct ->delete_data_cart();


}?>
<div class="checkout-area section-space-y-axis-100">
    <div class="container">

        <div class="row">
            <div class="col-lg-6 col-12">
                <form action="javascript:void(0)">
                    <div class="checkbox-form">
                        <h3>THÔNG TIN KHÁCH HÀNG</h3>
                        <?php
                        $row =  $lg->select_user();
                        if($row){
                        while ($row_item = $row -> fetch_assoc()){
                        ?>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Họ và tên  <span class="required">*</span></label>
                                    <input placeholder="" type="text" disabled value="<?php echo $row_item['user_name'];?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Phone <span class="required">*</span></label>
                                    <input placeholder="" type="text" disabled value="<?php echo $row_item['user_phone'];?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Email</label>
                                    <input placeholder="" type="text" disabled value="<?php echo $row_item['user_email'];?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ <span class="required">*</span></label>
                                    <input type="text" disabled value="<?php echo $row_item['user_address'];?>">
                                </div>
                            </div>
                        </div>
                        <?php
                        }}
                        ?>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>THÔNG TIN ĐƠN HÀNG</h3>
                    <div class="your-order-table table-responsive">

                        <table class="table">
                            <thead>

                            <tr>
                                <th class="cart-product-name">Sản phẩm</th>
                                <th class="cart-product-total">Tạm tính</th>
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
                                    ?>
                            <tr class="cart_item">
                                <td class="cart-product-name"> <?php echo $cart_item['cart_product_name'] ?>
                                    <strong class="product-quantity">
                                        × <?php echo $cart_item['cart_qty'] ?>
                                    </strong></td>
                                <td class="cart-product-total"><span class="amount">
                                         <?php echo number_format( $tamtinh, 0,',', '.').'đ'; ?>
                                    </span></td>
                            </tr>

                            <?php
                            }}
                            ?>
                            </tbody>
                            <tfoot>
                            <tr class="cart-subtotal">
                                <th>Tổng đơn hàng </th>
                                <td><span class="amount">
                                        <?php echo number_format( $tong_tam_tinh, 0,',', '.').'đ'; ?>

                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="order-button-payment">
                                        <a href="?order_id=order" class="btn btn-custom-size lg-size btn-white rounded-0" href="">Thanh toán</a>
                                    </div>
                                </td>
                            </tr>

                            </tfoot>

                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Area End Here -->