<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Pesan</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="message">
                <h2>Pesan Anda</h2>
                <p>Ini adalah contoh pesan yang bisa Anda sesuaikan.</p>
            </div>
            <div clabsznxvnbvss="input-section">
                <input type="text" placeholder="Tulis pesan...">
                <button>Kirim</button>
            </div>
        </div>
    </div>
</body>
</html>
<br><br>
<?php include 'footer.php'; ?>

<style>
   

    .wrapper {
        max-width: 800px; /* Atur lebar wrapper sesuai kebutuhan */
        margin: auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
		margin-top:2rem;
    }

   

    .message {
        margin-bottom: 20px;
		
    }

    .message h2 {
        margin: 0 0 10px;
    }

    .input-section {
        display: flex;
    }

    .input-section input {
       width: 40rem;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-right: 10px;
		
    }

    .input-section button {
        padding: 10px 20px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .input-section button:hover {
        background-color: #218838;
    }
</style>
