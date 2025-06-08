<?php
if (isset($_FILES['gambar'])) {
    $errors = [];
    $file_name = $_FILES['gambar']['name'];
    $file_size = $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $file_type = $_FILES['gambar']['type'];
    
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $max_file_size = 5 * 1024 * 1024;

    $upload_dir = 'uploads/';
    $file_path = $upload_dir . basename($file_name);

    if (!in_array($file_extension, $allowed_extensions)) {
        $errors[] = "Ekstensi file tidak valid. Hanya file gambar yang diizinkan (jpg, jpeg, png, gif).";
    }

    if ($file_size > $max_file_size) {
        $errors[] = "Ukuran file terlalu besar. Maksimal ukuran file adalah 5MB.";
    }

    if ($_FILES['gambar']['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "Terjadi kesalahan saat mengupload file.";
    }

    if (empty($errors)) {
        $file_name_safe = preg_replace("/[^a-zA-Z0-9\._-]/", "_", $file_name);
        $file_path_safe = $upload_dir . $file_name_safe;

        if (move_uploaded_file($file_tmp, $file_path_safe)) {
            $sql = "INSERT INTO jurusan (nama_jurusan, keterangan, gambar) VALUES ('$nama_jurusan', '$keterangan', '$file_path_safe')";
            if (mysqli_query($koneksi, $sql)) {
                echo "File berhasil diunggah dan data berhasil disimpan.";
            } else {
                echo "Gagal menyimpan data ke database.";
            }
        } else {
            $errors[] = "Gagal memindahkan file ke direktori tujuan.";
        }
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
?>
