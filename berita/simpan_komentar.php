<?php
include "koneksi.php";
include "layout/navbar.php";


if (isset($_POST['nomor'], $_POST['komentar']) && isset($_SESSION['id_pengguna'])) {
    $nomor = $_POST['nomor']; // Nomor berita
    $komentar = mysqli_real_escape_string($koneksi, $_POST['komentar']); // Sanitasi input
    $tanggal = date('Y-m-d H:i:s'); // Waktu komentar
    $id_pengguna = $_SESSION['id_pengguna']; // ID pengguna dari session

    $query = "INSERT INTO komentar (id_berita, id_pengguna, isi_komentar, tanggal_komentar) 
              VALUES ('$nomor', '$id_pengguna', '$komentar', '$tanggal')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Komentar Anda berhasil disimpan!',
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
} else {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Data tidak lengkap atau Anda belum login.',
            confirmButtonText: 'OK'
        }).then(() => {
            history.back();
        });
    </script>";
}

include "layout/navbar.php";
?>
