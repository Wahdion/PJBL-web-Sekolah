<?php include 'header.php'; ?>
<?php include 'koneksi.php'; ?>

<div class="section">
    <div class="container">
        <div class="wrapper">
            <h3 class="text-center">Pesan</h3>
            
            <div class="contact-info">
                <div class="col-md-4">
                    <img src="gambar_home/sekolah1.jpg">
                </div>
            </div>
        
            <div class="alert alert-light" role="alert">
                <div class="judul">
                    <h2>Masukan Pesan Anda</h2>
                </div>
                <form method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama:</label>
                        <input type="text" name="nama_user" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama anda">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Pesan:</label>
                        <input type="text" name="pesan" required class="form-control" id="exampleInputPassword1" placeholder="Pesan anda">
                    </div>
                    <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                    <a href="kontak.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>

            <?php
            if (isset($_POST['simpan'])) {
                $nama_user = $_POST['nama_user'];
                $pesan = $_POST['pesan'];

                $simpan = mysqli_query($koneksi, 'INSERT INTO mesagge (nama_user, pesan) VALUES ("' . $nama_user . '", "' . $pesan . '")');
                if ($simpan) {
                    echo '
                    <script>
                        alert("Pesan Anda Sudah Terkirim");
                        window.location="kontak.php"; //menuju ke halaman admin
                    </script>
                    ';
                }
            }
            ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<style>
    .section {
        padding: 40px 0;
        background-color: #f9f9f9; 
    }

    .wrapper {
        max-width: 800px; 
        margin: 0 auto; 
        padding: 20px;
        background-color: white; 
        border-radius: 8px; 
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3); 
    }

    .contact-info img {
        padding-top: 1rem;
        width: 725px;
    }

    .judul h2, h3{
        font-family:sans-serif;
        font-size:1.2 rem;
        font-weight:600;
        text-align:center;
        color:black;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        padding: 12px 15px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        width: 100%;
        transition: all 0.3s ease-in-out;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        outline: none;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
        display: inline-block;
        color:black;
    }

    .btn {
        padding: 12px 20px;
        font-size: 16px;
        border-radius: 5px;
        text-transform: uppercase;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #565e64;
        transform: scale(1.05);
    }

    input[type="text"] {
        border: 1px solid #ccc;
        transition: all 0.3s ease;
    }

    input[type="text"]:hover, input[type="text"]:focus {
        border-color: #007bff;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.25);
    }

    .form-group:hover {
        background: silver;
        padding: 1rem;
        border-radius: 5px;
        transition: background 0.3s ease;
    }
</style>
