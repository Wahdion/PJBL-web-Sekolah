<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <img src="../gambar_home/logo.png" alt="SMKN 1 Sukawati Logo" class="logo">
            <h1>SMKN 1 Sukawati</h1>
            <p class="welcome-message">Selamat datang! Silakan login untuk melanjutkan.</p>
        </div>

        <form action="proses_login.php" method="POST">
            <div class="input-container">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Email" class="email" name="email" autocomplete="off" required>
            </div>
            <div class="input-container">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="password" class="pw" autocomplete="off" required>
            </div>
            <button type="submit" class="kirim"><h3>Login</h3></button>
        </form>

        <div class="divider"></div>

        <div class="footer">
            <p>Belum punya akun? <a href="register.php">Daftar di sini!</a></p>
            <div class="social-media">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</body>
</html>

<style>
    body, html {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        
        overflow: hidden;
    }

    .wrapper {
        max-width: 400px;
        width: 100%;
        padding: 20px;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.9);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .header {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    .logo {
        max-width: 150px;
        height: auto;
        margin-bottom: 15px;
        transition: transform 0.3s ease-in-out;
    }

    .logo {
        display: block;
        margin: 0 auto; 
    }

    .logo:hover {
        transform: scale(1.1);
    }

    .header h1 {
        margin: 0;
        font-size: 2em;
        color: #333;
    }

    .header h1 {
        padding-top:4px;
    }

    .input-container {
    position: relative;
    margin-bottom: 20px;
    text-align: left;
    }

    .input-container i {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #aaa;
        transition: color 0.3s ease;
    }

    .input-container input {
        padding: 12px 15px 12px 45px;
        width: calc(86% - 5px);
        height: 35px;
        border: 2px solid #ccc;
        border-radius: 25px;
        outline: none;
        transition: all 0.3s ease-in-out;
        background: #f9f9f9;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .input-container input:focus {
        border-color: #6a11cb;
        background: #ffffff;
        box-shadow: 0 4px 8px rgba(106, 17, 203, 0.2);
    }

    .input-container input:hover {
    box-shadow: 0 6px 12px rgba(106, 17, 203, 0.15);
  }

    .kirim {
        align-items:center;
        width: 100%;
        padding: 2px;
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        color: white;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        transition: background 0.3s ease-in-out;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .kirim:hover {
        background: linear-gradient(135deg, #5c0fbf, #1e65e6);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }

    .welcome-message {
        margin-bottom: 20px;
        color: #444;
        font-size: 1em;
    }

    .divider {
        height: 1px;
        width: 80%;
        margin: 15px auto;
        background: linear-gradient(90deg, transparent, #ccc, transparent);
    }

    .footer {
        margin-top: 20px;
        font-size: 0.9em;
        color: #666;
    }

    .footer a {
        color: #2575fc;
        text-decoration: none;
    }

    .footer a:hover {
        text-decoration: underline;
    }

    .social-media {
        margin-top: 15px;
    }

    .social-media a {
        margin: 0 10px;
        color: #2575fc;
        font-size: 1.2em;
        transition: color 0.3s ease;
    }

    .social-media a:hover {
        color: #1a5bb8;
    }
</style>
