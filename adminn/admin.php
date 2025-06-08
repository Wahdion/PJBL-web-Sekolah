<br><br>
<h2 align="center"><b>Data Admin</b></h2>
<hr>
<br><br>
<form action="index.php?hal=admin" method="get">
<div class="form-row align-items-center">
<div class="col-sm-3 my-1">
    
    <input type="text" name="cariadm" class="form-control" id="inlineFormInputName" placeholder="Pencarian Nama Admin">
</div>
<div class="col-auto my-1">
    <button type="submit" class="btn btn-success">Cari Admin</button>
</div>
<div class="col-sm-3 my-1">
    <a href="index.php?hal=admtambah" class="btn btn-primary">Tambah Admin</a>
</div>
</div>
  
</form>
<br>
<?php
    if(isset($_GET['cariadm'])){
        $cari = $_GET['cariadm'];
        echo "<b>Hasil Pencarian: ".$cari."</b>";
    }
?>
<br><br>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID Admin</th>
      <th scope="col">Nama Admin</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
 
  <?php
    if(isset($_GET['cariadm'])){
        $cari = $_GET['cariadm'];
        $tampil = mysqli_query($koneksi,"SELECT * FROM admin WHERE nama_admin like '%".$cari."%'");
    }else{
        $tampil = mysqli_query($koneksi,"SELECT * FROM admin ORDER BY nama_admin");
    }
       while($data = mysqli_fetch_array($tampil)) {
        
    
  ?>
  <tbody>
    <tr>
        <th scope="row">
        <?php echo $data['id_admin']; ?> </th>
        <td><?php echo $data['nama_admin']; ?></td>
        <td><?php echo $data['email']; ?></td>
        <td><?php echo $data['password']; ?></td>
        <td><?php echo $data['tgl_lahir']; ?></td>
       

        <td>
            <?php
   echo'
   <a href="index.php?hal=admedit&id=',$data['id_admin'],'" class="btn btn-warning">Edit</a>
   <a href="index.php?hal=admhapus&id=',$data['id_admin'],'" class="btn btn-danger">Hapus</a>
   ';?>
</td>
   </tr>
   </tbody>
   <?php
   }
   ?>
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
