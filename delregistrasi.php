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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Siswa Baru</title>
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

  <h1>Formulir Pendaftaran Siswa Baru</h1>

    <?php 
    echo "Selamat Datang <strong>" . $_SESSION['username'] . "</strong>";
    ?>
    <div>
        <hr>
        <p>Silahkan isi biodata anda!!</p>
        <?php 
            $username = $_SESSION['username'];
            //var_dump(cekRegistrasi($username));
            if(cekRegistrasi($username) == 0):
            //jika hasil cek registrasi 0 maka tampilkan form registrasi
           
        ?>
        <form action="" method="POST">
            <input type="hidden" name="username" value="<?= $username; ?>">

            <fieldset>
                <legend>Biodata Calon Siswa</legend>

                <label for="namaDepan">Nama Depan : </label>
                <input type="text" name="namaDepan" id="namaDepan"><br><br>

                <label for="namaBelakang">Nama Belakang : </label>
                <input type="text" name="namaBelakang" id="namaBelakang"> <br><br>

                <label for="tempatLahir">Tempat Lahir : </label>
                <input type="text" name="tempatLahir" id="tempatLahir"> <br><br>

                <label for="tglLahir">Tanggal Lahir : </label>
                <input type="date" name="tglLahir" id="tglLahir"> <br><br>

                <label for="jenisKelamin">Jenis Kelamin :   </label>
                <input type="radio" name="jenisKelamin" id="Laki-laki" value="Laki-laki">
                <label for="Laki-laki">Laki-laki</label>
                <input type="radio" name="jenisKelamin" id="Perempuan" value="Perempuan">
                <label for="Perempuan">Perempuan</label> <br><br>

                <label for="nisn">NISN : </label>
                <input type="text" name="nisn" id="nisn" maxlength="10"> <br><br>

                <label for="agama">Agama : </label>
                <select name="agama" id="agama">
                    <option value="">Pilih salah Satu</option>
                    <option value="Islam">Islam</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Katholik">Katholik</option>
                    <option value="Budha">Budha</option>
                </select> <br><br>

                <label for="asalSekolah">Asal Sekolah : </label>
                <input type="text" name="sekolahAsal" id="asalSekolah"> <br><br>

                <label for="alamat">Alamat : </label>
                <textarea name="alamat" id="alamat"></textarea> <br><br>

                <label for="telpon">Telpon/WA : </label>
                <input type="text" name="telpon" id="telpon">
            </fieldset>

            <fieldset>
                <legend>Data Orang Tua</legend>

                <label for="namaAyah">Nama Ayah : </label>
                <input type="text" name="namaAyah" id="namaAyah"> <br><br>

                <label for="pekerjaanAyah">Pekerjaan Ayah : </label>
                <input type="text" name="pekerjaanAyah" id="pekerjaanAyah"> <br><br>

                <label for="penghasilanAyah">Penghasilan Ayah : </label>
                <input type="number" name="penghasilanAyah" id="penghasilanAyah"><br><br>

                <label for="namaIbu">Nama Ibu : </label>
                <input type="text" name="namaIbu" id="namaIbu"> <br><br>

                <label for="pekerjaanIbu">Pekerjaan Ibu : </label>
                <input type="text" name="pekerjaanIbu" id="pekerjaanIbu"> <br><br>

                <label for="penghasilanIbu">Penghasilan Ibu : </label>
                <input type="number" name="penghasilanIbu" id="penghasilanIbu"> <br><br>

            </fieldset>

            <input type="submit" name="tabel_registrasi" value="Registrasi">
            

        </form>
        
        <?php 
            else:
                //jika hasil cek registrasi 1 maka tampilkan pesan sudah mengisi formulir
                //selanjutnya pendaftar dapat mengedit formulir
                echo "Anda sudah mengisi formulir, Berikut data yang anda Kirim : <hr> ";             

                //tampilkan data pelamar yang diambil dari tbl_registrasi dan tbl_orangtua

                $dataPendaftar = tampilPendaftar($username);
                //var_dump($dataPendaftar);

                foreach($dataPendaftar as $pendaftar):
            ?>
                     <p> <strong>Data Pendaftar</strong></p>
                <ul>
                    <li>Nama Depan : <?= $pendaftar['namaDepan']; ?></li>
                    <li>Nama Belakang : <?= $pendaftar['namaBelakang']; ?></li>
                    <li>Tempat, Tanggal Lahir : <?= $pendaftar['tempatLahir']; ?>, <?= date('d F Y', strtotime($pendaftar['tglLahir'])); ?></li>
                    <li>Jenis Kelamin : <?= $pendaftar['jenisKelamin']; ?></li>
                    <li>NISN : <?= $pendaftar['nisn']; ?></li>
                    <li>Agama : <?= $pendaftar['agama']; ?></li>
                    <li>Sekolah Asal : <?= $pendaftar['sekolahAsal']; ?></li>
                    <li>alamat : <?= $pendaftar['alamat']; ?></li>
                    <li>Nomor Telepon : <?= $pendaftar['telepon']; ?></li>

                </ul>
                <p> <strong>Data Orang Tua</strong></p>
                <ul>
                    <li>Nama Ayah: <?= $pendaftar['namaAyah']; ?></li>
                    <li>Pekerjaan Ayah: <?= $pendaftar['pekerjaanAyah']; ?></li>
                    <li>Penghasilan Ayah: Rp. <?= $pendaftar['penghasilanAyah']; ?></li>
                    <li>Nama Ibu: <?= $pendaftar['namaIbu']; ?></li>
                    <li>Pekerjaan Ibu: <?= $pendaftar['pekerjaanIbu']; ?></li>
                    <li>Penghasilan Ibu: Rp. <?= $pendaftar['penghasilanIbu']; ?></li>
                </ul>

                <p>Untuk melakukan perubahan klik <a href="editregistrasi.php"><strong>Edit</strong></a></p>
                <p>Jika ingin membatalkan Pendaftaran <a href="?username=<?= $username; ?>" onclick="return confirm('Apakah Anda yakin ingin membatalkan pendaftaran dan menghapus semua data?');"><strong>Hapus Pendaftaran</strong></a></p>


            <?php
                endforeach;
                endif;

            
            ?>

        <?php 
        //cek apakah tombol registrasi diklik
            if(isset($_POST['tabel_registrasi'])){
                //var_dump($_POST['username']);

                if(registrasi($_POST) == 1){
                    echo "<script>
                        alert('Anda Berhasil Mendaftar');
                        document.location.href = 'registrasi.php';
                        </script>";
                }else{
                    echo "<script>
                        alert('Error!!! Anda Gagal Mendaftar');
                        </script>";
                }
            }
        ?>
        
        <?php 
        //jika ingin membatalkan pendaftaran
        if(isset ($_GET['username'])){
            //var_dump($_GET['username'], $_GET['idRegistrasi']);
            //var_dump(hapusPendaftaran($_GET['username'], $_GET['idRegistrasi']));
            
           if(hapusPendaftaran($_GET['username'])){
                echo "<script>
                        alert('Anda Berhasil membatalkan pendaftaran');
                        document.location.href = 'registrasi.php';
                        </script>";
           }else{
                echo "<script>
                        alert('Error!!!Pendaftaran Gagal dihapus');
                        document.location.href = 'registrasi.php';
                        </script>";
           }
                        
        
        }
            
        
        ?>
    
    </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>