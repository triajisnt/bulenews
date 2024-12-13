<?php
    include "layout/navbar.php";
    session_destroy();

    echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: 'Logout berhasil!',
    }).then((result) => {
        if (result.isConfirmed) {
            document.location = 'login.php';
        }
    });
    </script>";

?>
