<?php
 
    $id=$_GET['id'];

    $tampilEdit = $pegawai->query("SELECT * FROM tabel_pegawai WHERE id_pegawai = $id"); 
    
    if ( isset($_POST["ubah"]) ) {

        if ( $pegawai->editData($_POST) > 0 ) {
          echo "
                <script>
                  alert('data berhasil diubah');
                  document.location.href='./index.php';
                </script>
              ";
        } else if( $pegawai->editData($_POST) == 0 ){
            echo "
                <script>
                 
                  document.location.href='./index.php';
                </script>
              ";
        }
        
        else{
          echo "
                <script>
                  alert('data gagal diubah');
                 
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
                <?php
               foreach($tampilEdit as $row) :
            ?>
                <input type="hidden" name="foto_lama" value="<?= $row["foto_pegawai"]; ?>">
                <div class="form-group">
                    <label>ID Pegawai</label>
                    <input type="text" class="form-control" readonly value="<?=$id;?>" name="id_pegawai" />
                </div>
                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="text" class="form-control" value="<?=$row['nama_pegawai'];?>" name="nama_pegawai" required />
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Departemen</label>
                            <select class="form-control" name="id_departemen" required>
                                <?php
                     $id_departemen =$row['id_departemen'];
                     
                     $departemen = $pegawai->query("SELECT * FROM tabel_departemen"); foreach ($departemen as $depart ) { if ($id_departemen == $depart['id_departemen']) { $select = "selected"; } else{ $select = ""; } echo "
                                <option $select value=".$depart['id_departemen'].">".$depart['nama_departemen']."</option>
                                "; } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select class="form-control" name="id_jabatan" required>
                                <?php
                     $id_jabatan =$row['id_jabatan'];
                     
                     $jabatan = $pegawai->query("SELECT * FROM tabel_jabatan"); foreach ($jabatan as $asd ) { if ($id_jabatan == $asd['id_jabatan']) { $select = "selected"; } else{ $select = ""; } echo "
                                <option $select value=".$asd['id_jabatan'].">".$asd['nama_jabatan']."</option>
                                "; } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat_pegawai" required><?=$row['alamat_pegawai'];?></textarea>
                </div>
                <div class="form-grup">
                    <label>Foto</label><br>
                    <img src="component/profile/<?= $row['foto_pegawai']; ?>" width="150">
                </div><br>
                    <div class="form-grup">
                    <input type="file" class="form-control" name="foto_pegawai">
                </div>

                <button class="btn btn-icon icon-left btn-warning" id="kirim" type="submit" name="ubah">Submit</button>
            </form>
            <?php
        
            endforeach;
          ?>
        </div>
    </div>
</div>
