<?php
include "layout/navbar.php";
include "koneksi.php";


$id = $_GET['kdberita'];
$edit=mysqli_query($koneksi,"select * from tbberita where nomor='$id'");
$r=mysqli_fetch_array($edit);
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Berita</h1>
    <form method="post" action="update_berita.php" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Berita</label>
            <input type="text" name="judul" id="judul" class="form-control" value="<?php echo $r['judul']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" name="penulis" id="penulis" class="form-control" value=" <?php echo htmlspecialchars($_SESSION['nama_pengguna']); ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="isiberita" class="form-label">Isi Berita</label>
            <textarea name="isiberita" id="isiberita" rows="5" class="form-control" required><?php echo $r['isiberita']; ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Lama</label><br>
            <img src="foto_berita/<?php echo $r['gambar']; ?>" alt="Gambar Berita" class="img-thumbnail" width="150">
        </div>

        <div class="mb-3">
            <label for="fupload" class="form-label">Ganti Gambar</label>
            <input type="file" name="fupload" id="fupload" class="form-control">
            <small class="text-muted">* Kosongkan jika tidak ingin mengganti gambar.</small>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" onclick="history.back()">Batal</button>
        </div>
    </form>
</div>

<?php include "layout/footer.php"; ?>
