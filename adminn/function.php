<?php
function menu(){
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>

    <title>SMK N 1 Sukawati</title>

  </head>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Website</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<!--menu header-->
	

  <!--menu judul-->
  </section>


<!--menu beranda-->

<div id="menu">
    <div class="container">
      <div class="row">
    
      <div class="container1">
    <div class="judulnama">

        <img src="../gambar_home/logo.png" alt="" class="judul-foto">
        
        <div class="name">
        <h1>DASHBOARD</h1>
        <h3>SMK N 1 Sukawati</h3>
        
       
        </div>
</div>


  <ul class="top-menu">
  <li><a href="index.php">Beranda</a></li>
			<li><a href="index.php?hal=jurusan">Jurusan</a></li>
      <li><a href="index.php?hal=mapel">Mapel</a></li>
      <li><a href="index.php?hal=guru">Guru</a></li>
      <li><a href="index.php?hal=fasilitas">Fasilitas</a></li>
      <li><a href="index.php?hal=mesagge">Pesan</a></li>
      <li><a href="index.php?hal=admin">Admin</a></li>
			<li><a href="logout.php"><i data-feather="log-out"></i></a></li>
</div>
  </div>
  </div>

		</div>

	</div>
</html>
<script>
      feather.replace();
    </script>
<!--CSS-->
<style>
    body{
      font-family: "Monsterret", 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    
    
    .top-contact{
      list-style: none;
      display:flex;
      justify-content:space-between;
     padding-top:1rem;
	 padding-left:2.2rem;
    }
    

    #topbar li{
      display: inline-block;
    }

    #topbar li a{
      color: #fff;
      display: inline-block;
      padding: 0 20px;
    }

    #topbar li a i{
      color:#F2C808;
      margin-right:5px;
    }
    
    .judul-foto{
      width: 12%;
      border-radius:100%;
    }
    

    
    /*css untuk header*/
    .container1{
      background-color:#15477A;
    }
    .judulnama{
      display:flex;
      padding-top:1rem;
    }


    .judulnama .name h1{
      padding-top:1rem;
      font-size: 30px;
      color:white;
      text-transform: uppercase;
      padding-left:1rem;
    }

    .judulnama .name h3{
      font-size:18px;
      font-family:"Relaway", 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      text-transform:uppercase;
      letter-spacing:1px;
      color:white;
      padding-left:1rem;
    }

    .pencarian .input{
      padding-top:1.5rem;
     width: 65rem;
    }

    .input{
      display:flex;
    }

    .form-control{
      background-color:#ddd;
    }

    /*menu*/
    #menu{
      background-color:#15477A;
      color:#fff;

    }
    
    .top-menu{
      list-style: none;
      font-size:1rem;
      font-weight:500;

    }

    #menu li{
      display: inline-block;
      justify-content:space-around;
      padding-left:3.4rem;
      padding-top:1rem;
    }

    #menu li a{
      color: #fff;
      display: inline-block;
      padding: 0 20px;
    }

    #menu li a:hover{
      color:yellow;
    }

    #menu li a i{
      color:#F2C808;
      margin-right:5px;
    }
    </style>
<?php
}

//untuk menampilkan beranda
function beranda(){
?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="alert alert-light" role="alert">
    <h1 class="judul1">SMKN 1 Sukawati </h1>
    
    <hr>
    <br><br>

    <div class="slideshow-container">
        <div class="slides">
            <div class="slide">
                <img src="../gambar_home/sekolah4.jpg" alt="Gambar 1">
            </div>
            <div class="slide">
                <img src="../gambar_home/sekolah3.jpg" alt="Gambar 2">
            </div>
            <div class="slide">
                <img src="../gambar_home/sekolah2.jpg" alt="Gambar 3">
            </div>
            <div class="slide">
                <img src="../gambar_home/sekolah1.jpg" alt="Gambar 3">
            </div>
        </div>
    </div>

    <script>
        let currentSlide = 0;
        const slides = document.querySelector('.slides');
        const totalSlides = document.querySelectorAll('.slide').length;

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            const offset = -currentSlide * 100;
            slides.style.transform = `translateX(${offset}%)`;
        }

        setInterval(nextSlide, 3000); 
    </script>



    <div class="gambar-kurikulum">
    <img src="../gambar_home/smkbisa.png"  width=" 140px" height="140px">
    <img src="../gambar_home/kurikulum.png" width=" 140px" height="140px">
    <img src="../gambar_home/merdeka.png" width=" 140px" height="140px">
    <img src="../gambar_home/merdekamengajar.png" width=" 140px" height="140px">
</div>
</div>

<br><br><br>
</body>
</html>

    <style>

      /*gambar geser*/
      .slideshow-container {
            position: relative;
            max-width: 80%;
            margin: auto;
            overflow: hidden;
            border-radius:15px;
            height: 30%;
        }

        .slides {
            display: flex;
            transition: transform 1s ease;
        }

        .slide {
            min-width: 100%;
            height: auto;
        }

        .slide img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .slideshow-container:hover .slides {
            transition: none;
        }

        /*body*/
    .nav-link{
      font-weight:bold;
      font-size:0.9rem;
      font-family:Poppins;
    }
      .maps{
    padding: 0.2rem;
    text-align: center;
    width: 400px;
    padding-top: 35px;
    height: 202px;
    text-align: left;
    border-radius:15px;
}
      <style>
    .isi{
        display:flex;
    }
    .judul1{
    text-align: center;
    font-size:1.8rem;
    padding-top:1rem;
    font-family:Poppins;
    color:black;
    font-weight:bold;
    }

    .judul1 span{
      font-style:italic;
    }

    .isi img{
        
        padding: 10px;
        padding-top:1.5rem;
        width: 45%;
        border-radius:5px;
    }

  

    .wrapper{
        display:flex;
        padding-top:2rem;
    }


    .wrapper .foto4{
        width: 45%;
        padding-right:1.5rem;
        border-radius:10px;
        height:70%;
    }

    .wrapper .teks{
        padding-left:1rem;
    }

    .gambar-kurikulum{
      padding-left:23rem;
}
    
</style>
</style>
<?php
}

//menampilkan footer
function footer(){
    ?>
    
        <div class="alert alert-primary" role="alert" align="center">
            &copy LSP RPL SMK N 1 Sukawati
        </div>
    <?php
    }






    