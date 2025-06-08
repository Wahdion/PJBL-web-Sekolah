<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jurusan</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Add your CSS styles here */
        .box-header {
            font-size: 24px;
            margin-bottom: 20px; 
            color: #333; 
            text-align: center; /* Teks di tengah */
        }
        .box-body {
            padding: 20px; /* Padding di dalam box */
        }
        .form-group {
            margin-bottom: 15px; /* Spasi antar form group */
        }
        .input-control {
            width: 100%; /* Lebar penuh */
            padding: 10px; /* Padding di dalam input */
            border: 1px solid #ccc; /* Garis tepi */
            border-radius: 4px; /* Sudut melengkung */
            box-sizing: border-box; /* Menghitung padding dan border dalam lebar total */
            font-size: 16px; /* Ukuran font untuk input */
        }
        .btn {
            padding: 10px 15px; /* Padding di dalam tombol */
            color: #fff; /* Warna teks putih */
            background-color: #007bff; /* Warna latar belakang biru */
            border: none; /* Tanpa border */
            border-radius: 4px; /* Sudut melengkung */
            cursor: pointer; /* Pointer saat hover */
        }
        .btn-danger {
            background-color: #dc3545; /* Merah untuk tombol hapus */
        }
        .btn-warning {
            background-color: #ffc107; /* Kuning untuk tombol edit */
        }
    </style>
</head>
<body>

<div class="content">
    <div class="container">
        <div class="box">
            <div class="box-header">
                Edit Jurusan
            </div>
            <div class="box-body">
                <?php
                // Include database connection
                include 'koneksi.php'; // Sesuaikan path sesuai kebutuhan

                if (isset($_GET['id'])) {
                    $id_jurusan = intval($_GET['id']);
                    $query = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_jurusan = $id_jurusan");
                    $data = mysqli_fetch_array($query);
                    if (!$data) {
                        echo '<div class="alert alert-error">Data jurusan tidak ditemukan.</div>';
                    } else {
                        // Process the form submission
                        if (isset($_POST['submit'])) {
                            $nama_jurusan = addslashes(ucwords(trim($_POST['nama_jurusan'])));
                            $keterangan = addslashes(trim($_POST['keterangan']));
                            
                            // Handle image upload
                            $gambar = $_FILES['gambar']['name'];
                            if ($gambar) {
                                $tmpname = $_FILES['gambar']['tmp_name'];
                                $filesize = $_FILES['gambar']['size'];
                                $formatfile = pathinfo($gambar, PATHINFO_EXTENSION);
                                $rename = 'jurusan' . time() . '.' . $formatfile;

                                // Allowed file types
                                $allowedtype = array('png', 'jpg', 'jpeg', 'gif');

                                // Validate file type and size
                                if (!in_array($formatfile, $allowedtype)) {
                                    echo '<div class="alert alert-error">Format file tidak diizinkan.</div>';
                                } elseif ($filesize > 1000000) {
                                    echo '<div class="alert alert-error">Ukuran file tidak boleh lebih dari 1 MB.</div>';
                                } else {
                                    // Move uploaded file
                                    if (move_uploaded_file($tmpname, "../uploads/jurusan1/" . $rename)) {
                                        // Update the database
                                        $update = mysqli_query($koneksi, "UPDATE jurusan SET nama_jurusan='$nama_jurusan', keterangan='$keterangan', gambar='$rename' WHERE id_jurusan='$id_jurusan'");
                                    }
                                }
                            } else {
                                // Update the database without changing the image
                                $update = mysqli_query($koneksi, "UPDATE jurusan SET nama_jurusan='$nama_jurusan', keterangan='$keterangan' WHERE id_jurusan='$id_jurusan'");
                            }

                            if ($update) {
                                echo '<div class="alert alert-success">Update Berhasil</div>';
                            } else {
                                echo '<div class="alert alert-error">Gagal mengupdate: ' . mysqli_error($koneksi) . '</div>';
                            }
                        }
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Jurusan</label>
                        <input type="text" name="nama_jurusan" class="input-control" value="<?php echo htmlspecialchars($data['nama_jurusan']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="keterangan" class="input-control" required><?php echo htmlspecialchars($data['keterangan']); ?></textarea>
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
                    <div>
                        <button type="button" class="btn" onclick="window.location='index.php?hal=jurusan'">Kembali</button>
                        <input type="submit" name="submit" value="Update" class="btn">
                    </div>
                </form>
                <?php
                    }
                } else {
                    echo '<div class="alert alert-error">ID jurusan tidak ditemukan.</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>
