<?php
include "koneksi.php";
include "layout/navbar.php";

$sql = "SELECT tbberita.nomor, tbberita.judul, tbberita.gambar, pengguna.nama_pengguna, tbberita.tanggal_dibuat
        FROM tbberita
        JOIN pengguna ON tbberita.id_pengguna = pengguna.id_pengguna
        ORDER BY tbberita.tanggal_dibuat DESC";
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berita</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Berita</h1>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="foto_berita/<?php echo $row['gambar']; ?>" class="card-img-top" alt="Gambar Berita">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['judul']; ?></h5>
                            <p class="card-text">Penulis: <?php echo $row['nama_pengguna']; ?></p>
                            <p class="card-text"><small class="text-muted">Tanggal: <?php echo $row['tanggal_dibuat']; ?></small></p>
                            <a href="detail_berita.php?nomor=<?php echo $row['nomor']; ?>" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    

    <?php include "layout/footer.php"; ?>
</body>
</html>

