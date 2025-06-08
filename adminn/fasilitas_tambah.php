<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Fasilitas</title>
    <link rel="stylesheet" href="styles.css"> <!-- Optional CSS file -->
</head>
<body>

<div class="content">
    <div class="container">
        <div class="box">
            <div class="box-header">
                Tambah Fasilitas
            </div>
            <div class="box-body">
                <form action="" method="POST" enctype="multipart/form-data">
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
                        <label>Fasilitas</label>
                        <input type="text" name="nama_fasilitas" placeholder="Fasilitas" class="input-control" required>
                    </div>


                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="input-control" required>
                    </div>

                    <button type="button" class="btn" onclick="window.location='index.php?hal=fasilitas'">Kembali</button>
                    <input type="submit" name="submit" value="Simpan" class="btn btn-blue">
                </form>

                <?php
                // Include database connection
                include 'koneksi.php'; // Adjust the path as needed

                if (isset($_POST['submit'])) {
                    // Sanitize inputs
                    $id_jurusan = addslashes(ucwords(trim($_POST['id_jurusan'])));
                    $nama_fasilitas = addslashes(trim($_POST['nama_fasilitas']));

                    $filename = $_FILES['gambar']['name'];
                    $tmpname = $_FILES['gambar']['tmp_name'];
                    $filesize = $_FILES['gambar']['size'];
                    $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                    $rename = 'fasilitas' . time() . '.' . $formatfile;

                    // Allowed file types
                    $allowedtype = array('png', 'jpg', 'jpeg', 'gif');

                    // Validate file type and size
                    if (!in_array($formatfile, $allowedtype)) {
                        echo '<div class="alert alert-error">Format file tidak diizinkan.</div>';
                    } elseif ($filesize > 2000000) {
                        echo '<div class="alert alert-error">Ukuran file tidak boleh lebih dari 1 MB.</div>';
                    } else {
                        // Move uploaded file
                        if (move_uploaded_file($tmpname, "../uploads/jurusan1/" . $rename)) {
                            // Insert into database
                            $simpan = mysqli_query($koneksi, "INSERT INTO fasilitas (id_jurusan, nama_fasilitas, gambar) VALUES (
                                '$id_jurusan',
                                '$nama_fasilitas',
                                '$rename'
                            )");

                            if ($simpan) {
                                echo '<div class="alert alert-success">Simpan Berhasil</div>';
                                // Optionally redirect or reset the form here
                                // header("Location: jurusan.php"); // Uncomment to redirect
                            } else {
                                echo '<div class="alert alert-error">Gagal simpan: ' . mysqli_error($koneksi) . '</div>';
                            }
                        } else {
                            echo '<div class="alert alert-error">Gagal mengupload gambar.</div>';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<style>
   .box-header {
            font-size: 24px; /* Ukuran font untuk header */
            margin-bottom: 20px; /* Spasi bawah */
            color: #333; /* Warna font */
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

        .button-group {
            display: flex; /* Menggunakan flexbox untuk mengatur tombol */
            justify-content: space-between; /* Jarak antara tombol */
        }

        .btn {
            display: inline-block; /* Memastikan tombol berada dalam baris yang sama */
            padding: 10px 15px; /* Padding di dalam tombol */
            color: #fff; /* Warna teks putih */
            background-color: #007bff; /* Warna latar belakang biru */
            border: none; /* Tanpa border */
            border-radius: 4px; /* Sudut melengkung */
            text-decoration: none; /* Tanpa garis bawah */
            cursor: pointer; /* Pointer saat hover */
            transition: background-color 0.3s ease; /* Efek transisi saat hover */
            font-size: 16px; /* Ukuran font tombol */
        }

        .btn:hover {
            background-color: #0056b3; /* Warna latar belakang saat hover */
        }

        .alert {
            padding: 10px; /* Padding di dalam alert */
            margin-bottom: 15px; /* Spasi bawah alert */
            border-radius: 4px; /* Sudut melengkung */
        }

        .alert-success {
            background-color: #d4edda; /* Warna latar belakang sukses */
            color: #155724; /* Warna teks sukses */
        }

        .alert-error {
            background-color: #f8d7da; /* Warna latar belakang error */
            color: #721c24; /* Warna teks error */
        }
    
</style>
