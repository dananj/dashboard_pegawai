<?php
include "pegawai.php";

$pegawai = new Pegawai();


if ($_GET['proses'] == "delete")
{

    $id_pegawai = $_GET['id_pegawai'];

    if ($pegawai->deleteData($id_pegawai) > 0)
    {
        echo "
        <script>alert('Data Berhasil dihapus');
        document.location.href='../index.php';
        </script>";
    }
    else
    {
        echo "<script>
				alert('Data Gagal Dihapus !');
				document.location.href='../index.php';
      </script>";

    }

}


