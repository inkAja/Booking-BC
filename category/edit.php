<?php 
include_once("../config.php"); 
session_start();

$id = $_GET['id'];
$category = mysqli_query($connect, "SELECT * FROM categories WHERE id='$id'");
$category = mysqli_fetch_array($category);

if(isset($_POST["submit"])){
    $name = $_POST["name"];

    $aksi = mysqli_query($connect, "UPDATE categories SET name='$name' where id='$id'");

    if($aksi){
        echo "<script>alert('berhasil mengedit data')</script>";
        header("Location: ".$base_url."/category/index.php");
        exit();
    } else {
        echo "<script>alert('gagal mengedit data')</script>";
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
                  Category
                </h1>
              </div>
              <div class="col-auto ms-auto">
                  <a href="<?php echo $base_url;?>/category/create.php" class="btn btn-info">
                  Tambah
                  </a>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <form class="card" method="POST">
                <div class="card-header">
                  <h3 class="card-title">Data</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label required">Nama Kategori</label>
                        <input type="text" name="name" value="<?php echo $category["name"]; ?>" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Kategori">
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