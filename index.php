<?php 
//set session
session_start();

require "../fungsi.php";

if(!isset($_SESSION['login'])){
    header("location: ../login.php");
}else if($_SESSION['login'] && $_SESSION['peran'] != 'pelamar'){
    echo "<script>
        alert('Anda tidak diijinkan mengakses halaman ini');
        document.location.href = '../panitia/index.php';
        </script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelamar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
      <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
      <div class="container-fluid">
      <a class="navbar-brand" href="#">ASPMB</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="registrasi.php">Registrasi</a>
          </li>
           <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dokumen.php">Dokumen</a>
          </li>
           <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="kelulusan.php">Kelulusan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../logout.php">Logout</a>
          </li>
      </div>
    </div>
  </nav>
  <div>
    <h1>Dashboard Pelamar</h1>
  </div>
  <div>
    <?php
        echo "Selamat Datang <strong>" . $_SESSION['username'] . "</strong>";
    ?>
</div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>