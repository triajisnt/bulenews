<?php
include "layout/navbar.php";
include "koneksi.php";

mysqli_query($koneksi,"DELETE from komentar where id_komentar='$_GET[id_komentar]'");

if (mysqli_query($koneksi, $query)) {
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Komentar Anda berhasil diupdate!',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location = 'detail_berita.php?nomor=$nomor';
            }
        });
    </script>";
} else {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Terjadi kesalahan saat menyimpan komentar.',
            confirmButtonText: 'Coba Lagi'
        }).then(() => {
            history.back();
        });
    </script>";
} 

?>
