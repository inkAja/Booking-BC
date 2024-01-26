<?php 
include_once("../config.php"); 
session_start();

$id = $_GET['id'];
$product = mysqli_query($connect, "SELECT * FROM product WHERE id='$id'");
$product = mysqli_fetch_array($product);

if(isset($_POST["submit"])){
  $folder = "../upload/";
    if(!is_dir($folder)){
      mkdir($folder, 0775, true);
    }

    $nama_product = $_POST["nama_product"];
    $harga = intval(["harga"]);
    $status = $_POST["status"]; 
    $old_foto = $_POST["old_foto"];
    $foto = $old_foto;


    if(isset($_FILES['foto']) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK){
      $file_name = basename($_FILES["foto"]["name"]);
      $target_file = $folder . $file_name;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

      $check = getimagesize($_FILES["foto"]["tmp_name"]);
      if ($check !== false){
        if($imageFileType === "jpg" || $imageFileType === "png" || $imageFileType === "jpeg" || $imageFileType === "gif" ){
          if(move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)){
            $foto = $file_name;
            if(file_exists($file =  $folder . $old_foto)){
              unlink("$file");
            }
            } else {
              echo "<script>alert('gagal mengedit data')</script>";
            }
          } else {
            echo "<script>alert('gagal mengedit data')</script>";
          }
        } 
      }
      $aksi = mysqli_query($connect, "UPDATE product SET nama_product='$nama_product', harga='$harga', foto='$foto', status='$status' where id='$id'");
        if($aksi){
          echo "<script>alert('berhasil memasukan data')</script>";
          header("Location: ".$base_url."/product/index.php");
              exit();
          } else {
            echo "<script>alert('gagal memasukan data')</script>";
          } 
}


?>
<!DOCTYPE html>
<html lang="en">    
<?php 
include_once($root_url."/layouts/layoutHeader.php");
?>
<body>
    <script src="./dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page">
        <?php include_once($root_url."/layouts/navbar.php") ?>
        <div class="page-body">
          
           <!-- Page header -->
          <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h1  class="page-title">
                  Product
                </h1>
              </div>
              <div class="col-auto ms-auto">
                  
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
          <form class="card" method="POST" enctype="multipart/form-data">
                <div class="card-header">
                  <h3 class="card-title">Formulir Produk</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label required">Nama Produk</label>
                        <input type="text" name="nama_product" id="nama_product" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Nama Product" value="<?php echo $product["nama_product"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Harga" value= "<?php echo $product["harga"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control" aria-describedby="emailHelp" accept="image">
                        <input type="hidden" name="old_foto" value="<?php echo $product["foto"];?>">
                    </div>
                    <div class="mb-3">
                            <div class="form-label">Status</div>
                            <div>
                              <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status_1" value="1" <?php echo ($product["status"] == 1)? "checked=":"" ?>>
                                <span class="form-check-label">Ready</span>
                              </label>
                              <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status_2" value="2" <?php echo ($product["status"] == 2)? "checked=":"" ?>>
                                <span class="form-check-label">Sold Out</span>
                              </label>
                            </div>
                          </div>
                </div>
                <div class="card-footer text-end">
                  <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
          </div>
        </div>
        </div>

        <?php include_once($root_url."/layouts/footer.php") ?>
    </div>
</body>
</html>