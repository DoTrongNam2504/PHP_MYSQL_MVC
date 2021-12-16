<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../Lib/database.php');
include_once ($filepath.'/../Helper/format.php');


 ?>


<?php 

/**
 * summary
 */
class category 
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

    public function insert_category($category_name, $category_status)
    {
        //gọi hàm validation để kiểm tra dữ liệu đầu vào lấy từ file login.php
    	$category_name = $this ->fm->validation($category_name);
    	$category_status = $this ->fm->validation($category_status);


        //$this ->db->link: gọi đến biến link trong file database.php để kết nối đến database
        //mysqli_real_escape_string()kết nối với csdl

    	$category_name = mysqli_real_escape_string($this ->db->link, $category_name);

    	$category_status = mysqli_real_escape_string($this ->db->link, $category_status);

    	if(empty($category_name)){// nếu người dùng chưa nhập  dữ liệu
    		$alert = "Kiểm tra lại dữ liệu nhập!";// tạo 1 biến alert mới chứa thông báo
    		return $alert;
    	}
    	else{
            //nếu có nhập đi so sánh với db
    		$query = "INSERT INTO category(category_name, category_status)values('$category_name','$category_status')";// câu lệnh kiểm tra KQ

    		$result = $this ->db->insert($query);// thực thi câu lệnh bằng hàm select đã xây dựng trong database .php
    			
	       header('Location: category.php');
    		
    	}
    }

    public function select_category()
    {
        $query = "SELECT * FROM category ORDER BY category_id desc";

            $result = $this ->db->select($query);
            return $result;
    }

    public function get_row_byID($id)
    {
         $query = "SELECT * FROM category WHERE category_id ='".$id."' ";

            $result = $this ->db->select($query);
            return $result;
    }

    public function update_category($category_name, $category_status, $id)
    {
        //gọi hàm validation để kiểm tra dữ liệu đầu vào lấy từ file login.php
        $category_name = $this ->fm->validation($category_name);
        $category_status = $this ->fm->validation($category_status);


        //$this ->db->link: gọi đến biến link trong file database.php để kết nối đến database
        //mysqli_real_escape_string()kết nối với csdl

        $category_name = mysqli_real_escape_string($this ->db->link, $category_name);

        $category_status = mysqli_real_escape_string($this ->db->link, $category_status);

        if(empty($category_name)){// nếu người dùng chưa nhập  dữ liệu
            $alert = "Kiểm tra lại dữ liệu nhập!";// tạo 1 biến alert mới chứa thông báo
            return $alert;
        }
        else{
            //nếu có nhập đi so sánh với db
            $query = "UPDATE category 
                      SET category_name = '".$category_name."',
                          category_status = '".$category_status."'
                          WHERE  category_id ='".$id."'";// câu lệnh kiểm tra KQ

            $result = $this ->db->update($query);// thực thi câu lệnh bằng hàm select đã xây dựng trong database .php
                
           header('Location: category.php');
            
        }
    }

    public function delete_category($id)
    {
        $query = "DELETE FROM category WHERE category_id ='".$id."' ";

            $result = $this ->db->delete($query);
            
                  
           header('Location: category.php');
        
    }

   

}



 ?>