<?php
function pr($arr) {
    echo '<pre>';
    print_r($arr);
}

function prx($arr) {
    echo '<pre>';
    print_r($arr);
    die();
}


// function.inc.php
function get_safe_value($con, $str) {
   if($str != ''){
    // Sanitize and escape the string before returning it
    return mysqli_real_escape_string($con, $str);


   }

}



function get_categories($con){
    $data = array();
    $sql = "select * from categories order by categories asc";
 $res=mysqli_query($con,$sql);

 while ($row = mysqli_fetch_assoc($res)) {
      
    $data[] = $row;
    
}

return $data;

 }



 function get_product_list($con){
    $data = array();
    $sql = "SELECT c.categories as cat_name , p.* 
           FROM categories c join products p 
           on c.id = p.categories_id 
           ORDER BY p.id ASC;";
 $res=mysqli_query($con,$sql);

 while ($row = mysqli_fetch_assoc($res)) {
      
    $data[] = $row;
    
}

return $data;

 }


// get products list
function get_products($con, $cat_id = '') 
{
    $data = array();
    $sql = "SELECT * FROM products WHERE status = 1";

    if ($cat_id != '') {
        $sql .= " and categories_id = $cat_id";
    }
   

   
    $res = mysqli_query($con, $sql);
    if (!$res) {
        // Query failed, handle the error
        echo "Error: " . mysqli_error($con);
        return $data; // Return empty array
    }
    
    while ($row = mysqli_fetch_assoc($res)) {
      
        $data[] = $row;
        
    }

    return $data;
}



?>