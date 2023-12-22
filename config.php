<?php 
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "bookingbc";

    $connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);

    $base_url = "http://localhost/bookingbc";
    $root_url = $_SERVER['DOCUMENT_ROOT']."/bookingbc";
?>