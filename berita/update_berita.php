<?php
include "koneksi.php";
session_start();

$vfoto = $_FILES['fupload']['name'];
$tfoto = $_FILES['fupload']['tmp_name'];

// Jika gambar tidak diubah
if (empty($tfoto)) {
    mysqli_query($koneksi, "UPDATE tbberita SET 
                                judul = '$_POST[judul]', 
                                isiberita = '$_POST[isiberita]'
                            WHERE nomor = '$_POST[id]'");
} 
// Jika gambar diubah
else {
    move_uploaded_file($tfoto, "foto_berita/$vfoto");
    mysqli_query($koneksi, "UPDATE tbberita SET 
                                judul = '$_POST[judul]', 
                                isiberita = '$_POST[isiberita]', 
                                gambar = '$vfoto'
                            WHERE nomor = '$_POST[id]'");
}
?>
<script>
    document.location = 'tampil_berita.php';
</script>
