<?php
$id = $_GET['id'];
$tampil = mysqli_query($koneksi, "SELECT * FROM fasilitas WHERE id_fasilitas = '$id'");
$data = mysqli_fetch_array($tampil);
?>

<div class="alert alert-light" role="alert">
    <h2 align="center">Ubah Data Fasilitas</h2>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Jurusan</label>
            <select name="id_jurusan" class="form-control" id="exampleFormControlSelect1">
                <?php
                $stampil = mysqli_query($koneksi, "SELECT * FROM jurusan");
                while ($data2 = mysqli_fetch_array($stampil)) {
                    $selected = ($data['id_jurusan'] == $data2['id_jurusan']) ? "selected" : "";
                    echo "<option $selected value='" . $data2['id_jurusan'] . "'>" . htmlspecialchars($data2['nama_jurusan']) . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <input type="hidden" name="id_fasilitas" value="<?php echo htmlspecialchars($id); ?>" required>
            <label for="exampleInputEmail1">Fasilitas</label>
            <input type="text" name="nama_fasilitas" value="<?php echo htmlspecialchars($data['nama_fasilitas']); ?>" required class="form-control" placeholder="Fasilitas">
        </div>

        <div class="form-group">
            <label>Gambar</label>
            <input type="file" name="gambar" class="input-control">
            <?php if (!empty($data['gambar'])): ?>
                <p>Gambar saat ini:</p>
                <img src="../uploads/jurusan1/<?php echo $data['gambar']; ?>" alt="Gambar Jurusan" style="width: 100px; height: auto;">
            <?php else: ?>
                <p>Tidak Ada Gambar</p>
            <?php endif; ?>
        </div>

        <input type="submit" name="ubah" class="btn btn-primary" value="Simpan Perubahan">
        <a href="index.php?hal=fasilitas" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php
if (isset($_POST['ubah'])) { 
    $id_fasilitas = $_POST['id_fasilitas'];
    $id_jurusan = $_POST['id_jurusan'];
    $nama_fasilitas = $_POST['nama_fasilitas'];
    $gambar_lama = $_POST['gambar_lama'];

    if ($_FILES['gambar']['name']) {
        $gambar_nama = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $formatfile = pathinfo($gambar_nama, PATHINFO_EXTENSION);
        $rename = 'fasilitas_' . time() . '.' . $formatfile;
        $target_dir = "../uploads/jurusan1/" . $rename;

        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($formatfile, $allowed_types)) {
            if (move_uploaded_file($gambar_tmp, $target_dir)) {
                if ($gambar_lama && file_exists("../uploads/jurusan1/" . $gambar_lama)) {
                    unlink("../uploads/jurusan1/" . $gambar_lama);
                }
                $gambar_path = $rename;
            } else {
                echo "<script>alert('Gagal mengupload gambar baru');</script>";
                $gambar_path = $gambar_lama;
            }
        } else {
            echo "<script>alert('Format gambar tidak diizinkan');</script>";
            $gambar_path = $gambar_lama;
        }
    } else {
        $gambar_path = $gambar_lama;
    }

    $query = "UPDATE fasilitas SET 
                id_jurusan = '$id_jurusan', 
                nama_fasilitas = '$nama_fasilitas', 
                gambar = '$gambar_path' 
              WHERE id_fasilitas = '$id_fasilitas'";
    $ubah = mysqli_query($koneksi, $query);

    if ($ubah) {
        echo "<script>
            alert('Berhasil Mengubah Data Fasilitas');
            window.location = 'index.php?hal=fasilitas';
        </script>";
    } else {
        echo "<script>
            alert('Gagal Mengubah Data Fasilitas: " . mysqli_error($koneksi) . "');
        </script>";
    }
}
?>

<style>
    .box-header {
        font-size: 24px;
        margin-bottom: 20px; 
        color: #333; 
        text-align: center;
    }
    .box-body {
        padding: 20px; 
    }
    .form-group {
        margin-bottom: 15px; 
    }
    .input-control {
        width: 100%; 
        padding: 10px; 
        border: 1px solid #ccc; 
        border-radius: 4px; 
        box-sizing: border-box; 
        font-size: 16px; 
    }
    .btn {
        padding: 10px 15px; 
        color: #fff; 
        background-color: #007bff; 
        border: none; 
        border-radius: 4px; 
        cursor: pointer; 
    }
    .btn-danger {
        background-color: #dc3545; 
    }
    .btn-warning {
        background-color: #ffc107; 
    }
</style>
