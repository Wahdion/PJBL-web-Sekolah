<?php
$id = $_GET['id']; // Ambil ID dari URL

$tampil = mysqli_query($koneksi, "SELECT * FROM fasilitas WHERE id_fasilitas='$id'");

$data = mysqli_fetch_array($tampil);
?>

<div class="alert alert-light" role="alert">
    <h2 align="center">Hapus Data Fasilitas</h2>
    <form method="POST">
        <div class="form-group">
            <div class="alert alert-danger" role="alert">
                <h6>Yakin Akan Menghapus Data Fasilitas <b><?php echo htmlspecialchars($data['nama_fasilitas']); ?></b>?</h6>
            </div>
            <input type="hidden" name="id_fasilitas" value="<?php echo htmlspecialchars($id); ?>" required class="form-control">
            <input type="submit" name="hapus" class="btn btn-primary" value="Hapus">
            <a href="index.php?hal=fasilitas" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['hapus'])) {
    $id_fasilitas = $_POST['id_fasilitas'];

    $hapus = mysqli_query($koneksi, "DELETE FROM fasilitas WHERE id_fasilitas='$id_fasilitas'");

    if ($hapus) {
        echo "<script>
                alert('Berhasil Menghapus Data Fasilitas');
                window.location='index.php?hal=fasilitas'; // Menuju ke halaman buku
              </script>";
    } else {
        echo "<script>
                alert('Gagal Menghapus Data Fasilitas: " . mysqli_error($koneksi) . "');
              </script>";
    }
}
?>