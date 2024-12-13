<?php
include "koneksi.php";
include "layout/navbar.php";

if (isset($_POST['id_komentar'], $_POST['nomor'], $_POST['komentar']) && isset($_SESSION['id_pengguna'])) {
    $id_komentar = $_POST['id_komentar'];
    $nomor = $_POST['nomor'];
    $komentar = mysqli_real_escape_string($koneksi, $_POST['komentar']);
    $tanggal = date('Y-m-d H:i:s');
    $id_pengguna = $_SESSION['id_pengguna'];

    // Debugging untuk memastikan data diterima
    var_dump($komentar, $id_komentar, $nomor);

    $update = mysqli_query($koneksi, "UPDATE komentar SET isi_komentar = '$komentar' WHERE id_komentar = '$id_komentar'");

    if ($update) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Komentar Berhasil Diperbarui!',
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
                text: 'Gagal memperbarui komentar!',
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
            text: 'Data tidak lengkap!',
            confirmButtonText: 'OK'
        });
    </script>";
}

include "layout/navbar.php";
?>