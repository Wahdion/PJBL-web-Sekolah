<?php include 'koneksi.php'; ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div class="alert alert-light" role="alert">
  <div class="wrapper">
    <div class="header">
      <img src="../gambar_home/logo.png" alt="Logo SMKN 1 Sukawati" class="logo">
      <h1>SMKN 1 Sukawati</h1>
    </div>
    <h2 align="center">Pendaftaran</h2>
    <div class="welcome-message">
      Selamat datang! Silakan isi formulir di bawah ini untuk membuat akun admin baru.
    </div>

    <form method="POST">
      <div class="form-group">
        <label for="namaAdmin">Nama Admin</label>
        <i class="fas fa-user"></i>
        <input type="text" name="nama_admin" required class="form-control" id="namaAdmin" placeholder="Masukkan Nama Admin">
      </div>
      <div class="form-group">
        <label for="emailAdmin">Email</label>
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" required class="form-control" id="emailAdmin" placeholder="Masukkan Email">
      </div>
      <div class="form-group">
        <label for="passwordAdmin">Kata Sandi</label>
        <i class="fas fa-lock"></i>
        <input type="password" name="password" required class="form-control" id="passwordAdmin" placeholder="Masukkan Kata Sandi">
      </div>
      <div class="form-group">
        <label for="tglLahirAdmin">Tanggal Lahir</label>
        <i class="fas fa-calendar-week"></i>
        <input type="date" name="tgl_lahir" required class="form-control" id="tglLahirAdmin">
      </div>

      <div class="button-group">
        <input type="submit" name="simpan" class="btn btn-primary kirim" value="Simpan">
        <br><br>
        <div class="batal">
          <a href="register.php">Batal</a>
        </div>
      </div>
    </form>

    <div class="divider"></div>
    <div class="footer">
      <p>Butuh bantuan? <a href="#">Hubungi dukungan</a></p>
      <div class="social-media">
        <a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>
        <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </div>
</div>

<?php
if(isset($_POST['simpan'])) { // Proses simpan data admin
  $nama_admin = $_POST['nama_admin'];
  $email = $_POST['email'];
  $password = MD5($_POST['password']);
  $tgl_lahir = $_POST['tgl_lahir'];

  $simpan = mysqli_query($koneksi, "INSERT INTO admin (nama_admin, email, password, tgl_lahir) VALUES ('$nama_admin', '$email', '$password', '$tgl_lahir')");
  if($simpan) {
    echo '
    <script>
      alert("Pendaftaran Berhasil!");
      window.location="login.php"; // Menuju ke halaman login
    </script>
    ';
  } else {
    echo '
    <script>
      alert("Pendaftaran Gagal. Silakan coba lagi.");
    </script>
    ';
  }
}
?>

<style>
  body, html {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
  }

  body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
   
  }

  .wrapper {
    margin:3rem;
    max-width: 400px;
    width: 100%;
    padding: 20px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    text-align: center;
    position: relative;
  }

  .header {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 20px;
  }

  .logo {
    max-width: 150px;
    height: auto;
    margin-bottom: 15px;
    transition: transform 0.3s ease-in-out;
  }

  .logo:hover {
    transform: scale(1.1);
  }

  .header h1 {
    margin: 0;
    font-size: 2em;
    color: #333;
  }

  .welcome-message {
    margin-bottom: 20px;
    color: #444;
    font-size: 1em;
  }

  .form-group {
    position: relative;
    margin-bottom: 20px;
    text-align: left;
  }

  .form-group label{
    padding-left:0.7rem;
    color:silver;
  }

  .form-group i {
    position: absolute;
    top: 60%;
    left: 15px;
    transform: translateY(-50%);
    color: #aaa;
    transition: color 0.3s ease;
  }

  .form-group input {
    padding: 12px 15px 12px 45px;
    width: calc(100% - 20px);
    height: 45px;
    border: 2px solid #ccc;
    border-radius: 25px;
    outline: none;
    transition: all 0.3s ease-in-out;
    background: #f9f9f9;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .form-group input:focus {
    border-color: #6a11cb;
    background: #ffffff;
    box-shadow: 0 4px 8px rgba(106, 17, 203, 0.2);
  }

  .form-group input:hover {
    box-shadow: 0 6px 12px rgba(106, 17, 203, 0.15);
  }

  .button-group {
    margin-top: 20px;
  }

  .batal {
    padding: 12px;
    background: #2575fc;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    border-radius: 25px;
    
  }

  .batal:hover {
    background: #1a5bb8;
  }

  .kirim {
    width: 100%;
    padding: 12px;
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    color: white;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    transition: background 0.3s ease-in-out;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }

  .kirim:hover {
    background: linear-gradient(135deg, #5c0fbf, #1e65e6);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
  }

  .divider {
    height: 1px;
    width: 80%;
    margin: 15px auto;
    background: linear-gradient(90deg, transparent, #ccc, transparent);
  }

  .footer {
    margin-top: 20px;
    font-size: 0.9em;
    color: #666;
  }

  .footer a {
    color: #2575fc;
    text-decoration: none;
  }

  .footer a:hover {
    text-decoration: underline;
  }

  .social-media {
    margin-top: 15px;
  }

  .social-media a {
    margin: 0 10px;
    color: #2575fc;
    font-size: 1.2em;
    transition: color 0.3s ease;
  }

  .social-media a:hover {
    color: #1a5bb8;
  }
</style>
