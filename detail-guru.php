<?php include 'header.php'; 

$koneksi = mysqli_connect('localhost', 'root', '', 'sekolah2') or die ('Gagal terhubung ke database');
?>  

<div class="section">
    <div class="container2">

        <?php
            $guru = mysqli_query($koneksi, "SELECT * FROM guru WHERE id_guru= '".$_GET['id_guru']."' ");

            if(mysqli_num_rows($guru) == 0){
                echo "<script>window.location='guru.php'</script>";
            }

            $p = mysqli_fetch_object($guru);
        ?>
        <div class="profile-card animate-fade">
            <h3 class="text-center"><?= htmlspecialchars($p->nama_guru) ?></h3>
            <img src="uploads/guru/<?= htmlspecialchars($p->gambar) ?>" class="img-fluid animate-zoom">
            <div class="profile-details">
                <h4>Tentang Saya</h4>
                <p>Hai! Saya <?= htmlspecialchars($p->nama_guru) ?>, seorang guru yang penuh semangat dalam berbagi pengetahuan. Saya percaya dalam menciptakan lingkungan belajar yang positif bagi semua murid saya.</p>
            </div>
        </div>

        <div class="keterangan animate-slide-up">
            <h4>Detail Guru</h4>
        </div>

        <div class="description">
            <div class="keterangan2 animate-slide-up">
                <h4>Alamat: <?= htmlspecialchars($p->alamat) ?></h4>
            </div>
            <div class="keterangan2 animate-slide-up">
                <h4>Tanggal Lahir: <?= htmlspecialchars($p->tgl_lahir) ?></h4>
            </div>
            <div class="keterangan2 animate-slide-up">
                <h4>Nomor Telepon: <?= htmlspecialchars($p->tlpn) ?></h4>
            </div>
            <div class="keterangan2 animate-slide-up">
                <h4>Mata Pelajaran Yang Diajarkan:</h4>
                <ul>
                    <?php
                    $mapel = mysqli_query($koneksi, "
                        SELECT nama_mapel 
                        FROM mapel 
                        WHERE id_jurusan = '".$p->id_jurusan."'"
                    );

                    if (mysqli_num_rows($mapel) > 0) {
                        while ($m = mysqli_fetch_object($mapel)) {
                            echo "<li>{$m->nama_mapel}</li>";
                        }
                    } else {
                        echo "<li>Data Mata Pelajaran Tidak Tersedia</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>


        <div class="social-media-links animate-slide-up">
    <h4>Ikuti Saya</h4>
    <div class="social-icons">
        <a href="https://www.instagram.com/smkn1.sukawati/login/">
            <i data-feather="instagram" class="social-icon"></i>
        </a>
    </div>
</div>


        <div class="link">
            <a href="guru.php" class="cta-button">Kembali</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<style>
    .section {
        padding: 60px 0;
        background-color: #f9f9f9;
    }

    .container2 {
        max-width: 900px;
        margin: 0 auto;
        padding: 40px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    .profile-card {
        text-align: center;
        background-color: #f0f8ff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        margin-bottom: 40px;
    }

    .profile-details {
        margin-top: 20px;
        font-size: 1.2rem;
        color: #555;
    }

    .keterangan h4, .testimonials h4, .social-media-links h4 {
        font-size: 1.8rem;
        color: #007bff;
        padding-top: 2rem;
    }

    .keterangan2 h4 {
        padding-top:1rem;
        margin-bottom: 15px;
        font-size: 1.2rem;
        color: #333;
    }

    .description ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
        color: #555;
        font-size: 1.1rem;
    }

    .testimonials .testimonial {
        background-color: #f9f9f9;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 10px;
        font-style: italic;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
    }

    .social-icon {
        font-size: 1.5rem;
        color: #333;
        transition: color 0.3s ease;
    }

    .social-icon:hover {
        color: #007bff;
    }

    .link {
        margin-top: 40px;
        text-align: center;
    }

    .cta-button {
        padding: 12px 25px;
        background-color: #007bff;
        border-radius: 8px;
        color: white;
        font-weight: bold;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.3s;
    }

    .cta-button:hover {
        background-color: #444;
        transform: scale(1.05);
    }

    @keyframes fade-in {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slide-up {
        from { transform: translateY(20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    @keyframes zoom-in {
        from { transform: scale(0.9); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }

    .animate-fade {
        animation: fade-in 1s ease-in-out forwards;
    }

    .animate-slide-up {
        animation: slide-up 1s ease-in-out forwards;
    }

    .animate-zoom {
        animation: zoom-in 1s ease-in-out forwards;
    }

    .social-icons {
    display: flex;
    justify-content: flex-start; /* Mengubah dari center menjadi left */
    gap: 20px;
    margin-top: 20px;
}

.social-icon {
    font-size: 1.5rem;
    color: #333;
    transition: color 0.3s ease;
}

.social-icon:hover {
    color: #007bff;
}

</style>
