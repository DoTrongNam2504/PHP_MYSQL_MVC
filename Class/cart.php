<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../Lib/database.php');
include_once ($filepath.'/../Helper/format.php');


class cart
{
    /**
     * summary
     */
    private $db;
    private $fm;


    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function add_to_cart($id,$qty_buy){

        $qty = $this ->fm->validation($qty_buy);

        $qty = mysqli_real_escape_string($this ->db->link, $qty_buy);
        $id = mysqli_real_escape_string($this ->db->link, $id);
        $sID = session_id();

         $query = "SELECT * FROM product where  product_id = '$id' ";
         $result = $this -> db -> select($query) -> fetch_assoc();
         $price = $result['product_price'];
         $image = $result['product_image'];
        $name = $result['product_name'];

        $query_check_id = "SELECT * FROM cart where  product_id = '$id' and sess_id ='$sID'" ;
        $row_check = $this -> db -> select($query_check_id) ;
        if(mysqli_num_rows($row_check)>0){
            $mess = "Sản phẩm được thêm rồi !";
            return $mess;
        }
        else {
            $query_insert = "INSERT INTO cart(product_id, sess_id, cart_price,cart_qty,image,cart_product_name)
        values('$id','$sID', '$price', '$qty', '$image','$name')";

            $result = $this->db->insert($query_insert);

            header('Location: cart.php');
        }
    }
    public  function  get_cart(){
        $sid =session_id();
        $query="SELECT * FROM cart where sess_id = '$sid' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function  update_to_cart($cart_id,$qty_buy){

        $qty = $this ->fm->validation($qty_buy);
        $qty = mysqli_real_escape_string($this ->db->link, $qty_buy);
        $cart_id = mysqli_real_escape_string($this ->db->link, $cart_id);

        $query = "UPDATE cart 
                      SET cart_qty = '$qty'
                          WHERE  cart_id ='$cart_id'";

        $result = $this->db->update($query);
        header('location: cart.php');
        if(isset($result)){
            $mess ="Cập nhật xong!";
            return  $mess;
        }
        else{
            $mess ="Chưa cập nhật được!";
            return  $mess;
        }


    }


    public function delete_from_cart($cart_id)
    {
        $query="DELETE  FROM cart where product_id = '$cart_id' ";
        $result = $this->db->delete($query);
        return $result;
        header('location: cart.php');

    }
    public function check_cart(){
        $sid =session_id();
        $query_check="SELECT * FROM cart where sess_id = '$sid' ";
        $result_check = $this->db->select($query_check);
        return $result_check;
    }
    public  function delete_data_cart(){
        $sid =session_id();
        $query_delete="DELETE FROM cart where sess_id = '$sid' ";
        $result_check = $this->db->delete($query_delete);
        return $result_check;
    }
    public function insert_cart_db($user_id){
        $sid =session_id();
        $query_check="SELECT * FROM cart where sess_id = '$sid' ";
        $result_check = $this->db->select($query_check);
        if($result_check){
            while ($row_cart = $result_check ->fetch_assoc()){

                $product_id = $row_cart['product_id'];
                $product_name = $row_cart['cart_product_name'];
                $user_get_id = $user_id;
                $order_qty = $row_cart['cart_qty'];
                $order_image = $row_cart['image'];
                $order_price = $row_cart['cart_price'];

                $query_insert_order = "INSERT INTO tbl_order(
                        product_id, 
                        product_name, 
                        user_id,
                        order_qty,
                        order_price,
                        order_image)
                        
                values(
                '$product_id',
                '$product_name', 
                '$user_get_id', 
                '$order_qty', 
                '$order_image',
                '$order_price')";

                $result = $this->db->insert($query_insert_order);


            }
            Header("Location: index.php");
        }
        echo "<script type='text/javascript'>alert('Cảm ơn bạn đã đặt hàng!');</script>";

    }
}