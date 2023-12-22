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
          <div class="container-xl d-flex flex-column justify-content-center">
            <h1>User</h1>
          </div>
        </div>

        <?php include_once($root_url."/layouts/footer.php") ?>
    </div>
</body>
</html>