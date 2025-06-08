<?php
session_start();
include "koneksi.php";
if(isset($_SESSION['id_admin'])==0){
    echo '<script> alert("Maaf....Untuk Masuk Ke Halaman Administrator Anda Harus Login Terlebih Dahulu!!!");
    window.location.href="login.php"</script>';
}else{
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="icon" href="../gambar_home/logo.png" type="image/x-icon">

    <title>DASHBOARD SSRI</title>
  </head>
  <body>
  <?php
    include("koneksi.php"); //memanggil file koneksi.php
    include("function.php"); //memanggil file function.php
    menu(); //memanggil prosedur menu

    if(isset($_GET['cariguru'])) {
        include("guru.php");
    } else if(isset($_GET['carijurusan'])) {
        include("jurusan.php");
    } else if(isset($_GET['carimapel'])) {
        include("mapel.php");
    } else if(isset($_GET['carifasilitas'])) {
        include("fasilitas.php");
    } else if(isset($_GET['carimesagge'])) {
        include("mesagge.php");

     } else if(isset($_GET['hal'])) {
        $hal = $_GET['hal'];
        if($hal=='guru') {
            include("guru.php");
        } else if($hal=='gurutambah') {
            include("guru_tambah.php");
        } else if($hal=='guruedit') {
            include("guru_edit.php");
        } else if($hal=='jurusan') {
            include("jurusan.php");
        } else if($hal=='guruhapus') {
            include("guru_hapus.php");
        } else if($hal=='jurusan') {
            include("jurusan.php");
        } else if($hal=='jurusantambah') {
            include("jurusan_tambah.php");
        } else if($hal=='jurusanedit') {
            include("jurusan_edit.php");
        } else if($hal=='jurusanhapus') {
            include("jurusan_hapus.php");
        }else if($hal=='mapel') {
            include("mapel.php");
        } else if($hal=='mapeltambah') {
            include("mapel_tambah.php");
        } else if($hal=='mapeledit') {
            include("mapel_edit.php");
        } else if($hal=='mapelhapus') {
            include("mapel_hapus.php");
        }else if($hal=='fasilitas') {
            include("fasilitas.php");
        } else if($hal=='fasilitastambah') {
            include("fasilitas_tambah.php");
        } else if($hal=='fasilitasedit') {
            include("fasilitas_edit.php");
        } else if($hal=='fasilitashapus') {
            include("fasilitas_hapus.php");
        }else if($hal=='admin') {
        include("admin.php");
    } else if($hal=='admtambah') {
        include("admin_tambah.php");
    } else if($hal=='admedit') {
        include("admin_edit.php");
    } else if($hal=='admhapus') {
        include("admin_hapus.php");
    } else if($hal=='mesagge') {
        include("mesagge.php");
    } else if($hal=='mesaggehapus') {
        include("mesagge_hapus.php");
    }
    

       

    } else {
        beranda(); //memanggil prosedur beranda
    }

    footer(); //memanggil prosedur footer
?>
  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="bootstrap/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="bootstrap/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<?php } ?>