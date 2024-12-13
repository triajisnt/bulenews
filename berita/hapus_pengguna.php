<?php
include "layout/navbar.php";
include "koneksi.php";

if (isset($_GET['id_pengguna'])) {
    $id_pengguna = $_GET['id_pengguna'];

    $query = "DELETE FROM pengguna WHERE id_pengguna='$id_pengguna'";
    $delete = mysqli_query($koneksi, $query);

    if ($delete) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Pengguna berhasil dihapus!',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'pengguna.php'; 
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Terjadi kesalahan saat menghapus pengguna.',
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
            text: 'ID pengguna tidak ditemukan!',
            confirmButtonText: 'OK'
        }).then(() => {
            history.back();
        });
    </script>";
}

?>
