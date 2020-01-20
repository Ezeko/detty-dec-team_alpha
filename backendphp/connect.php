<?php

$host_name = "localhost";
$host_user = "root";
$host_pwd = "";
$db = "school_search";

$conn = mysqli_connect($host_name, $host_user, $host_pwd, $db);

if(!$conn){
    echo mysqli_error($conn);
    exit;
}

//dbpassword


?>