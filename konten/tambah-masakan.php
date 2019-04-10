<?php
if (isset($_POST['simpan'])) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $status = $_POST['status'];

  $query = mysqli_query($konek, "insert into masakan values (
    NULL,
    '$nama', 
    '$harga', 
    '$status'
    )");
  if ($query) {
    $pesan = "<div class='alert alert-success'>Masakan berhasil ditambahkan</div>";
  } else {
    $pesan = "<div class='alert alert-danger'>Terjadi kesalahan saat menyimpan.</div>";
  }
}
?>
<div class="col">
  <div class="card">
    <div class="card-header">
      Tambah Masakan
      <a href="?menu=masakan" class="btn btn-primary">Kembali</a>
    </div>
    <div class="card-body">
      <?php print $pesan?>
      <form action="" method="post">
        <div class="form-group">
          <input type="text" name="nama" class="form-control" placeholder="nama masakan">
        </div>
        <div class="form-group">
          <input type="number" name="harga" class="form-control" placeholder="harga">
        </div>
        <div class="form-group">
          <select name="status" class="form-control">
            <option value="Tersedia">Tersedia</option>
            <option value="Habis">Habis</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
      </form>
    </div>
  </div>
</div>