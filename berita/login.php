<?php
include "koneksi.php";
include "layout/navbar.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $kata_sandi = $_POST['kata_sandi'];

    $query = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE email = '$email'");
    if ($query && mysqli_num_rows($query) > 0) {
        $user = mysqli_fetch_assoc($query);

        // Verifikasi password
        if (password_verify($kata_sandi, $user['kata_sandi'])) {
            $_SESSION['id_pengguna'] = $user['id_pengguna'];
            $_SESSION['nama_pengguna'] = $user['nama_pengguna'];
            $_SESSION['peran'] = $user['peran'];

            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Login berhasil!',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location = 'index.php';
                }
            });
            </script>";
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Password salah!',
            }).then(() => {
                history.back();
            });
            </script>";
        }
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Email tidak ditemukan!',
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
    <title>Login</title>
</head>
<body>
    <br>
    <div class="container">
        <h1>Login</h1>
        <form method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="kata_sandi" class="form-label">Kata Sandi</label>
                <input type="password" name="kata_sandi" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    <br>
    <br>
</body>
</html>
<?php include "layout/footer.php";?>