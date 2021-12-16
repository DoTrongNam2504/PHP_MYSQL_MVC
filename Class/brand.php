<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../Lib/database.php');
	include_once ($filepath.'/../Helper/format.php');
	

	class brand 
	{
	    /**
	     * summary
	     */
	    private $db;
	    private $fm;

	    
	    public function __construct()
	    {
	        $this ->db = new Database();
	        $this ->fm = new Format();
	    }

	    public function insert_brand($brand_name, $brand_status)
	    {
	    	$brand_name = $this ->fm->validation($brand_name);
	    	$brand_status = $this ->fm->validation($brand_status);


	    	$brand_name = mysqli_real_escape_string($this ->db->link, $brand_name);
	    	$brand_status = mysqli_real_escape_string($this ->db->link, $brand_status);


	    	if(empty($brand_name)){
	    		$alert= "Kiểm tra lại dữ liệu !";
	    		return $alert;
	    	}
	    	else{
	    		//nếu có nhập đi so sánh với db
	    		$query = "INSERT INTO brand(brand_name, brand_status)values('$brand_name','$brand_status')";// câu lệnh kiểm tra KQ

	    		$result = $this ->db->insert($query);// thực thi câu lệnh bằng hàm select đã xây dựng trong database .php
	    			
		       header('Location: brand.php');

	    	}
	    }
	    public function select_brand()
	    {
	    	$query = "SELECT * FROM brand ORDER BY brand_id desc ";
	    		$result = $this ->db->select($query);
	    		return $result;
	    }


	    public function get_brand_byID($id)
	    {
	    	$query = "SELECT * FROM brand WHERE brand_id ='".$id."' ";
	    	$result = $this ->db->select($query);
	    	return $result;
	    }

	    public function update_brand($brand_name, $brand_status,$id)
	    {
	    	$brand_name = $this ->fm->validation($brand_name);
	    	$brand_status = $this ->fm->validation($brand_status);

	    	$brand_name = mysqli_real_escape_string($this ->db->link, $brand_name);
	    	$brand_status = mysqli_real_escape_string($this ->db->link, $brand_status);


	    	if(empty($brand_name)){
	    		$alert= "Kiểm tra lại dữ liệu";
	    		return $alert;
	    	}
	    	else{

	    		$query = "UPDATE  brand
	    				SET brand_name = '".$brand_name."',
	    					brand_status = '".$brand_status."'
	    				WHERE brand_id = '".$id."' ";

	    		$result = $this ->db->update($query);
	    		header('Location: brand.php'); 

	    	}
	    }

	    public function delete_brand($id)
	    {
	    	$query = "DELETE FROM brand
	    			WHERE brand_id = '".$id."'

	    			";
	    	$result = $this ->db->delete($query);
	    		header('Location: brand.php'); 
	    	
	    }


	}

 ?>