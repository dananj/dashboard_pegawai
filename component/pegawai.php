<?php

include('db.php');

interface Proses{
    public function tambahData($data);
    public function editData($data);
    public function deleteData($data);
}

class Pegawai extends Database implements Proses
{
    
    public function query($query)
    {
        $result = mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
        $rows = [];
        while ($row = mysqli_fetch_assoc($result))
        {
            $rows[] = $row;
        }

        return $rows;
    }
    public function tambahData($data)
    {
        $nama_pegawai = htmlspecialchars($data['nama_pegawai']);
        $alamat_pegawai =$data['alamat_pegawai'];
        $jabatan_pegawai = htmlspecialchars($data['id_jabatan']);
        $id_departemen = htmlspecialchars($data['id_departemen']);
        $foto_pegawai = $this->upload();
		if ( !$foto_pegawai ) {
		 	return false;
		 } 
        $query = "INSERT INTO tabel_pegawai VALUES('','$nama_pegawai', '$alamat_pegawai','$jabatan_pegawai','$id_departemen','$foto_pegawai')";

        mysqli_query($this->conn, $query);

        return mysqli_affected_rows($this->conn);
    }
    public function editData($data)
    {
     
        $id_pegawai = $data['id_pegawai'];
        $nama_pegawai = htmlspecialchars($data['nama_pegawai']);
        $alamat_pegawai = htmlspecialchars($data['alamat_pegawai']);
        $id_departemen = htmlspecialchars($data['id_departemen']);
        $id_jabatan = htmlspecialchars($data['id_jabatan']);
        $foto_lama = htmlspecialchars($data['foto_lama']);

        if ( $_FILES['foto_pegawai']['error'] === 4 ) {
            $foto_pegawai = $foto_lama;
        } else{
            $foto_pegawai = $this -> upload();
        }
       
        $sql = "UPDATE tabel_pegawai SET 
        nama_pegawai = '$nama_pegawai',
        alamat_pegawai = '$alamat_pegawai',
        id_jabatan = '$id_jabatan',
        id_departemen = '$id_departemen',
        foto_pegawai = '$foto_pegawai'
        WHERE id_pegawai = $id_pegawai";
        
        mysqli_query($this->conn, $sql);
       
        return mysqli_affected_rows($this->conn);
    }
    public function deleteData($id_pegawai)
    {

        mysqli_query($this->conn, "DELETE FROM tabel_pegawai WHERE id_pegawai = $id_pegawai");

        return mysqli_affected_rows($this->conn);
    }
    public function upload(){
       
			$ekstensi_diperbolehkan	= ['png','jpg','jpeg'];
			$nama = $_FILES['foto_pegawai']['name'];
			$ekstensiGambar = explode('.', $nama);
			$ekstensi = strtolower(end($ekstensiGambar));
			$ukuran	= $_FILES['foto_pegawai']['size'];
            $file_tmp = $_FILES['foto_pegawai']['tmp_name'];	
     
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensi;
            
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'component/profile/'.$namaFileBaru);
				
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		return $namaFileBaru;
    }
   


}
?>
