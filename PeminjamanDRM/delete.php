<?php
//include file config.php
include('/config/config.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['no_pinjam'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$no_pinjam = $_GET['no_pinjam'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE no_pinjam='$no_pinjam'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE no_pinjam='$no_pinjam'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="dashboard.php?page=tampil_peminjaman_DRM";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="dashboard.php?page=tampil_peminjaman_DRM";</script>';
		}
	}else{
		echo '<script>alert("Nomor pinjam tidak ditemukan di database."); document.location="dashboard.php?page=tampil_peminjaman_DRM";</script>';
	}
}else{
	echo '<script>alert("Nomor Pinjam tidak ditemukan di database."); document.location="dashboard.php?page=tampil_peminjaman_DRM";</script>';
}

?>
