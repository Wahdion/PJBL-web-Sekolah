<br><br>
<h2 align="center"><b>Data Fasilitas</b></h2>
<hr>
<br><br>

<form action="index.php?hal=fasilitas" method="get">
    <div class="form-row align-items-center">
        <div class="col-sm-3 my-1">
            <input type="text" name="carifasilitas" class="form-control" id="inlineFormInputName" placeholder="Cari Data Fasilitas">
        </div>
        <div class="col-auto my-1">
            <button type="submit" class="btn btn-success">Cari Fasilitas</button>
        </div>
        <div class="col-sm-3 my-1">
            <a href="index.php?hal=fasilitastambah" class="btn btn-primary">Tambah Fasilitas</a>
        </div>
    </div>
</form>

<br>

<?php
if (isset($_GET['carifasilitas'])) {
    $cari = htmlspecialchars($_GET['carifasilitas']); 
    echo "<p>Pencarian untuk: <b>$cari</b></p>";
}
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Fasilitas</th>
            <th scope="col">Gambar</th>
            <th scope="col">Aksi</th> 
        </tr>
    </thead>
    <tbody>
    <?php
        $no = 1;
        $where = " WHERE 1=1 ";
        $cari = isset($_GET['carifasilitas']) ? mysqli_real_escape_string($koneksi, $_GET['carifasilitas']) : '';
        
        $query = "SELECT fasilitas.id_fasilitas, fasilitas.nama_fasilitas, jurusan.nama_jurusan, fasilitas.gambar
                  FROM fasilitas
                  JOIN jurusan ON fasilitas.id_jurusan = jurusan.id_jurusan";
        
        if ($cari !== '') {
            $query .= " WHERE fasilitas.nama_fasilitas LIKE '%$cari%'";
          
        }
        $query .= " ORDER BY fasilitas.id_fasilitas DESC";
    
        
        $tampil = mysqli_query($koneksi, $query);

        while ($data = mysqli_fetch_array($tampil)) {
    ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?php echo htmlspecialchars($data['nama_jurusan']); ?></td>
                <td><?php echo htmlspecialchars($data['nama_fasilitas']); ?></td>
                <td>
            <?php if (!empty($data['gambar'])): ?>
                <img src="../uploads/jurusan1/<?php echo $data['gambar']; ?>" alt="Gambar Jurusan" style="width: 100px; height: auto;">
            <?php else: ?>
                <p>Tidak Ada Gambar</p>
            <?php endif; ?>
        </td>
                <td>
                    <div style="display: flex; justify-content: center; gap: 10px;">
                        <a href="index.php?hal=fasilitasedit&id=<?php echo $data['id_fasilitas']; ?>" class="btn btn-warning">Edit</a>
                        <a href="index.php?hal=fasilitashapus&id=<?php echo $data['id_fasilitas']; ?>" class="btn btn-danger">Hapus</a>
                    </div>
                </td>
            </tr>
    <?php } ?>
    </tbody>
</table>

<style>
    /* Gaya untuk Body */
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        color: #333;
        margin: 0;
        padding: 0;
    }

    /* Header */
    h2 {
        color: #444;
        font-weight: bold;
        margin-top: 20px;
        margin-bottom: 10px;
        font-size: 2rem;
    }

    hr {
        width: 10%;
        border-top: 2px solid #007bff;
        margin: 20px auto;
    }

    /* Gaya untuk Form */
    .form-row {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ced4da;
        padding: 10px;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        color: #fff;
        font-weight: bold;
        padding: 8px 16px;
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        font-weight: bold;
        padding: 8px 16px;
        border-radius: 5px;
    }

    .btn-success:hover, .btn-primary:hover {
        opacity: 0.8;
    }

    /* Gaya untuk Tabel */
    .table {
        width: 80%;
        margin: 20px auto;
        background-color: #fff;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .table th, .table td {
        padding: 12px; 
        text-align: center; 
        vertical-align: middle; 
    }

    .table thead {
        background-color: #007bff;
        color: #fff;
    }

    .table tbody tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    .table tbody tr:hover {
        background-color: #dfe6f1;
    }

    /* Gaya untuk Tombol Aksi */
    .btn-warning {
        background-color: #ffc107;
        color: #333;
        padding: 4px 8px;
        border-radius: 5px;
        font-weight: bold;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        padding: 4px 8px;
        border-radius: 5px;
        font-weight: bold;
    }

    .btn-warning:hover, .btn-danger:hover {
        opacity: 0.8;
    }

    /* Responsive untuk layar kecil */
    @media (max-width: 768px) {
        .table {
            width: 100%;
            margin: 10px auto;
        }

        h2 {
            font-size: 1.5rem;
        }

        .form-row {
            flex-direction: column;
            align-items: stretch;
        }

        .col-sm-3, .col-auto {
            width: 100%;
            margin-bottom: 10px;
        }
    }
</style>
