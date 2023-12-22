<!DOCTYPE html>
<html lang="en">
<?php 
    include_once("config.php"); 
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
            <div class="empty">
              <div class="empty-img"><img src="<?php echo $base_url; ?>/static/illustrations/undraw_printing_invoices_5r4r.svg" height="128" alt="">
              </div>
              <p class="empty-title">No results found</p>
              <p class="empty-subtitle text-muted">
                Try adjusting your search or filter to find what you're looking for.
              </p>
              <div class="empty-action">
                <a href="./." class="btn btn-primary">
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                  Add your first client
                </a>
              </div>
            </div>
          </div>
        </div>

        <?php include_once($root_url."/layouts/footer.php") ?>
    </div>
</body>
</html>