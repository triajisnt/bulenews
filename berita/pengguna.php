<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil pengguna</title>
    
</head>
<body>

<?php
include "layout/navbar.php";
include "koneksi.php";

$id_pengguna = $_SESSION['id_pengguna']; 
$peran = $_SESSION['peran'];

if ($peran == 'admin') {
    $sql = mysqli_query($koneksi, "SELECT * FROM pengguna ORDER BY id_pengguna ASC");
} else if ($peran == 'penulis') {
    $sql = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna = '$id_pengguna' ORDER BY id_pengguna ASC");
} else {
    $sql = mysqli_query($koneksi, "SELECT * FROM pengguna ORDER BY id_pengguna ASC"); 
}
?>

<div class="container">
    <h1 class="display-5">Daftar pengguna</h1>
    <p>Berikut ini adalah daftar pengguna yang tersedia.</p>

    <?php if ($peran == 'admin'): ?>
        <input type="button" value='Tambah pengguna' onclick="document.location='tambah_pengguna.php'" class="btn btn-primary"> 
    <?php endif; ?>
    <br><br>

    <div class="table-responsive-sm">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <th>Email</th>
                    <th>Peran</th>
                    <th>Tanggal Dibuat</th>
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
                        <td><?php echo htmlspecialchars($data['nama_pengguna']); ?></td>
                        <td><?php echo htmlspecialchars($data['email']); ?></td>
                        <td><?php echo htmlspecialchars($data['peran']); ?></td>
                        <td><?php echo htmlspecialchars($data['tanggal_dibuat']); ?></td>
                        <?php if ($peran == 'admin' || ($peran == 'penulis' && $data['id_pengguna'] == $id_pengguna)): ?>
                            <td>
                                <a href="#" 
                                    onclick="konfirmasiHapus('<?php echo $data['id_pengguna']; ?>')">
                                    <input type="button" value="Hapus" class="btn btn-outline-danger btn-sm">
                                </a>
                                <script>
                                function konfirmasiHapus(nomor) {
                                    Swal.fire({
                                        title: 'Yakin ingin menghapus pengguna ini?',
                                        text: "pengguna yang dihapus tidak dapat dikembalikan!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, Hapus!',
                                        cancelButtonText: 'Batal'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = `hapus_pengguna.php?id_pengguna=${nomor}`;
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