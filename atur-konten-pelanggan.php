<?php
if ($_GET['menu'] == 'order' || empty($_GET['menu'])) {
  include('konten/order.php');
}
elseif ($_GET['menu'] == 'keluar') {
  session_destroy();
  header('Location: index.php');
}