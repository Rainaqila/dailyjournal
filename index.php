<?php
include "koneksi.php"; 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ruang Sederhana</title>
    <link rel="icon" href="https://file.notion.so/f/f/332d3749-1e40-47dd-9041-59670fa067ee/92786fe7-1022-485c-a5a0-210603788a58/logo.png?table=block&id=4c9bbd35-3032-49da-9623-4ef8df2066cf&spaceId=332d3749-1e40-47dd-9041-59670fa067ee&expirationTimestamp=1731052800000&signature=l3ACaXnkvovtmXWQAszO1K3TBbgv-Lj6vtf_ZA6vvP4&downloadName=logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
   <style>
        *{
          font-family: "Noto Serif", serif;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #243642; 
            border-radius: 20%;
        }

    </style>
  
  </head>
  <body>
    <!-- nav begin -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top shadow">
        <div class="container">
          <a class="navbar-brand" href="#">Ruang Sederhana</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#article">Article</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#gallery">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#schedule">Schedule</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#aboutme">About Me</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php" target="_blank">Login</a>
              </li>
            </ul>
            <div class="g-2">
              <button class="btn btn-dark" id="dark">
                <i class="bi bi-moon-stars"></i>
              </button>
              <button class="btn btn-danger" id="light">
                <i class="bi bi-brightness-high-fill"></i>
              </button>
            </div> 
          </div>
        </div>
      </nav>
    <!-- nav end -->
    <!-- hero begin -->
    <section id="hero" class="text-center p-5  text-sm-start">
        <div class="container">
            <div class="d-sm-flex flex-sm-row-reverse align-items-center">
                <img src="https://images.unsplash.com/photo-1493552152660-f915ab47ae9d?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid rounded-4" width="300">
                <div id="dark">
                    <h1 class="fw-bold display-4">Live Light❤️, Enjoy Every Moment</h1>
                    <h4 class="lead">Minimalisme menciptakan ruang untuk kebahagiaan dan makna dalam hidup, dengan fokus pada hal-hal yang benar-benar penting.</h4>
                    <h6>
                      <span id="tanggal"></span>
                      <span id="jam"></span>
                    </h6>
                </div>
            </div>
        </div>
    </section>
    <!-- hero end -->
    <!-- article begin -->
    <section id="article" class="text-center p-5">
      <div class="container">
        <h1 class="fw-bold display-4 pb-3">Article</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
          <?php  
          $sql = "SELECT * FROM article ORDER BY tanggal DESC";
          $hasil = $conn->query($sql); 

          while($row = $hasil->fetch_assoc()){
          ?>
            <div class="col">
              <div class="card h-100">
                <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title"><?= $row["judul"]?></h5>
                  <p class="card-text">
                    <?= $row["isi"]?>
                  </p>
                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">
                    <?= $row["tanggal"]?>
                  </small>
                </div>
              </div>
            </div>
            <?php
          }
          ?> 
        </div>
      </div>
    </section>
    <!-- article end -->
    <!-- gallery begin -->
    <section id="gallery" class="text-center p-5">
        <div class="container ">
            <h1 class="fw-bold display-4 pb-3">Gallery</h1>
            <div id="carouselExample" class="carousel slide ">
            <div class="carousel-inner rounded-5">
                    <?php
                    $sql = "SELECT * FROM gallery ORDER BY id ASC";
                    $hasil = $conn->query($sql); 
                    $active = true;

                    while($row = $hasil->fetch_assoc()){
                    ?>
                    <div class="carousel-item <?= $active ? 'active' : '' ?>">
                        <img src="img/<?= $row['gambar'] ?>" class="d-block w-100" alt="...">
                    </div>
                    <?php
                    $active = false;
                    }
                    ?>
            </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
        </div>
    </section>
    <!-- gallery end -->
    <!-- schedule begin -->
    <section id="schedule" class="text-center p-5">
      <div class="container">
        <h1 class="fw-bold display-4 pb-3">Schedule</h1>
        <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-around">
          <div class="col">
            <div class="card h-100">
              <div class="card-header bg-danger">
                <small class="text-white text-uppercase">senin</small>
              </div>
              <div class="list-group">
                <li class="list-group-item">Etika Profesi <br>
                  <small>16.20 - 18.00 | H.4.4</small>
                </li>
                <p class="mb-2 mt-2">Sistem Operasi <br>
                  <small>18.30 - 21.00 | H.4.8</small>
                </p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="card-header bg-danger">
                <small class="text-white text-uppercase">selasa</small>
              </div>
              <div class="list-group">
                <li class="list-group-item">Pendidikan Kewarganegaraan <br>
                  <small>12.30 - 13.10 | Kulino</small>
                </li>
                <li class="list-group-item">Probabilitas dan Statistik <br>
                  <small>15.30 - 18.00 | H.4.9</small>
                </li>
                <p class="mb-2 mt-2">Kecerdasan Buatan<br>
                  <small>18.30 - 21.00 | H.4.11</small>
                </p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="card-header bg-danger">
                <small class="text-white text-uppercase">rabu</small>
              </div>
              <div class="list-group">
                <p class="mb-2 mt-2">Manajemen Proyek Teknologi Informasi <br>
                  <small>15.30 - 18.00 | H.4.6</small>
                </p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="card-header bg-danger">
                <small class="text-white text-uppercase">kamis</small>
              </div>
              <div class="list-group">
                <li class="list-group-item">Bahasa Indonesia <br>
                  <small>12.30 - 14.10 | Kulino</small>
                </li>
                <li class="list-group-item">Pendidikan Agama Islam <br>
                  <small>16.20 - 18.00 | Kulino</small>
                </li>
                <p class="mb-2 mt-2">Penambangan Data<br>
                  <small>18.30 - 21.00 | H.4.9</small>
                </p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="card-header bg-danger">
                <small class="text-white text-uppercase">jumat</small>
              </div>
              <div class="list-group">
                <p class="mb-2 mt-2">Pemrograman Web Lanjut <br>
                  <small>10.20 - 12.00 | D.2.K</small>
                </p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="card-header bg-danger">
                <small class="text-white text-uppercase">sabtu</small>
              </div>
              <div class="list-group">
                <p class="mb-2 mt-2">FREE <br>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- schedule end -->
    <!-- about me begin -->
    <section id="aboutme" class="text-center p-5 text-sm-start bg-danger-subtle">
      <div class="container">
          <div class="d-sm-flex flex-sm align-items-center gap-5 justify-content-center">
              <img src="https://media.licdn.com/dms/image/v2/D5603AQHbnAGoofnrww/profile-displayphoto-shrink_400_400/B56ZPDGJnsGcAg-/0/1734144991524?e=1740009600&v=beta&t=FZ8eN9f4Oosoq6O_XFNCJklWb6sHiHoPXJlFphUkz-E" class="img-fluid rounded-circle" width="300" onclick="hide()">
              <div class="py-1 mt-2" id="mydiv">
                  <h4 class="text-secondary">A11.2023.15227</h4>
                  <h2 class="fw-bold mb-2 display-4">Raina Aqila Zahrie</h2>
                  <small>Program Studi Teknik Infromatika</small>
                  <a id="udinus" class="fw-bold text-dark text-decoration-none d-block" target="_blank" href="https://dinus.ac.id/">Universitas Dian Nuswantoro</a>
              </div>
          </div>
      </div>
    </section>
    <!-- about me end -->
    <!-- footer begin -->
    <footer class="text-center p-4">
      <div>
        <a href="https://www.instagram.com/rainaqila._/profilecard/?igsh=MXB3dnRzaHlmNGpvbA==" class="fs-4"><i class="bi-5x bi-instagram p-2 h-2 text-dark"></i></a>
        <a href="https://www.tiktok.com/@journeywithraina?_t=8quyMzStNuj&_r=1" class="fs-4"><i class="bi bi-tiktok p-2 h-2 text-dark"></i></a>
        <a href="https://youtube.com/@naqeelaa1493?si=5ygnBox2y49bUTvf" class="fs-4"><i class="bi bi-youtube p-2 h-2 text-dark"></i></a>
      </div>
      <div>
        Ruang Sederhana &copy; 2024 
      </div>
    </footer>
    <!-- footer end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="text/javascript">
      window.setTimeout("tampilWaktu()", 1000);

      function tampilWaktu(){
        var waktu = new Date();
        var bulan = waktu.getMonth() + 1;

        setTimeout("tampilWaktu()", 1000);
        document.getElementById("tanggal").innerHTML = waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
        document.getElementById("jam").innerHTML = 
          waktu.getHours() +
          ":" +
          waktu.getMinutes() +
          ":" +
          waktu.getSeconds();
      }

      function hide() {
        var x = document.getElementById("mydiv");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }

      //dark mode and light mode
      document.getElementById("dark").onclick = function(){
      document.body.classList.remove("bg-white", "text-dark");
      document.getElementById("udinus").classList.remove("text-dark");
      document.getElementById("udinus").classList.add("text-white");
      document.body.classList.add("bg-dark", "text-white");
      };

      document.getElementById("light").onclick = function(){
      document.body.classList.remove("bg-dark",  "text-white");
      document.getElementById("udinus").classList.remove("text-white");
      document.getElementById("udinus").classList.add("text-dark");
      document.body.classList.add("bg-white", "text-dark");
      };

    </script>
  </body>
</html>