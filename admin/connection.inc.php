<?php
session_start();
$con=mysqli_connect("localhost","root","","myproject");
define('SERVER_PATH','http://localhost/fashion-ecommerce/admin/');
define('SITE_PATH','http://localhost/fashion-ecommerce/');
define('SITE_PATH','');

define('PRODUCT_IMAGE_SERVER_PATH',$SERVER_PATH.'/media/products');
define('PRODUCT_IMAGE_SITE_PATH',$SITE_PATH.'/media/products');
?>