

 <?php 

 include 'Layout/header.php';
 include 'Layout/sidebar.php';
  ?>

    <?php  
    if(isset($_GET['url'])){
    	$url =$_GET['url'];

    	if($url=='add')
        {
    		 include 'View/Brand/add.php';

    	}

        else if($url=='edit')
        {

            include 'View/Brand/edit.php';
        }

    }
    else
    {
    include 'View/Brand/index.php'; 	
    }


    ?>


  <?php  include 'Layout/footer.php'; ?>