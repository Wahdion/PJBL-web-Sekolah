<?php include 'header.php'; 

$koneksi = mysqli_connect('localhost', 'root', '', 'sekolah2') or die ('Gagal terhubung ke database');


if (isset($_GET['id_jurusan'])) {
    $id_jurusan = $_GET['id_jurusan'];


    $jurusan = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_jurusan = '$id_jurusan'");

    
    if (mysqli_num_rows($jurusan) > 0) {
        $p = mysqli_fetch_object($jurusan);
    } else {
      
        echo "<script>window.location='jurusan.php'</script>";
        exit; 
    }
} else {
  
    echo "<script>window.location='jurusan.php'</script>";
    exit;
}

?>  

<div class="section">
    <div class="container2">
        
        <h3 class="text-center animate-fade"><?= htmlspecialchars($p->nama_jurusan) ?></h3>
        <img src="uploads/jurusan1/<?= htmlspecialchars($p->gambar) ?>" class="img-fluid animate-zoom">
        
        <div class="rating">
            <p>Rating Program: 8.5/10</p>
            <div class="progress-bar">
                <div class="progress" style="width: 90%;"></div>
            </div>
        </div>

        <div class="keterangan">
            <h4>Mengenai Jurusan Ini!</h4>
        </div>
        
        <div class="keterangan5 animate-fade-in animate-slide-up">
            <?= nl2br(htmlspecialchars($p->keterangan)) ?>
        </div>


        <!--Memanggil query fasilitas-->

        <div class="keterangan">
            <h4>Fasilitas Yang Ada di Jurusan Ini!</h4>
        </div>
        <div class="keterangan4 animate-fade-in animate-slide-up">
        <?php
                    $fasilitas = mysqli_query($koneksi, "
                        SELECT nama_fasilitas 
                        FROM fasilitas 
                        WHERE id_jurusan = '".$p->id_jurusan."'"
                    );

                    

                    if (mysqli_num_rows($fasilitas) > 0) {
                        while ($p = mysqli_fetch_object($fasilitas)) {
                            echo "<li>{$p->nama_fasilitas}</li>";
                        }
                    } else {
                        echo "<li>Data Mata Pelajaran Tidak Tersedia</li>";
                    }
                    ?> 
                    </div> 
        <!----------------------->

       
            <div class="keterangan2">
            <h4>Program Terkait</h4>
                </div>
            <div class="related-cards">
                <?php
                 
                    $related = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_jurusan != '".$id_jurusan."' LIMIT 3");
                    while ($rel = mysqli_fetch_object($related)) {
                ?>
                <div class="related-card">
                    <img src="uploads/jurusan1/<?= htmlspecialchars($rel->gambar) ?>" alt="<?= htmlspecialchars($rel->nama_jurusan) ?>">
                    <h5><?= htmlspecialchars($rel->nama_jurusan) ?></h5>
                    <a href="detail-jurusan.php?id_jurusan=<?= $rel->id_jurusan ?>">Lihat Detail</a>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="link animate-slide-up">
            <a href="jurusan.php" class="cta-button">Kembali</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<style>

    .section {
        padding: 40px 0;
        background: linear-gradient(135deg, #f2f2f2, #e9ecef);
    }

    .breadcrumb {
        margin-bottom: 20px;
        font-size: 0.9rem;
        color: #555;
    }

    .breadcrumb a {
        text-decoration: none;
        color: #007bff;
    }

    .breadcrumb a:hover {
        text-decoration: underline;
    }

    .container2 {
        max-width: 800px;
        margin: 0 auto;
        padding: 30px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .text-center {
        font-weight: bold;
        font-size: 2rem;
        color: #333;
        margin-bottom: 20px;
  }

  .keterangan h4 {
        margin-bottom: 15px;
        font-size: 1.8rem;
        color: #007bff;
        padding-top: 2rem;
        font-weight: bold;
        
    }
    
    
  .keterangan2 h4 {
        margin-bottom: 15px;
        font-size: 1.8rem;
        color: #007bff;
        padding-top: 2rem;
        font-weight: bold;
        text-align:center;
        margin:2rem;
    }

    .keterangan4{
        font-size:1.3rem;
        font-weight:bold;      
    }

    .keterangan5{
        font-size:1.3rem;
        font-weight:600;      
    }

    .img-fluid {
        width: 100%;
        height: auto;
        border-radius: 10px;
        border: 1px solid #ddd;
        transition: transform 0.3s ease;
    }

    .img-fluid:hover {
        transform: scale(1.05);
    }

    .rating {
        margin: 20px 0;
    }

    .progress-bar {
        background: #ddd;
        border-radius: 5px;
        height: 10px;
        overflow: hidden;
    }

    .progress {
        background: #007bff;
        height: 100%;
    }

    .related-programs h4 {
        font-size: 1.4rem;
        color: #333;
        margin-top: 30px;
        margin-bottom: 20px;
    }

    .related-cards {
        display: flex;
        justify-content: space-between;
    }

    .related-card {
        width: 30%;
        text-align: center;
        background: #f9f9f9;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s;
    }

    .related-card:hover {
        transform: translateY(-10px);
    }

    .related-card img {
        width: 100%;
        height: 150px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .related-card h5 {
        font-size: 1.1rem;
        color: black;
        margin-bottom: 10px;
    }

    .related-card a {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
    }

    .related-card a:hover{
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
        font-size:1.1rem;
    }

    .link {
        margin-top: 30px;
        text-align: center;
    }

    .cta-button {
        padding: 10px 20px;
        background-color: #007bff;
        border-radius: 5px;
        color: white;
        font-weight: bold;
        text-decoration: none;
        transition: background-color 0.3s;
        margin: 0 5px;
    }

    .cta-button:hover {
        background-color: #444;
        transform: scale(1.05);
    }

    /* Animations */
    @keyframes fade-in {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slide-up {
        from { transform: translateY(20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .animate-fade {
        animation: fade-in 1s ease-in-out forwards;
    }

    .animate-slide-up {
        animation: slide-up 1s ease-in-out forwards;
    }
</style>
