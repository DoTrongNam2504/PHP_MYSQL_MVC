
<?php 
   
    
	include("Layout/header.php");
	include("Layout/sidebar.php");

 ?>
<?php 
	if(isset($_GET['url']))
	{
		$url = $_GET['url'];

			if($url =='add')
			{

				include ("View/Category/add.php");
			}
			else if($url =='edit')
			{
				include ("View/Category/edit.php");
			}
			
	}
	else
	{
		include ("View/Category/index.php");
	}
	

 ?>
   
<?php 

	include("Layout/footer.php");

 ?>