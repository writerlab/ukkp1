<?php
if ($_GET['menu'] == 'masakan' || empty($_GET['menu'])) {
  include('konten/masakan.php');
}
elseif ($_GET['menu'] == 'masakan') {
  include('konten/masakan.php');
}
elseif ($_GET['menu'] == 'tambah-masakan') {
  include('konten/tambah-masakan.php');
}
elseif ($_GET['menu'] == 'order-admin') {
  include('konten/order-admin.php');
}
elseif ($_GET['menu'] == 'transaksi') {
  include('konten/transaksi.php');
}
elseif ($_GET['menu'] == 'keluar') {
  session_destroy();
  header('Location: index.php');
}