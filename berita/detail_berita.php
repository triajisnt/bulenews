<?php
include "koneksi.php";
include "layout/navbar.php";


// Mendapatkan nomor berita dari url yang kita klik
$nomor = $_GET['nomor'];

// Ambil detail berita
$sql = "SELECT tbberita.judul, tbberita.gambar, tbberita.isiberita, pengguna.nama_pengguna, tbberita.tanggal_dibuat
        FROM tbberita
        JOIN pengguna ON tbberita.id_pengguna = pengguna.id_pengguna
        WHERE tbberita.nomor = '$nomor'";
$result = mysqli_query($koneksi, $sql);
$detail = mysqli_fetch_assoc($result);

// Ambil komentar terkait berita
$sqlKomentar = "SELECT komentar.id_komentar, komentar.isi_komentar, komentar.tanggal_komentar, komentar.id_pengguna, pengguna.nama_pengguna
                FROM komentar
                JOIN pengguna ON komentar.id_pengguna = pengguna.id_pengguna
                WHERE komentar.id_berita = '$nomor'
                ORDER BY komentar.tanggal_komentar DESC";
$resultKomentar = mysqli_query($koneksi, $sqlKomentar);

// Ambil role pengguna dari session
$role = $_SESSION['peran']; 
$idPengguna = $_SESSION['id_pengguna']; // ID pengguna dari session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Berita</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4"><?php echo $detail['judul']; ?></h1>
        <img src="foto_berita/<?php echo $detail['gambar']; ?>" class="img-fluid mb-4" alt="Gambar Berita">
        <p><strong>Penulis:</strong> <?php echo $detail['nama_pengguna']; ?></p>
        <p><strong>Tanggal:</strong> <?php echo $detail['tanggal_dibuat']; ?></p>
        <p><?php echo nl2br($detail['isiberita']); ?></p>

        <h4>Komentar</h4>
        <!-- Form untuk menambahkan komentar -->
        <form action="simpan_komentar.php" method="post">
            <div class="mb-3">
                <textarea class="form-control" name="komentar" rows="3" placeholder="Tulis komentar Anda"></textarea>
            </div>
            <input type="hidden" name="nomor" value="<?php echo $nomor; ?>">
            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
        </form>

  
        <div class="mt-4">
            <?php while ($komentar = mysqli_fetch_assoc($resultKomentar)) { ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <p><strong><?php echo $komentar['nama_pengguna']; ?></strong> - <small class="text-muted"><?php echo $komentar['tanggal_komentar']; ?></small></p>
                        <p><?php echo nl2br(htmlspecialchars($komentar['isi_komentar'])); ?></p>

                        <?php if ($role == 'admin' || $komentar['id_pengguna'] == $idPengguna) { ?>
                            <div>
                                <a href="edit_komentar.php?id_komentar=<?php echo $komentar['id_komentar']; ?>&nomor=<?php echo $nomor; ?>" 
                                class="btn btn-warning btn-sm">Edit</a>
                               
                                <a href="#" 
                                    onclick="konfirmasiHapus('<?php echo $data['id_komentar']; ?>')">
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
                                            window.location.href = `hapus_komentar.php?id_komentar=${nomor}`;
                                        }
                                    });
                                }
                            </script>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include "layout/footer.php"; ?>
</body>
</html>
