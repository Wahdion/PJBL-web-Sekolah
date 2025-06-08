<?php
$id = $_GET['id']; // Ambil ID dari URL

$tampil = mysqli_query($koneksi, "SELECT * FROM mesagge WHERE id_user='$id'");
$data = mysqli_fetch_array($tampil);
?>

<div class="alert alert-light" role="alert">
    <h2 align="center">Hapus Data Pesan</h2>
    <form method="POST">
        <div class="form-group">
            <div class="alert alert-danger" role="alert">
                <h6>Yakin Akan Menghapus Pesan Ini? <b><?php echo htmlspecialchars($data['nama_user']); ?></b>?</h6>
            </div>
            <input type="hidden" name="id_user" value="<?php echo htmlspecialchars($id); ?>" required class="form-control">
            <input type="submit" name="hapus" class="btn btn-primary" value="Hapus">
            <a href="index.php?hal=mesagge" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['hapus'])) {
    $id_user = $_POST['id_user']; // Corrected variable name

    // Perform delete query
    $hapus = mysqli_query($koneksi, "DELETE FROM mesagge WHERE id_user='$id_user'");

    if ($hapus) {
        echo "<script>
                alert('Berhasil Menghapus Pesan');
                window.location='index.php?hal=mesagge'; // Menuju ke halaman mesagge
              </script>";
    } else {
        echo "<script>
                alert('Gagal Menghapus Pesan: " . mysqli_error($koneksi) . "');
              </script>";
    }
}
?>
