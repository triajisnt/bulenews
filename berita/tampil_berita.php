<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Berita</title>
    
</head>
<body>

<?php
include "layout/navbar.php";
include "koneksi.php";

$id_pengguna = $_SESSION['id_pengguna']; // ID pengguna yang login
$peran = $_SESSION['peran']; // Peran pengguna yang login

if ($peran == 'admin') {
    $sql = mysqli_query($koneksi, "SELECT * FROM tbberita ORDER BY nomor ASC");
} else if ($peran == 'penulis') {
    $sql = mysqli_query($koneksi, "SELECT * FROM tbberita WHERE id_pengguna = '$id_pengguna' ORDER BY nomor ASC");
} else {
    $sql = mysqli_query($koneksi, "SELECT * FROM tbberita ORDER BY nomor ASC"); // Pembaca hanya lihat
}
?>

<div class="container">
    <h1 class="display-5">Daftar Berita</h1>
    <p>Berikut ini adalah daftar berita yang tersedia.</p>

    <?php if ($peran == 'penulis'): ?>
        <input type="button" value='Tambah Berita' onclick="document.location='tambah_berita.php'" class="btn btn-primary"> 
    <?php endif; ?>
    <br><br>

    <div class="table-responsive-sm">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Berita</th>
                    <th>Isi Berita</th>
                    <th>Gambar</th>
                    <th>Penulis</th>
                    <?php if ($peran != 'pembaca'): ?>
                        <th width="20%">Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>

            <?php
            $i = 1;
            while ($data = mysqli_fetch_array($sql)) {
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo htmlspecialchars($data['judul']); ?></td>
                        <td><?php echo htmlspecialchars($data['isiberita']); ?></td>
                        <td><?php echo "<img src='foto_berita/" . htmlspecialchars($data['gambar']) . "' width=100 height=100>"; ?></td>
                        <td><?php echo htmlspecialchars($data['penulis']); ?></td>
                        <?php if ($peran == 'admin' || ($peran == 'penulis' && $data['id_pengguna'] == $id_pengguna)): ?>
                            <td>
                                <a href="edit_berita.php?kdberita=<?php echo $data['nomor']; ?>">
                                    <input type="button" value="Edit" class="btn btn-outline-warning btn-sm">
                                </a>
                                <a href="#" 
                                    onclick="konfirmasiHapus('<?php echo $data['nomor']; ?>')">
                                    <input type="button" value="Hapus" class="btn btn-outline-danger btn-sm">
                                </a>
                                <script>
                                function konfirmasiHapus(nomor) {
                                    Swal.fire({
                                        title: 'Yakin ingin menghapus berita ini?',
                                        text: "Berita yang dihapus tidak dapat dikembalikan!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, Hapus!',
                                        cancelButtonText: 'Batal'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = `hapus_berita.php?kdhapus=${nomor}`;
                                        }
                                    });
                                }
                            </script>
                            </td>
                        <?php endif; ?>
                    </tr>
                </tbody>
                <?php
                $i++;
            }
            ?>
        </table>
    </div>
</div>
<?php include "layout/footer.php"; ?>

</body>
</html>