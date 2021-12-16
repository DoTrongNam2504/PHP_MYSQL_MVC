<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../Lib/database.php');
include_once ($filepath.'/../Helper/format.php');


class login
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
    public function insert_user($data)
    {


        $res_name = mysqli_real_escape_string($this->db->link, $data['res_name']);
        $res_email = mysqli_real_escape_string($this->db->link, $data['res_email']);
        $res_phone = mysqli_real_escape_string($this->db->link, $data['res_phone']);
        $res_address = mysqli_real_escape_string($this->db->link, $data['res_address']);
        $res_password = mysqli_real_escape_string($this->db->link, md5($data['res_password']));
        if ($res_name == "" || $res_email == "" || $res_phone == "" || $res_address == "" || $res_password == "") {


            $alert = "Kiểm tra lại dữ liệu của người dùng vào !";
            return $alert;

        } else {
            $check_email = "SELECT * FROM  user WHERE user_email = '$res_email' LIMIT 1";
            $row_check_email = $this->db->select($check_email);
            if ($row_check_email) {
                $alert = "Email tồn tại rồi !";
                return $alert;
            } else {
                $query_insert = "INSERT INTO user (user_name, user_phone, user_email,user_password,user_address)
                values('$res_name','$res_phone','$res_email','$res_password','$res_address')";
                $result = $this->db->insert($query_insert);

                if($result){
                    $alert = "Thêm thành công!";
                    return $alert;
                    header('Location: index.php');
                }
                else {
                    $alert = "Thêm không  thành công!";
                    return $alert;
                    header('Location: login.php');
                }

            }
        }

    }
    public function login_user($data){
        $login_email = mysqli_real_escape_string($this->db->link, $data['login_email']);
        $login_password = mysqli_real_escape_string($this->db->link, md5($data['login_password']));
        if ($login_email == "" || $login_password == "" ) {


            $alert = "Kiểm tra lại dữ liệu của người dùng vào !";
            return $alert;

        } else {
            $check_login = "SELECT * FROM  user WHERE user_email = '$login_email'and user_password= '$login_password' ";
            $row_check = $this->db->select($check_login);
            if($row_check){
                $value = $row_check -> fetch_assoc(); //fetch_assoc() lấy kết quả ra
                // gọi phương thức set trong file session trong session.php.
                Session::set('check_user', true);

                Session::set('user_id', $value['user_id']);
                Session::set('user_name', $value['user_name']);
                header('Location: cart.php');
            }
            else {
                    $alert = "Đăng nhập không  thành công!";
                    return $alert;
                    header('Location: login.php');
                }

        }

    }
    public function  select_user(){

        $sid = Session::get("user_id");
        $query = "SELECT * FROM user where  user_id = '$sid'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_user($data){
        $sid = Session::get("user_id");
        $user_name = mysqli_real_escape_string($this->db->link, $data['user_name']);
        $user_address = mysqli_real_escape_string($this->db->link, $data['user_address']);
        $user_email = mysqli_real_escape_string($this->db->link, $data['user_email']);
        $user_phone = mysqli_real_escape_string($this->db->link, $data['user_phone']);
        $user_password_new = mysqli_real_escape_string($this->db->link,md5( $data['user_password_new']));
        if ($user_name == "" || $user_email == "" || $user_phone == "" || $user_address == "" || $user_password_new == "") {


            $alert = "Kiểm tra lại dữ liệu của người dùng vào !";
            return $alert;

        } else {


                $query_update = "UPDATE user SET 
                                             user_name = '$user_name', 
                                             user_phone='$user_phone', 
                                             user_email = '$user_email',
                                             user_password='$user_password_new',
                                             user_address='$user_address'
                                            where user_id= '$sid'
                                             ";
                $result = $this->db->update($query_update);
                header('Location: index.php');

        }
    }
}