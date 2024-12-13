<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>

    <?php 
    include "layout/navbar.php";
    include "koneksi.php" ;
?>

<body>

    <div class="container">
    <h1 class="display-5">Form Tambah Berita</h1>    

        <form action="simpanberita.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" placeholder="Judul Berita" required>
        </div>

        <div class="mb-3">
            <label for="isiberita" class="form-label">Isi Berita</label>
            <textarea class="form-control" name="isiberita" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Masukkan Gambar</label>
            <input class="form-control" type="file" name="fupload" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" class="form-control" name="penulis" placeholder=" <?php echo htmlspecialchars($_SESSION['nama_pengguna']); ?>" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-outline-danger">Batal</button>
    </form>
      </div>
    </div>
  <br>
  <?php include "layout/footer.php"; ?>
</body>
</html>