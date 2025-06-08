
<div class="alert alert-light" role="alert">
<h2 align="center"> Tambah Data Admin</h2>
<form method="POST">
<div class="form-group">
<label for="exampleInputEmail1">Nama Admin</label>
<input type="text" name="nama_admin" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Penerbit">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Email</label>
<input type="email" name="email" required class="form-control" id="exampleInputPassword1" placeholder="masukan email"> </div>

<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input type="text" name="password" required class="form-control" id="exampleInputPassword1" placeholder="masukan password"> </div>

<div class="form-group">
<label for="exampleInputPassword1">Tanggal Lahir</label>
<input type="date" name="tgl_lahir" required class="form-control" id="exampleInputPassword1" placeholder="masukan tanggal lahir"> </div>

<input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
<a href="index.php?hal-admin" class="btn btn-secondary">Batal</a>
</form>
</div>

<?php
if(isset($_POST['simpan'])){ //proses simpan data penerbit
$nama_admin = $_POST['nama_admin'];
$email = $_POST['email'];
$password = MD5($_POST['password']);
$tgl_lahir = $_POST['tgl_lahir'];


$simpan = mysqli_query($koneksi, 'INSERT INTO admin (nama_admin,email,password,tgl_lahir) VALUES ("'.$nama_admin.'","'.$email.'","'.$password.'","'.$tgl_lahir.'")');
if($simpan){
    echo'

<script>
alert("Berhasil Menambah Data Admin");
window.location="index.php?hal-admin"; //menuju ke halaman admin
</script>
';
}
}
?>