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
    // Sanitize and escape the string before returning it
    return mysqli_real_escape_string($con, trim($str));
}
