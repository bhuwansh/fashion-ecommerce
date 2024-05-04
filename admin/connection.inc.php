<?php
// session_start();

$host = "localhost"; 
$user = "root";
$password = 'test@123';
$database = "myproject";

$con = mysqli_connect ($host, $user, $password,$database ) or die('Not connected : Ah sh*t ' .mysqli_connect_error());




// $con=mysqli_connect("localhost","root","","myproject");
// $con=mysqli_connect("","","","myproject");

define('SERVER_PATH','http://localhost/fashion-ecommerce/admin/');
define('SITE_PATH','http://localhost/fashion-ecommerce/ecommerce-frontend/');
// define('SITE_PATH','');

define('PRODUCT_IMAGE_SERVER_PATH','http://localhost/fashion-ecommerce/ecommerce-frontend/images/product/');
define('PRODUCT_IMAGE_SITE_PATH','http://localhost/fashion-ecommerce/ecommerce-frontend/images/product/');
?>