<?php
session_start();
$con=mysqli_connect("localhost", "root", "","ecom");
 define('SERVER_PATH' ,$_SERVER['DOCUMENT_ROOT'].'/mini/');
define('SITE_PATH' ,'http://localhost/mini/');

define('PRODUCT_IMAGE_SERVER_PATH' , SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH' , SITE_PATH.'media/product/');
?> 