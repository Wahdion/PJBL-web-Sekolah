<div class="alert alert-light" role="alert">
    <h2 align="center">Tambah Data Mapel</h2>
    <form method="POST">

    <div class="form-group">
            <label for="exampleFormControlSelect1">Jurusan</label>
            <select name="id_jurusan" class="form-control" id="exampleFormControlSelect1">
                <?php
                $tampil = mysqli_query($koneksi, "SELECT * FROM jurusan");
                while ($data = mysqli_fetch_array($tampil)) {
                ?>
                    <option value="<?php echo $data['id_jurusan']; ?>"><?php echo $data['nama_jurusan']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Mapel</label>
            <input type="text" name="nama_mapel" required class="form-control" id="exampleInputPassword1" placeholder="Mapel">
        </div>

       

        <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
        <a href="index.php?hal=mapel" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php
if (isset($_POST['simpan'])) { // Proses simpan data mapel
    $id_jurusan = $_POST['id_jurusan'];
    $nama_mapel = $_POST['nama_mapel'];


    // Periksa koneksi sebelum query
    if ($koneksi) {
        $simpan = mysqli_query($koneksi, "INSERT INTO mapel (id_jurusan, nama_mapel) VALUES ('$id_jurusan', '$nama_mapel')");
        
        if ($simpan) {
            echo '
            <script>
                alert("Berhasil Menambah Data Mapel");
                window.location="index.php?hal=mapel"; // Menuju ke halaman mapel
            </script>
            ';
        } else {
            echo "Kesalahan: " . mysqli_error($koneksi); 
        }
    } else {
        echo "Koneksi ke database gagal.";
    }
}
?>


