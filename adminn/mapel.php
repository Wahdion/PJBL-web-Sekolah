<br><br>

<h2 align="center">Data Mapel</h2>
<hr>
<br><br>

<form action="index.php?hal=mapel" method="get">
    <div class="form-row align-items-center">
        <div class="col-sm-3 my-1">
            <label class="sr-only" for="inlineFormInputName">Name</label>
            <input type="text" name="carimapel" class="form-control" id="inlineFormInputName" placeholder="Pencarian Mapel">
        </div>

        <div class="col-auto my-1">
            <button type="submit" class="btn btn-success">Cari Mapel</button>
        </div>

        <div class="col-sm-3 my-1">
            <a href="index.php?hal=mapeltambah" class="btn btn-primary">Tambah Mapel</a>
        </div>
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Mapel</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
     $no = 1;
     $where = " WHERE 1=1 ";
if (isset($_GET['carimapel'])) {
    $cari = $_GET['carimapel'];
    $query = "
        SELECT mapel.id_mapel, mapel.nama_mapel,jurusan.nama_jurusan
        FROM mapel
        JOIN jurusan ON mapel.id_jurusan = jurusan.id_jurusan
        WHERE mapel.nama_mapel LIKE '%" . $cari . "%'
        ORDER BY mapel.id_mapel DESC
    ";
} else {
    $query = "
        SELECT mapel.id_mapel, mapel.nama_mapel, jurusan.nama_jurusan
        FROM mapel
        JOIN jurusan ON mapel.id_jurusan = jurusan.id_jurusan
        ORDER BY mapel.id_mapel DESC
    ";
}

$tampil = mysqli_query($koneksi, $query);

while ($data = mysqli_fetch_array($tampil)) {
?>
<tr>
    <td><?= $no++ ?></td>
    <td><?php echo $data['nama_mapel']; ?></td>
    <td><?php echo $data['nama_jurusan']; ?></td>
    <td>
        <a href="index.php?hal=mapeledit&id=<?php echo $data['id_mapel']; ?>" class="btn btn-warning">Edit</a>
        <a href="index.php?hal=mapelhapus&id=<?php echo $data['id_mapel']; ?>" class="btn btn-danger">Hapus</a>
    </td>
</tr>
<?php
}
?>

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
        padding: 6px 12px;
        border-radius: 5px;
        font-weight: bold;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        padding: 6px 12px;
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
