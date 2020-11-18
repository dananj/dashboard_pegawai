<?php
  if ( isset($_POST["submit"]) ) {
   
    if ( $pegawai->tambahData($_POST) > 0 ) {
    echo "
          <script>
            alert('data berhasil ditambah');
           
          </script>
        ";
    } else{
      echo "
          <script>
            alert('data gagal ditambah');
         
          </script>
        ";
    }
  
}
?>

<div class="section-header">
  <h1>Ubah Data</h1>
</div>
<div class="section-body">
  <div class="card">
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>Nama Pegawai</label>
          <input type="text" class="form-control" name="nama_pegawai" required />
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label>Departemen</label>
              <select class="form-control" name="id_departemen" required>
                <option value="A001">IT </option>
                <option value="A002">KEUANGAN </option>
                <option value="A003">HRD </option>
                <option value="A004">PEMASARAN </option>
              </select>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label>Jabatan</label>
              <select class="form-control" name="id_jabatan" required>
                <option value="J01">Manager </option>
                <option value="J02">Pegawai Tetap </option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <textarea class="form-control" name="alamat_pegawai" required></textarea>
        </div>
        <div class="form-grup">
          <label>Foto</label>
          <input type="file" class="form-control" name="foto_pegawai">
          <p class="text-danger">Ekstensi file JPG/JPEG/PNG</p>
        </div>

        <button class="btn btn-icon icon-left btn-warning"  type="submit" name="submit">Submit</button>
      </form>
    </div>
  </div>
</div>