<?php
$id = $_GET['id']; // Ambil ID dari URL

$tampil = mysqli_query($koneksi, "SELECT * FROM mapel WHERE id_mapel='$id'");
$data = mysqli_fetch_array($tampil);
?>

<div class="alert alert-light" role="alert">
    <h2 align="center">Hapus Data Mapel</h2>
    <form method="POST">
        <div class="form-group">
            <div class="alert alert-danger" role="alert">
                <h6>Yakin Akan Menghapus Data Mapel <b><?php echo htmlspecialchars($data['nama_mapel']); ?></b>?</h6>
            </div>
            <input type="hidden" name="id_mapel" value="<?php echo htmlspecialchars($id); ?>" required class="form-control">
            <input type="submit" name="hapus" class="btn btn-primary" value="Hapus">
            <a href="index.php?hal=mapel" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['hapus'])) {
    $id_mapel = $_POST['id_mapel']; // Corrected variable name

    // Perform delete query
    $hapus = mysqli_query($koneksi, "DELETE FROM mapel WHERE id_mapel='$id_mapel'");

    if ($hapus) {
        echo "<script>
                alert('Berhasil Menghapus Data Mapel');
                window.location='index.php?hal=mapel'; // Menuju ke halaman mapel
              </script>";
    } else {
        echo "<script>
                alert('Gagal Menghapus Data Mapel: " . mysqli_error($koneksi) . "');
              </script>";
    }
}
?>
