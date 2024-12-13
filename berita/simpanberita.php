<?php
include "koneksi.php";
include "layout/navbar.php";

$judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
$isi = mysqli_real_escape_string($koneksi, $_POST['isiberita']);
$penulis = mysqli_real_escape_string($koneksi, $_SESSION['nama_pengguna']);

$vfoto = $_FILES['fupload']['name'];
$tfoto = $_FILES['fupload']['tmp_name'];
$dir = "foto_berita/";
$upload = $dir . basename($vfoto);

$id_pengguna = $_SESSION['id_pengguna']; // ID pengguna yang login
$peran = $_SESSION['peran']; // Peran pengguna yang login

if (move_uploaded_file($tfoto, $upload)) {
    $simpan = mysqli_query($koneksi, "INSERT INTO tbberita (judul, isiberita, gambar, penulis, id_pengguna) 
    VALUES ('$judul', '$isi', '$vfoto',  '$penulis', '{$_SESSION['id_pengguna']}')");
    
    if ($simpan) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Berita berhasil disimpan!',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location='tampil_berita.php';
            }
        });
        </script>";
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Gagal menyimpan berita!',
            confirmButtonText: 'Coba Lagi'
        }).then((result) => {
            if (result.isConfirmed) {
                history.back();
            }
        });
        </script>";
    }
} else {
    echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: 'Gagal mengunggah gambar!',
        confirmButtonText: 'Coba Lagi'
    }).then((result) => {
        if (result.isConfirmed) {
            history.back();
        }
    });
    </script>";
}
?>