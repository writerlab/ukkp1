<?php
if ($_GET['menu'] == 'order' || empty($_GET['menu'])) {
  include('konten/order.php');
}
elseif ($_GET['menu'] == 'keluar') {
  session_destroy();
  print "<meta http-equiv='refresh' content='0; index.php'>";
}