
<?php

$id = $_GET['id'];
$tampil = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_jurusan='$id'");
$data = mysqli_fetch_array($tampil);
?>

<div class="alert alert-light" role="alert">
<h2 align="center">Hapus Data Jurusan</h2>
<form method="POST">
<div class="form-group">
<div class="alert alert-danger" role="alert">
<h6>Yakin Akan Menghapus Data Jurusan <b><?php echo $data['nama_jurusan'] ?></b> ?</h6>
<input type="hidden" name="id_jurusan" value="<?php echo $id ?>" required class="form-control"> <input type="submit" name="hapus" class="btn btn-primary" value="Hapus">
<a href="index.php?hal=jurusan" class="btn btn-secondary">Batal</a>
</div>
</div>
</form>
</div>

<?php

if(isset($_POST['hapus'])){ //proses hapus data penerbit
 $id_jurusan = $_POST['id_jurusan'];

$ubah = mysqli_query($koneksi, 'DELETE FROM jurusan WHERE id_jurusan="'.$id_jurusan. '"');
if ($ubah){
echo '
<script>
alert("Berhasil Menghapus Data Jurusan");
window.location="index.php?hal=jurusan"; //menuju ke halaman penerbit
</script>

';
}
}
?>