<?php
if (isset($_POST['order'])) {
  $id_masakan = $_POST['id_masakan'];
  $nama_meja = $_SESSION['nama_user'];
  $id_user = $_SESSION['id_user'];
  $keterangan = $_POST['keterangan'];

  $q_order = mysqli_query($konek, "insert into pesanan values (
      NULL,
      '$nama_meja',
      NOW(),
      '$id_user',
      '$keterangan',
      true
    )");

  $get_id_order = mysqli_query($konek, "select * from pesanan order by id_order desc limit 1");
  $pesanan = mysqli_fetch_assoc($get_id_order);
  $id_pesanan = $pesanan['id_order'];
  $harga = $pesanan['harga'];

  $q_detil_order = mysqli_query($konek, "insert into detil_order values (
    NULL,
    '$id_pesanan',
    '$id_masakan',
    '$keterangan',
    true
    )");

  $get_id_detilorder = mysqli_query($konek, "select * from detil_order order by id_detil_order desc limit 1");
  $detil_order = mysqli_fetch_assoc($get_id_detilorder);
  $id_masakan = $detil_order['id_masakan'];
  
  
  // AMBIL HARGA MASAKAN YANG SUDAH DIPESAN
  $get_id_masakan = mysqli_query($konek, "select * from masakan where id_masakan='$id_masakan'");
  $id_masakan = mysqli_fetch_assoc($get_id_masakan);
  $harga = $id_masakan['harga'];

    $q_transaksi = mysqli_query($konek, "insert into transaksi values (
    NULL,
    '$id_user',
    '$id_pesanan',
    NOW(),
    '$harga'
    )");

  if ($q_order && $q_detil_order && $q_transaksi) {
    $pesan = "<div class='alert alert-success'>Pesanan sudah sedang diproses.</div>";
  } else {
    $pesan = "<div class='alert alert-danger'>Terjadi kesalahan.</div>";
  }

}
?>
<div class="col-6">
  <?php print $pesan ?>
  <div class="card">
    <div class="card-header">
      PILIH PAKET MAKANAN
    </div>
    <div class="card-body">
      <form action="" method="post">
      <?php 
      $query = mysqli_query($konek, "select * from masakan"); 
      while($row = mysqli_fetch_array($query)) { 
        if ($row[3]) {
          $badge = "badge-success";
        } else {
          $badge = "badge-danger";
        }
        ?>
        <div class="form-group">
          <input type="radio" name="id_masakan" value="<?php print $row[0]?>" id="<?php print $row[0]?>">
          <label for="<?php print $row[0]?>"><?php print $row[1]?></label> 
          <div class="badge <?php print $badge?>"><?php print $row[3]?></div>
          <div>IDR <?php print $row[2]?></div>
        </div>
      <?php } ?>
        <textarea name="keterangan" class="form-control" cols="30" rows="10" placeholder="keterangan..."></textarea>
        <button type="submit" class="btn btn-primary" name="order">Order</button>
      </form>
    </div>
  </div>
</div>

<!-- DAFTAR PESANAN -->
<div class="col">
  <div class="jumbotron">
    <h3>Daftar Pesanan</h3>
    <table class="table">
      <thead>
        <tr>
          <th>NO.</th>
          <th>NAMA PAKET</th>
          <th>STATUS</th>
          <th>HARGA</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $q = mysqli_query($konek, "
        select a.*, b.*, c.* from pesanan a
        inner join detil_order b on a.id_order=b.id_order
        inner join masakan c on b.id_masakan=c.id_masakan
      ");
      $no = 0;
      while($row = mysqli_fetch_array($q)) {
        $no++; ?>
        <tr>
          <td><?php print $no?>.</td>
          <td><?php print $row['nama_masakan']?></td>
          <td><div class="badge badge-danger"><?php print $row['status_detil_order']?></div></td>
          <td><?php print $row['harga']?></td>
        </tr>
        <tr>
          <td colspan="4" class="text-right">Jumlah: IDR 10000</td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
</div>