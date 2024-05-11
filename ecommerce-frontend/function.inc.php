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
function get_product($con, $type = '', $limit = '', $cat_id = '') {
    $data = array();
    $sql = "SELECT * FROM products WHERE status = 1";

    if ($cat_id != '') {
        $sql .= " and categories_id = $cat_id";
    }
    if ($product_id != '') {
        $sql .= " and id = $product_id";
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


?>