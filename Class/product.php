<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../Lib/database.php');
	include_once ($filepath.'/../Helper/format.php');
	

	class product 
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

	    public function insert_product($data, $files)
	    {
	    	$product_name = mysqli_real_escape_string($this ->db->link, $data['product_name']);

	    	$product_price = mysqli_real_escape_string($this ->db->link, $data['product_price']);

	    	$product_desc = mysqli_real_escape_string($this ->db->link, $data['product_desc']);

	    	$product_con = mysqli_real_escape_string($this ->db->link, $data['product_con']);

	    	$product_qty = mysqli_real_escape_string($this ->db->link, $data['product_qty']);

	    	$category_id = mysqli_real_escape_string($this ->db->link, $data['category_id']);

	    	$brand_id = mysqli_real_escape_string($this ->db->link, $data['brand_id']);

	    	$product_status = mysqli_real_escape_string($this ->db->link, $data['product_status']);

	    	$product_type= mysqli_real_escape_string($this ->db->link, $data['product_type']);

	    	
	    	// xử lí image
	    	$permited = array('jpg','jpeg','png','gif');
	    	$file_name=$_FILES['product_image']['name'];

	    	$file_size=$_FILES['product_image']['size'];

	    	$file_temp=$_FILES['product_image']['tmp_name'];

	    	$div = explode('.', $file_name);
	    	$file_ext= strtolower(end($div));
	    	$unique_image = substr(md5(time()),0,10).'.'.$file_ext;
	    	$uploaded_image="uploads/".$unique_image; 


	    	if($product_name=="" || $product_price=="" ||$product_con=="" ||$product_desc=="" ||$product_status=="" ||$product_type=="" ||$category_id=="" ||$brand_id=="" ||$product_qty=="" ||$file_name ==""){


		    		$alert= "Kiểm tra lại dữ liệu của sản phẩm nhập vào !";
		    		return $alert;

	    	}
	    	else{
	    		move_uploaded_file($file_temp, $uploaded_image);
	    		//nếu có nhập đi so sánh với db
	    		$query = "INSERT INTO product(
	    		product_name,
	    		product_price,
	    		product_con,
	    		product_desc,
	    		product_type,
	    		category_id,
	    		brand_id,
	    		product_qty,
	    		product_image,
	    		product_status

	    		)values(
	    		'$product_name',
	    		'$product_price',
	    		'$product_con',
	    		'$product_desc',
	    		'$product_type',
	    		'$category_id',
	    		'$brand_id',
	    		'$product_qty',
	    		'$unique_image',
	    		'$product_status')";// câu lệnh kiểm tra KQ

	    		$result = $this ->db->insert($query);// thực thi câu lệnh bằng hàm select đã xây dựng trong database .php
	    			
		       header('Location: product.php');
    	}
	    }
	    public function select_product()
	    {
	    	$query = "
	    	SELECT product.*, category.category_name, brand.brand_name 
	    	FROM product inner join category on product.category_id =category.category_id
	    	inner join brand on product.brand_id = brand.brand_id
	    	ORDER BY product.product_id desc ";
	    		
	    	$result = $this ->db->select($query);
	    	return $result;
	    }


	    public function get_product_byID($id)
	    {
	    	$query = "SELECT * FROM product WHERE product_id ='".$id."' ";
	    	$result = $this ->db->select($query);
	    	return $result;
	    }



	    public function update_product($data, $files,$id)
	    {
	    	$product_name = mysqli_real_escape_string($this ->db->link, $data['product_name']);

	    	$product_price = mysqli_real_escape_string($this ->db->link, $data['product_price']);

	    	$product_desc = mysqli_real_escape_string($this ->db->link, $data['product_desc']);

	    	$product_con = mysqli_real_escape_string($this ->db->link, $data['product_con']);

	    	$product_qty = mysqli_real_escape_string($this ->db->link, $data['product_qty']);

	    	$category_id = mysqli_real_escape_string($this ->db->link, $data['category_id']);

	    	$brand_id = mysqli_real_escape_string($this ->db->link, $data['brand_id']);

	    	$product_status = mysqli_real_escape_string($this ->db->link, $data['product_status']);

	    	$product_type= mysqli_real_escape_string($this ->db->link, $data['product_type']);

	    	
	    	// xử lí image
	    	$permited = array('jpg','jpeg','png','gif');

	    	$file_name_edit=$_FILES['product_image']['name'];


	    	$file_name=$_FILES['product_image']['name'];

	    	$file_size=$_FILES['product_image']['size'];

	    	$file_temp=$_FILES['product_image']['tmp_name'];

	    	$div = explode('.', $file_name);
	    	$file_ext= strtolower(end($div));
	    	$unique_image = substr(md5(time()),0,10).'.'.$file_ext;
	    	$uploaded_image="uploads/".$unique_image; 


	    	if($product_name=="" || $product_price=="" ||$product_con=="" ||$product_desc=="" ||$product_status=="" ||$product_type=="" ||$category_id=="" ||$brand_id=="" ||$product_qty=="")
	    	{

	    		$alert= "Kiểm tra lại dữ liệu của sản phẩm nhập vào !";
	    		return $alert;

	    	}
	    	else
	    	{
	    		//Nếu người dùng có thay đổi hình ảnh
	    		if(!empty($file_name_edit))
	    		{
	    			if($file_size > 204080)
	    			{
	    				$alert= "Hình ảnh nên có kích thước nhỏ hơn 2MB!";
	    				return $alert;

	    			}
	    			elseif (in_array($file_ext,$permited)===false) 
	    			{
	    				$alert= "bạn chỉ có thể upload:".implode(', ',$permited)."!";
	    				return $alert;
	    			}
	    			move_uploaded_file($file_temp, $uploaded_image);
	    			$query = "UPDATE  product SET

	    			product_name = '$product_name',
	    			product_price = '$product_price',
	    			product_desc = '$product_desc',
	    			product_con = '$product_con',
	    			product_status = '$product_status',
	    			product_type = '$product_type',
	    			category_id = '$category_id',
	    			brand_id = '$brand_id',
	    			product_qty = '$product_qty',
	    			product_image = '$unique_image'
	    			WHERE product_id ='$id'";
	    		}
	    		// Người dùng không thay đổi hình ảnh
	    		else
	    		{
	    			$query = "UPDATE  product SET
	    			product_name = '$product_name',
	    			product_price = '$product_price',
	    			product_desc = '$product_desc',
	    			product_con = '$product_con',
	    			product_status = '$product_status',
	    			product_type = '$product_type',
	    			category_id = '$category_id',
	    			brand_id = '$brand_id',
	    			product_qty = '$product_qty'
	    			WHERE product_id ='$id'";

	    		}
	    		$result = $this ->db->update($query);
	    		 header('Location: product.php'); 
	    	}
	    	
	    }

	    public function delete_product($id)
	    {
	    	$query = "DELETE FROM product
	    			WHERE product_id = '".$id."'

	    			";
	    	$result = $this ->db->delete($query);
	    		header('Location: product.php'); 
	    	
	    }

		// FRONTEND FUNCTION

		public function get_noibat (){
			$query = "
	    	SELECT * FROM product where product_type = '1'
	    	ORDER BY product.product_id desc ";

			$result = $this ->db->select($query);
			return $result;
		}

		public function get_product_by_cateID($id)
		{
			$query = "SELECT * FROM product WHERE category_id ='".$id."' ";
			$result = $this ->db->select($query);
			return $result;
		}

		public function get_product_by_brandID($id)
		{
			$query = "SELECT * FROM product WHERE brand_id ='".$id."' ";
			$result = $this ->db->select($query);
			return $result;
		}

		public function get_detail_product_byID($id)
		{
			$query = "
			SELECT product.*, category.category_name, brand.brand_name 
	    	FROM product inner join category on product.category_id =category.category_id
	    	inner join brand on product.brand_id = brand.brand_id
			WHERE product_id ='".$id."' ";

			$result = $this ->db->select($query);
			return $result;
		}




	}

 ?>

