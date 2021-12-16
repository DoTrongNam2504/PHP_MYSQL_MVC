<?php
 $filepath = realpath(dirname(__FILE__));
include ($filepath.'/../Lib/session.php');// gọi file session

Session::checkLogin();// gọi đến hàm checklogin ở trong file session.php để kiểm tra sự tồn tại của  login
include ($filepath.'/../Lib/database.php');
include ($filepath.'/../Helper/format.php');


 ?>


<?php 

/**
 * summary
 */
class adminlogin 
{
    /**
     * summary
     */
    private $db;
    private $fm;
    public function __construct()
    {
    	$this ->db = new Database();// lấy các class Database vàk forrmat
    	$this ->fm = new Format();
        
    }

    public function login_admin($admin_email, $admin_pass)
    {
        //gọi hàm validation để kiểm tra dữ liệu đầu vào lấy từ file login.php
    	$admin_email = $this ->fm->validation($admin_email);
    	$admin_pass = $this ->fm->validation($admin_pass);


        //$this ->db->link: gọi đến biến link trong file database.php để kết nối đến database
        //mysqli_real_escape_string()kết nối với csdl

    	$admin_email = mysqli_real_escape_string($this ->db->link, $admin_email);

    	$admin_pass = mysqli_real_escape_string($this ->db->link, $admin_pass);

    	if(empty($admin_email) || empty($admin_pass)){// nếu người dùng chưa nhập  dữ liệu
    		$alert = "Email hoặc mật khẩu không được để trống !";// tạo 1 biến alert mới chứa thông báo
    		return $alert;
    	}
    	else{
            //nếu có nhập đi so sánh với db
    		$query = "SELECT * FROM admin WHERE admin_email = '$admin_email' and admin_pass = '$admin_pass' LIMIT 1";// câu lệnh kiểm tra KQ

    		$result = $this ->db->select($query);// thực thi câu lệnh bằng hàm select đã xây dựng trong database .php

    		if($result != false){ ///nếu đúng

    			$value = $result -> fetch_assoc(); //fetch_assoc() lấy kết quả ra

                // gọi phương thức set trong file session trong session.php.
    			Session::set('login_admin', true);

    			Session::set('admin_id', $value['admin_id']);
    			Session::set('admin_name', $value['admin_name']);
    			Session::set('admin_email', $value['admin_email']);
    			
    			header('Location: index.php');
    		}else{
    			$alert = "Người dùng và mật khẩu không đúng ! ";
    			return $alert;
    		}
    	}
    }

   

}



 ?>