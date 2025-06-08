
<?php

$id = $_GET['id'];
$tampil = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin ='$id'");
$data = mysqli_fetch_array($tampil);
?>

<div class="alert alert-light" role="alert">
<h2 align="center">Hapus Data Admin</h2>
<form method="POST">
<div class="form-group">
<div class="alert alert-danger" role="alert">
<h6>Yakin Akan Menghapus Data Admin <b><?php echo $data['nama_admin'] ?></b> ?</h6>
<input type="text" name="id_admin" value="<?php echo $id ?>" required class="form-control"> 
<input type="submit" name="hapus" class="btn btn-primary" value="Hapus">
<a href="index.php?hal=admin" class="btn btn-secondary">Batal</a>
</div>
</div>
</form>
</div>

<?php

if(isset($_POST['hapus'])){ //proses hapus data penerbit
 $id_admin = $_POST['id_admin'];



$ubah = mysqli_query($koneksi, 'DELETE FROM admin WHERE id_admin="'.$id_admin.'"');
if ($ubah){
echo '
<script>
alert("Berhasil Menghapus Data Admin");
window.location="index.php?hal=admin"; 
</script>

';
}
}
?>