<?php
      $tampil = $pegawai->query("SELECT * FROM tabel_pegawai");
   ?>
<div class="section-header">
   <h1>List Pegawai</h1>
</div>
<div class="section-body">
   <div class="container">
      <div class="card">
         <div class="card-header">
            <h4>List Table</h4>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-bordered table-md">
                  <tbody>
                     <tr>
                        <th>No</th>
                        <th>ID Pegawai</th>
                        <th>Nama Pegawai</th>
                        <th>Departemen</th>
                        <th>Jabatan</th>
                        <th>Alamat</th>
                        <th>Foto Pegawai</th>
                        <th>Aksi</th>
                     </tr>
                     <?php
                        $i=1;
                        foreach ($tampil as $row) :
                        ?>
                     <tr>
                        <th scope="row"><?=$i;?></th>
                        <td><?=$row['id_pegawai'];?></td>
                        <td><?=$row['nama_pegawai'];?></td>
                        <td><?php
                           $idTarget =$row['id_departemen'];
                           $departemen = $pegawai->query("SELECT * FROM tabel_departemen");
                           foreach ($departemen as $asd ) {
                           if ($idTarget == $asd['id_departemen']) {
                           echo $asd['nama_departemen'];        
                           }                                                      
                           }
                           ?></td>
                        <td> <?php
                           $idJabatan =$row['id_jabatan'];
                           $jabatan = $pegawai->query("SELECT * FROM tabel_jabatan");
                           foreach ($jabatan as $asd ) {
                             if ($idJabatan == $asd['id_jabatan']) {
                                 echo $asd['nama_jabatan'];        
                             }                                                      
                           }
                           ?></td>
                        <td><?=$row['alamat_pegawai'];?></td>
                        <td><img src='component/profile/<?=$row['foto_pegawai'];?>' alt="" srcset="" width="150px" >
                        </td>
                        <td>
                        <figure>
                        <div class="buttons">
                          <a href='index.php?id=<?=$row['id_pegawai'];?>&page=edit' class="btn btn-warning">EDIT</a>
                        </div>
                      </figure>
                      <figure>
                        <div class="buttons">
                          <button class="btn btn-danger trigger--fire-modal-7" data-confirm="Realy?|Do you want to continue?" data-confirm-yes="window.location.href='component/delete.php?id_pegawai=<?= $row['id_pegawai']; ?>&proses=delete'">Delete</button>
                        </div>
                      </figure>
                        </td>
                     </tr>
                     <?php
                        $i++;
                        endforeach;?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
</div>