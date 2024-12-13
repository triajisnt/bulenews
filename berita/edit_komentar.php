<?php
include "layout/navbar.php";
include "koneksi.php";


$id = $_GET['id_komentar'];
$edit=mysqli_query($koneksi,"select * from komentar where id_komentar='$id'");
$r=mysqli_fetch_array($edit);
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Edit komentar</h1>
    <form method="post" action="update_komentar.php" enctype="multipart/form-data">

    <input type="hidden" name="id_komentar" value="<?php echo $r['id_komentar']; ?>">
    <input type="hidden" name="nomor" value="<?php echo $r['id_berita']; ?>"> 

        <div class="mb-3">
            <label for="isi_komentar" class="form-label">Edit Komentar</label>
            <textarea name="komentar" id="komentar" rows="5" class="form-control" required><?php echo $r['isi_komentar']; ?></textarea>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Update Komentar</button>
            <button type="button" class="btn btn-secondary" onclick="history.back()">Batal</button>
        </div>
    </form>
</div>

<?php include "layout/footer.php"; ?>
