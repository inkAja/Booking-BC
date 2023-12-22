<?php 
include_once("../config.php"); 
session_start();

$id = $_GET['id'];
$category = mysqli_query($connect, "Delete FROM categories WHERE id='$id'");

if($aksi){
    echo "<script>alert('berhasil delete data')</script>";   
} else {
    echo "<script>alert('gagal delete data')</script>";
}

header("Location: ".$base_url."/category/index.php");
exit();

?>