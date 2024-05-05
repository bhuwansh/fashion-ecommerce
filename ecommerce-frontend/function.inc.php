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
function get_product($con, $type = '', $limit = '', $cat = '') {
    $data = array();
    $sql = "SELECT * FROM products WHERE status = 1";

    if ($cat != '') {
        $sql .= " and categories_id = $cat";
    }

    if ($type == 'latest') {
        $sql .= " ORDER BY id DESC";
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