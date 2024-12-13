<?php
include "koneksi.php";
include "layout/navbar.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pengguna = mysqli_real_escape_string($koneksi, $_POST['nama_pengguna']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $kata_sandi = password_hash($_POST['kata_sandi'], PASSWORD_BCRYPT);
    $peran = mysqli_real_escape_string($koneksi, $_POST['peran']);

    $query = "INSERT INTO pengguna (nama_pengguna, email, kata_sandi, peran) 
              VALUES ('$nama_pengguna', '$email', '$kata_sandi', '$peran')";

        if (mysqli_query($koneksi, $query)) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Registrasi! Sekarang Login',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location = 'login.php';
            }
        });
        </script>";
        } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Registrasi gagal!',
                confirmButtonText: 'Coba Lagi'
            }).then(() => {
                history.back();
            });
        </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form method="post">
            <div class="mb-3">
                <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                <input type="text" name="nama_pengguna" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="kata_sandi" class="form-label">Kata Sandi</label>
                <input type="password" name="kata_sandi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="peran" class="form-label">Peran</label>
                <select name="peran" class="form-select">
                    <option value="pembaca">Pembaca</option>
                    <option value="penulis">Penulis</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    

<?php include "layout/footer.php"; ?>
</body>
</html>
