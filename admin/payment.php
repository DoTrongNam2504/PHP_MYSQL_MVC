<?php

include 'Layout/header.php';
include 'Layout/sidebar.php';

?>

<?php
    include ("View/Payment/index.php");
?>
//if(isset($_GET['url']))
//{
//    $url = $_GET['url'];
//
//    if($url =='add')
//    {
//
//        include ("View/Product/add.php");
//    }
//    else if($url =='edit')
//    {
//        include ("View/Product/edit.php");
//    }
//
//}
else
{
    include ("View/Product/index.php");
}


?>

<?php

include 'Layout/footer.php';

?>