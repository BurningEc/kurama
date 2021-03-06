<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="Static/Menu/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Static/Menu/css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
     <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    
      <div class="container">
      
        <a class="navbar-brand" href="index.php" style="color:#FE642E" font-family="Comic Sans MS,Arial,Verdana"><img src="Static/Menu/img/logo6.png" alt="" class="logo"  width="75" height="50"/>PASTOTUR</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarResponsive">
        
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Información General
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="parroquia.php">Parroquia </a>
                <a class="dropdown-item" href="autoridades.php">Autoridades</a>
                <a class="dropdown-item" href="entidades.php">Entidades</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cultura
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="comunidad.php">Comunidades</a>
                <a class="dropdown-item" href="tradicion.php">Tradiciones</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sugerencia.php">Sugerencias</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <br>
      <br>
      <h1 class="mt-4 mb-3">
        <small>Autoridades</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Autoridades</li>
      </ol>

      <div class="row">
      <?php 
          require_once ("Sistema/bd/db.php");
          require_once ("Sistema/bd/conexion.php");
          $sql = "SELECT * FROM directivo";
          $query = mysqli_query($con,$sql);  
          while ($row=mysqli_fetch_array($query))
          {
          ?>
            <div class="col-lg-6 portfolio-item">
              <div class="card h-100">
                <center>
                <a href="#"><img class="card-img-top" style="width: 300px;height: 300px;" src="data:image/jpg;base64,<?php echo $row['imagen_D'];?>" alt=""></a>
                </center>
                <div class="card-body" align="center">
                  <h4 class="card-title">
                    <a href="#"><?php echo $row['cargo_D'];?></a>
                  </h4>
                  <p class="card-text"><?php echo $row['nombre_D'];?></p>
                </div>
              </div>
            </div>
        <?php
        }?> 
      </div>
    </div>
    <!-- /.container -->
     <footer class="py-5 bg-dark">
      <div class="container" align="center">
        <a href="https://www.facebook.com/San-Juan-de-Pastocalle-475222245837076/?ref=br_rs"><img src=" Static/Menu/img/slides/nivo/facebook.png"></a>
        <a href="https://www.youtube.com/channel/UCcRfK6B38pHrO3gPHFSGCdA"><img src="Static/Menu/img/slides/nivo/youtube.png"></a>
        <a href="https://twitter.com/?lang=es"><img src="Static/Menu/img/slides/nivo/twitter.png"></a>
        <a href="https://www.instagram.com/?hl=es-la"><img src="Static/Menu/img/slides/nivo/instagram.png"></a>
    <br>
    <br>
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="Static/Menu/vendor/jquery/jquery.min.js"></script>
    <script src="Static/Menu/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
