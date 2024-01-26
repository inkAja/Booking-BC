<?php 
include_once("../config.php"); 
session_start();

$id = $_GET['id'];
$product = mysqli_query($connect, "SELECT * FROM product WHERE id='$id'");
$product = mysqli_fetch_array($product);


$aksi= mysqli_query($connect, "Delete FROM product WHERE id='$id'");
if($aksi){
    $folder = "../upload/";
    if(file_exists($file =  $folder . $product["foto"])){
        unlink("$file");
      }
    echo "<script>alert('berhasil delete data')</script>";   
} else {
    echo "<script>alert('gagal delete data')</script>";
}

header("Location: ".$base_url."/product/index.php");
exit();

?>