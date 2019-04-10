<?php
if (isset($_POST['masuk'])) {
  $user = $_POST['username'];
  $pass = $_POST['password'];
  
  $q = mysqli_query($konek, "select * from user where username='$user'
                    and password=md5('$pass')");
  $jml = mysqli_num_rows($q);
  if ($jml > 0) {
    $sesi = mysqli_fetch_assoc($q);

    $_SESSION['id_user'] = $sesi['id_user'];
    $_SESSION['username'] = $sesi['username'];
    $_SESSION['nama_user'] = $sesi['nama_user'];
    $_SESSION['id_level'] = $sesi['id_level'];

    header('Location: index.php');
  } else {
    $pesan = "<div class='alert alert-danger'>Login gagal!</div>";
  }
}
?>
<div class="row">
  <div class="col-4 offset-md-4">
    <div class="card">
      <div class="card-header text-center">
        Masuk ke Aplikasi
      </div>
      <div class="card-body">
        <?php print $pesan?>
        <form action="" method="post">
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="username" autofocus required>
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="password" required>
          </div>
          <button type="submit" name="masuk" class="btn btn-primary">Masuk</button>
        </form>
      </div>
    </div>
  </div>
</div>