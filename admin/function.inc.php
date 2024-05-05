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