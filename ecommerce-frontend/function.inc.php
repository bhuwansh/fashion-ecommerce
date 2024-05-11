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


// get categories list
function get_categories($con) {
    $data = array();
    $sql = "SELECT * FROM categories WHERE status = 1 ORDER BY id ASC";

  


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

// get products list
function get_products($con, $type = '', $limit = '', $cat_id = '') 
{
    $data = array();
    $sql = "SELECT * FROM products WHERE status = 1";

    if ($cat_id != '') {
        $sql .= " and categories_id = $cat_id";
    }
   

    if ($limit != '') {
        $sql .= " LIMIT $limit";
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

// get product detail
function get_product_details($con, $prod_id = '') {
    $data = array();
    $sql = "SELECT * FROM products WHERE status = 1 and id= $prod_id";

  
    $res = mysqli_query($con, $sql);
    if (!$res) {
        // Query failed, handle the error
        echo "Error: " . mysqli_error($con);
        return $data; // Return empty array
    }
    
    while ($row = mysqli_fetch_assoc($res)) {
      
        $data = $row;
        
    }

    return $data;
}

?>



