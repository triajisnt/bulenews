<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Untuk sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<!-- navbar.php -->
<?php
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">

    <a class="navbar-brand" href="index.php">
      <img src="image/icon.png" alt="Logo Perusahaan" width="30" height="30" class="d-inline-block align-text-top">
      BuleNews
    </a>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">

        <li class="nav-item">
          <a class="nav-link" href="index.php">Halaman Berita</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="komentar.php">Komentar</a>
        </li> -->

        <?php if (isset($_SESSION['peran'])): ?>

          <?php if ($_SESSION['peran'] == 'admin'): ?>
        <li class="nav-item">
          <a class="nav-link" href="tampil_berita.php">List Berita</a>
        </li>
        <li class="nav-item">
              <a class="nav-link" href="tambah_berita.php">Tambah Berita</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pengguna.php">Pengguna</a>
            </li>
          <?php endif; ?>


          <?php if ($_SESSION['peran'] == 'penulis'): ?>
        <li class="nav-item">
          <a class="nav-link" href="tampil_berita.php">List Berita Saya</a>
        </li>
            <li class="nav-item">
              <a class="nav-link" href="tambah_berita.php">Tambah Berita</a>
            </li>
          <?php endif; ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo htmlspecialchars($_SESSION['nama_pengguna']); ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>

        <?php else: ?>

          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

</body>
</html>
