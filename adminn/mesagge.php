<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "nama_database"; 

$conn = mysqli_connect($servername, $username, $password, $dbname = "sekolah2");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


$query = "SELECT * FROM mesagge"; 
$where = "";

if (isset($_GET['carimesagge']) && !empty($_GET['carimesagge'])) {
    $cari = $_GET['carimesagge'];
    $where = " WHERE nama_user LIKE '%$cari%'";
    $query .= $where;
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <h2 align="center">Pesan</h2>
    <hr>

    <form action="index.php" method="get">
        <div class="form-row align-items-center justify-content-center">
            <div class="col-sm-3 my-1">
                <input type="text" name="carimesagge" class="form-control" id="inlineFormInputName" placeholder="Cari Pesan dari User">
            </div>
            <div class="col-auto my-1">
                <button type="submit" class="btn btn-success">Cari Pesan</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User</th>
                <th scope="col">Pesan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        // Menampilkan data hasil query
        if (mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($data['nama_user']); ?></td>
                    <td><?= htmlspecialchars($data['pesan']); ?></td>
                    <td>
                        <a href="index.php?hal=mesaggehapus&id=<?= $data['id_user']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='4' align='center'>Tidak ada data</td></tr>";
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
            text-align: center;
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

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            padding: 6px 12px;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn-danger:hover {
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

</body>
</html>

<?php
// Tutup koneksi
mysqli_close($conn);
?>
