<?php
$id_guru = $_GET['id'];
$tampil = mysqli_query($koneksi, "SELECT * FROM guru WHERE id_guru ='$id_guru'");
$data = mysqli_fetch_array($tampil);
?>

<div class="alert alert-light" role="alert">
    <h2 align="center">Hapus Data Guru</h2>
    <form method="POST">
        <div class="form-group">
            <div class="alert alert-danger" role="alert">
                <h6>Yakin Akan Menghapus Data Guru <b><?php echo htmlspecialchars($data['nama_guru']); ?></b> ?</h6>
                <input type="hidden" name="id_guru" value="<?php echo htmlspecialchars($id_guru); ?>" required class="form-control">
                <input type="submit" name="hapus" class="btn btn-primary" value="Hapus">
                <a href="index.php?hal=guru" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </form>
</div>

<?php
if (isset($_POST['hapus'])) { // Process to delete teacher data
    $id_guru = $_POST['id_guru'];

    // Get the file path of the image from the database
    $result = mysqli_query($koneksi, "SELECT gambar FROM guru WHERE id_guru='$id_guru'");
    $data = mysqli_fetch_array($result);

    if ($data['gambar']) {
        // Set the file path and delete the image file if it exists
        $file_path = "../uploads/" . $data['gambar'];
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }

    // Delete the record from the database
    $hapus = mysqli_query($koneksi, "DELETE FROM guru WHERE id_guru='$id_guru'");
    if ($hapus) {
        echo '
        <script>
        alert("Berhasil Menghapus Data Guru");
        window.location="index.php?hal=guru"; // Redirect to the guru page
        </script>
        ';
    } else {
        echo '<script>alert("Gagal Menghapus Data Guru");</script>';
    }
}
?>
