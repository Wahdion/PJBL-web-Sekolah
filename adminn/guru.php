<br><br>
<h2 align="center"><b>Data Guru</b></h2>
<hr>
<br><br>
<form action="index.php?hal=guru" method="get">
<div class="form-row align-items-center">
<div class="col-sm-3 my-1">
    
    <input type="text" name="cariguru" class="form-control" id="inlineFormInputName" placeholder="Pencarian Nama Guru">
</div>
<div class="col-auto my-1">
    <button type="submit" class="btn btn-success">Cari Guru</button>
</div>
<div class="col-sm-3 my-1">
    <a href="index.php?hal=gurutambah" class="btn btn-primary">Tambah Guru</a>
</div>
</div>
  
</form>
<br>
<?php
    if(isset($_GET['cariguru'])){
        $cari = $_GET['cariguru'];
        echo "".$cari."</b>";
    }
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Jurusan</th>
      <th scope="col">Mapel</th>
      <th scope="col">Guru</th>
      <th scope="col">Alamat</th>
      <th scope="col">TGL-Lahir</th>
      <th scope="col">TLP</th>
      <th scope="col">Foto Guru</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    
  <?php
  
  $no = 1;
  $where = " WHERE 1=1 ";
if (isset($_GET['cariguru'])) {
    $cari = $_GET['cariguru'];
    $query = "
        SELECT guru.id_guru, guru.nama_guru, guru.alamat, guru.tgl_lahir, guru.tlpn, jurusan.nama_jurusan, guru.gambar, mapel.nama_mapel
        FROM guru
        JOIN jurusan ON guru.id_jurusan = jurusan.id_jurusan
        JOIN mapel ON guru.id_mapel = mapel.id_mapel
        WHERE guru.nama_guru LIKE '%" . $cari . "%'
        ORDER BY guru.id_guru DESC
    ";
} else {
    $query = "
        SELECT guru.id_guru, guru.nama_guru, guru.alamat, guru.tgl_lahir, guru.tlpn, jurusan.nama_jurusan, guru.gambar, mapel.nama_mapel
        FROM guru
        JOIN jurusan ON guru.id_jurusan = jurusan.id_jurusan
        JOIN mapel ON guru.id_mapel = mapel.id_mapel
        ORDER BY guru.id_guru DESC
    ";
}

$tampil = mysqli_query($koneksi, $query);
while ($data = mysqli_fetch_array($tampil)) {
    ?>


    <tr>
       
        <td><?= $no++ ?></td>
        <td><?php echo $data['nama_jurusan']; ?></td>
        <td><?php echo $data['nama_mapel']; ?></td>
        <td><?php echo $data['nama_guru']; ?></td>
        <td><?php echo $data['alamat']; ?></td>
        <td><?php echo $data['tgl_lahir']; ?></td>
        <td><?php echo $data['tlpn']; ?></td>
        <td>
            <?php if (!empty($data['gambar'])): ?>
                <img src="../uploads/guru/<?php echo $data['gambar']; ?>" alt="Foto Guru" style="width: 100px; height: auto;">
            <?php else: ?>
                <p>Tidak Ada Gambar</p>
            <?php endif; ?>
        </td>
        <td>
            <div style="display: flex; justify-content: center; gap: 10px;">
                <a href="index.php?hal=guruedit&id=<?php echo $data['id_guru']; ?>" class="btn btn-warning">Edit</a>
                <a href="index.php?hal=guruhapus&id=<?php echo $data['id_guru']; ?>" class="btn btn-danger">Hapus</a>
            </div>
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
