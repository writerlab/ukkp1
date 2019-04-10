<div class="col">
  <div class="card">
    <div class="card-header">
      Data masakan
      <a href="?menu=tambah-masakan" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>NO.</th>
            <th>NAMA MASAKAN</th>
            <th>HARGA (IDR)</th>
            <th>STATUS</th>
            <th>AKSI</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $query = mysqli_query($konek, "select * from masakan");
        $no = 0;
        while($row = mysqli_fetch_array($query)) {
          $no++; ?>
          <tr>
            <td><?php print $no?></td>
            <td><?php print $row['nama_masakan']?></td>
            <td><?php print $row['harga']?></td>
            <td><div class="badge badge-success"><?php print $row['status_masakan']?></div></td>
            <td>
              <a href="#" class="btn btn-info btn-sm">Ubah</a> - 
              <a href="#" class="btn btn-danger btn-sm">Hapus</a>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>