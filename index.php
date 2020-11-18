<?php
require('component/head.php');
include('component/pegawai.php');

$pegawai = new Pegawai();
?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <?php
              if (isset($_GET['page'])) {
                $p = $_GET['page'];
                $page = "component/".$p.".php";
              
              if (file_exists($page)) {
                  include($page);
                }else{
                  echo "404"; 
                }
              }else{
                include('component/list.php');
              }
             
            ?>
        </section>
    </div>
<?php
require('component/footer.php');
?>