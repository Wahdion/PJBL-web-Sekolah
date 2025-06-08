<?php
include "koneksi.php";
$email    = mysqli_real_escape_string($koneksi,htmlentities($_POST['email']));
$password = mysqli_real_escape_string($koneksi,htmlentities($_POST['password']));
$check    = mysqli_query($koneksi,"SELECT * FROM admin WHERE email = '$email' AND password = md5('$password')") or die(mysql_error());
if(mysqli_num_rows($check) >= 1){
    while($row = mysqli_fetch_array($check)){   
    session_start();
    $_SESSION['id_admin'] = $row['id_admin'];
?>
<script>alert("Selamat Datang <?= $row['nama_admin']; ?> Akun anda sudah terdaftar!!!");
window.location.href="index.php"</script>
<?php
    }
}else{
echo '<script>alert(" Masukan Email dan Password dengan Benar !!!");
window.location.href="login.php"</script>';
}
