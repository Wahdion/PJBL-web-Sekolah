
<?php include 'header.php'; ?>

<div class="section">
    <div class="container">
        <h3 class="text-center">Guru Jurusan</h3>

        <div class="row">
            <?php
              
                $koneksi = mysqli_connect("localhost", "root", "", "sekolah2");

                
                $guru = mysqli_query($koneksi, "SELECT guru.*, jurusan.nama_jurusan FROM guru 
                                                LEFT JOIN jurusan ON guru.id_jurusan = jurusan.id_jurusan
                                                ORDER BY guru.id_guru DESC");

                if (mysqli_num_rows($guru) > 0) {
                    while ($j = mysqli_fetch_array($guru)) {
            ?>
                <div class="col-md-4 col-sm-6 mb-4">
                    <a href="detail-guru.php?id_guru=<?= $j['id_guru'] ?>" class="thumbnail-link">
                        <div class="thumbnail-box">
                            <div class="thumbnail-img" style="background-image: url('uploads/guru/<?= htmlspecialchars($j['gambar']) ?>');">
                            </div>
                            <div class="thumbnail-text text-center">
                                <h5><?= htmlspecialchars($j['nama_guru']) ?></h5>
                            </div>
                            <div class="thumbnail-text text-center">
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

    /* Thumbnail Styling */
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
