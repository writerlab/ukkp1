<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php
include('koneksi.php');
include('konten/header.html');
?>
<body>
  <div class="container">
    <?php include('konten/judul.html'); ?>


    <?php 
    // atur konten
    if (empty($_SESSION['id_level'])) {
      include('konten/login.php');
    } else { ?>
      <div class="row">
      <?php if ($_SESSION['id_level'] == 1) {
        include('konten/menu.php');
        include('atur-konten-admin.php'); 
      } elseif ($_SESSION['id_level'] == 5) {
        include('konten/subjudul-pelanggan.php');
        include('atur-konten-pelanggan.php'); 
      }
    } ?>
    </div>
  </div>
</body>
</html>