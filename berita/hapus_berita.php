<?php
include "koneksi.php";
include "layout/navbar.php";

$cek_berita = mysqli_query($koneksi, "SELECT * FROM tbberita WHERE nomor ='$_GET[kdhapus]'");

if (mysqli_num_rows($cek_berita) > 0) {
    // Hapus komentar
    $hapus = mysqli_query($koneksi, "DELETE FROM tbberita WHERE nomor ='$_GET[kdhapus]'");

    if ($hapus) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Berita Berhasil Dihapus!',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location = 'tampil_berita.php'; 
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gagal menghapus Berita!',
                confirmButtonText: 'Coba Lagi'
            }).then(() => {
                history.back();
            });
        </script>";
    }
} else {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Berita tidak ditemukan!',
            confirmButtonText: 'OK'
        }).then(() => {
            history.back();
        });
    </script>";
} 

include "layout/footer.php";
?>
