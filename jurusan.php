<?php include 'header.php'; ?>

<div class="section">
    <div class="container1">
        <h3 class="text-center">Jurusan</h3>

        <div class="row">
            <?php
                // Koneksi ke database
                $koneksi = mysqli_connect("localhost", "root", "", "sekolah2");

                // Menjalankan query untuk mendapatkan data jurusan
                $jurusan = mysqli_query($koneksi, "SELECT * FROM jurusan ORDER BY id_jurusan DESC");

                if (mysqli_num_rows($jurusan) > 0) {
                    while ($j = mysqli_fetch_array($jurusan)) {
            ?>
                <div class="col-md-4 col-sm-6 mb-4 animate-fade">
                    <a href="detail-jurusan.php?id_jurusan=<?= $j['id_jurusan'] ?>" class="thumbnail-link">
                        <div class="thumbnail-box">
                            <div class="thumbnail-img" style="background-image: url('uploads/jurusan1/<?= htmlspecialchars($j['gambar']) ?>');">
                            </div>
                            <div class="keterangan thumbnail-text text-center">
                                <h5><?= htmlspecialchars($j['nama_jurusan']) ?></h5>
                            </div>
                        </div>
                    </a>
                </div>
            <?php 
                    } 
                } else { 
            ?>
                <div class="col-12 text-center">
                    <p>Tidak ada data</p>
                </div>
            <?php 
                } 
                mysqli_close($koneksi); 
            ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<style>
   
    .section {
        padding: 60px 0;
        background: linear-gradient(135deg, #f4f4f4, #e9ecef);
    }

    .container1 {
        max-width: 1200px;
        margin: auto;
    }

    h3 {
        margin-bottom: 30px;
        font-size: 35px;
        color: #333;
        position: relative;
        animation: fade-in 1s ease-in-out;
    }

  
    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

   
    .thumbnail-link {
        text-decoration: none;
        color: inherit;
    }

    .thumbnail-box {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        background: #fff;
    }

    .thumbnail-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .thumbnail-img {
        height: 200px;
        background-size: cover;
        background-position: center;
        transition: transform 0.3s;
    }

    .thumbnail-box:hover .thumbnail-img {
        transform: scale(1.1);
    }

    .thumbnail-text {
        padding: 15px;
        background-color: #fff;
    }

    .thumbnail-text h5 {
        margin: 0;
        font-size: 18px;
        color: #333;
    }

    /* Menu Styling */
    nav {
        background-color: #333;
        padding: 10px 0;
    }

    nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
    }

    nav ul li {
        margin: 0 15px;
    }

    nav ul li a {
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    nav ul li a:hover {
        background-color: #555;
        color: #f4f4f4;
    }

    /* Animasi */
    @keyframes fade-in {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade {
        opacity: 0;
        animation: fade-in 0.8s ease-in-out forwards;
    }

    /* Responsive styling */
    @media (max-width: 768px) {
        .col-md-4 {
            max-width: 100%;
        }

        nav ul {
            flex-direction: column;
            align-items: center;
        }

        nav ul li {
            margin: 10px 0;
        }
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }

    .text-center {
        text-align: center;
    }
</style>
