<?php
session_start();
$con=mysqli_connect("localhost","root","","myproject");
define('SERVER_PATH','http://localhost/fashion-ecommerce/admin/');
define('SITE_PATH','http://localhost/fashion-ecommerce/ecommerce-frontend/');
// define('SITE_PATH','');

define('PRODUCT_IMAGE_SERVER_PATH',$SITE_PATH.'images/product/');
define('PRODUCT_IMAGE_SITE_PATH',$SITE_PATH.'images/product/');
?>