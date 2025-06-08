<?php
$id = $_GET['id']; // Ambil ID dari URL

// Query untuk mendapatkan data mapel berdasarkan ID
$tampil_mapel = mysqli_query($koneksi, "SELECT * FROM mapel WHERE id_mapel = '$id'");
$data_mapel = mysqli_fetch_array($tampil_mapel);
?>

<div class="alert alert-light" role="alert">
    <h2 align="center">Ubah Data Mapel</h2>

    <form method="POST">
        <input type="hidden" name="id_mapel" value="<?php echo $data_mapel['id_mapel']; ?>" required>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Jurusan</label>
            <select name="id_jurusan" class="form-control" id="exampleFormControlSelect1">
                <?php
                $tampil_jurusan = mysqli_query($koneksi, "SELECT * FROM jurusan");
                while ($data_jurusan = mysqli_fetch_array($tampil_jurusan)) {
                    // Tambahkan 'selected' jika id_jurusan saat ini sama dengan yang ada di data mapel
                    $selected = ($data_mapel['id_jurusan'] == $data_jurusan['id_jurusan']) ? 'selected' : '';
                    echo "<option value='{$data_jurusan['id_jurusan']}' $selected>{$data_jurusan['nama_jurusan']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="nama_mapel">Mapel</label>
            <input type="text" name="nama_mapel" value="<?php echo htmlspecialchars($data_mapel['nama_mapel']); ?>" required class="form-control" id="nama_mapel" placeholder="Mapel">
        </div>

        <input type="submit" name="ubah" class="btn btn-primary" value="Simpan Perubahan">
        <a href="index.php?hal=mapel" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php
if (isset($_POST['ubah'])) { // Proses simpan perubahan data mapel
    $id_mapel = $_POST['id_mapel'];
    $id_jurusan = $_POST['id_jurusan'];
    $nama_mapel = $_POST['nama_mapel'];

    // Update query dengan koma setelah id_jurusan
    $query = "UPDATE mapel SET id_jurusan = '$id_jurusan', nama_mapel = '$nama_mapel' WHERE id_mapel = '$id_mapel'";
    $ubah = mysqli_query($koneksi, $query);

    if ($ubah) {
        echo "<script>
            alert('Berhasil Mengubah Data Mapel');
            window.location = 'index.php?hal=mapel'; // Menuju ke halaman mapel
        </script>";
    } else {
        echo "<script>
            alert('Gagal Mengubah Data Mapel: " . mysqli_error($koneksi) . "');
        </script>";
    }
}
?>
