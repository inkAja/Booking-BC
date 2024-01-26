<!DOCTYPE html>
<html lang="en">
<?php 
    include_once("../config.php"); 
    session_start();
    ?>
    
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
                  <a href="<?php echo $base_url;?>/product/create.php" class="btn btn-info">
                  Tambah
                  </a>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="card">
              <div class="card-body">
                <div id="table-default" class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th><button class="table-sort" data-sort="sort-no">No</button></th>
                        <th><button class="table-sort" data-sort="sort-name">Nama produk</button></th>
                        <th><button class="table-sort" data-sort="sort-name">Harga</button></th>
                        <th><button class="table-sort" data-sort="sort-name">Foto</button></th>
                        <th><button class="table-sort" data-sort="sort-name">Status</button></th>
                        <th><button class="table-sort" data-sort="sort-action">Action</button></th>
                    
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <?php 
                      $datas = mysqli_query($connect, "SELECT * FROM product ORDER BY nama_product ASC");
                      $no = 1;

                      while($product = mysqli_fetch_array($datas)){
                        $status = "Ready";
                        if($product["status"] == 2){
                          $status = "Sold Out";
                        }
                      ?>
                        <td class="sort-no"><?php echo $no++ ?></td>
                        <td class="sort-name"><?php echo $product["nama_product"]?></td>
                        <td class="sort-name"><?php echo number_format($product["harga"]) ?></td>
                        <td class="sort-name">
                          <img src="<?php echo $base_url.'/upload/'.$product["foto"]?>" alt="" width="50px" height="auto">
                          
                        </td>
                        <td class="sort-name"><?php echo $status?></td>
                        <td class="sort-action"><td>
                            <div class="btn-list flex-nowrap">
                              <a href="<?php echo $base_url;?>/product/edit.php?id=<?php echo $product["id"]?>" class="btn btn-info">
                                Edit
                              </a>
                              
                                  <a href="<?php echo $base_url;?>/product/delete.php?id=<?php echo $product["id"]?>" class="btn btn-danger">
                                    Delete
                                  </a>
                              
                            </div>
                          </td>
                        </td>
                      </tr>
                    <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>

        <?php include_once($root_url."/layouts/footer.php") ?>
    </div>
</body>
</html>