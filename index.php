<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Centro Holístico Kurama</title>
    <!-- Bootstrap core CSS -->
    <link href="Static/Menu/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="Static/Menu/css/modern-business.css" rel="stylesheet">
    <link rel="shortcut icon" href="Static/Menu/img/ico/logo3.ico"/>
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php" style="color:#FE642E" font-family="Comic Sans MS,Arial,Verdana"> <strong>Centro Holístico Kurama</strong></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php" >Inicio</a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="sugerencia.php">Sugerencias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>      
      </div>
    </nav>
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active">
             <?php 
          require_once ("Sistema/bd/db.php");
          require_once ("Sistema/bd/conexion.php");
          $sql = "SELECT * FROM foto where foto.idFoto=1";
          $query = mysqli_query($con,$sql);  
          while ($row=mysqli_fetch_array($query))
          {
          ?>
          <a href="#"><img class="card-img-top" style="height: 500px;width: 1750px;" src="data:image/jpg;base64,<?php echo $row['imagen_F'];?>" alt=""></a>
            <div class="carousel-caption d-none d-md-block">
              <h3><?php echo $row['nombre_F'];?></h3>
              <p><?php echo $row['descripcion_F'];?></p>        
            </div>
            <?php
        }?>  
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item">
            <?php 
          require_once ("Sistema/bd/db.php");
          require_once ("Sistema/bd/conexion.php");
          $sql = "SELECT * FROM foto where foto.idFoto=2";
          $query = mysqli_query($con,$sql);  
          while ($row=mysqli_fetch_array($query))
          {
          ?>
              <a href="#"><img class="card-img-top" style="height: 500px;width: 1750px;" src="data:image/jpg;base64,<?php echo $row['imagen_F'];?>" alt=""></a>
            <div class="carousel-caption d-none d-md-block">
              <h3><?php echo $row['nombre_F'];?></h3>
              <p><?php echo $row['descripcion_F'];?></p>        
            </div>
              <?php
        }?>  
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item">
            <?php 
          require_once ("Sistema/bd/db.php");
          require_once ("Sistema/bd/conexion.php");
          $sql = "SELECT * FROM foto where foto.idFoto=5";
          $query = mysqli_query($con,$sql);  
          while ($row=mysqli_fetch_array($query))
          {
          ?>
            <a href="#"><img class="card-img-top" style="height: 500px;width: 1750px;" src="data:image/jpg;base64,<?php echo $row['imagen_F'];?>" alt=""></a>
            <div class="carousel-caption d-none d-md-block">
              <h3><?php echo $row['nombre_F'];?></h3>
              <p><?php echo $row['descripcion_F'];?></p>
              
            </div>
             <?php
        }?>  
          </div>

          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item">
            <?php 
          require_once ("Sistema/bd/db.php");
          require_once ("Sistema/bd/conexion.php");
          $sql = "SELECT * FROM foto where foto.idFoto=5";
          $query = mysqli_query($con,$sql);  
          while ($row=mysqli_fetch_array($query))
          {
          ?>
            <a href="#"><img class="card-img-top" style="height: 500px;width: 1750px;" src="data:image/jpg;base64,<?php echo $row['imagen_F'];?>" alt=""></a>
            <div class="carousel-caption d-none d-md-block">
              <h3><?php echo $row['nombre_F'];?></h3>
              <p><?php echo $row['descripcion_F'];?></p>
              
            </div>
             <?php
        }?>  
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">
  

      <!-- Marketing Icons Section -->

         <hr>
      <!-- Portfolio Section -->
      <h2> <strong></strong>Videos</strong></h2>
      <div class="row">
        <?php 
          $sql = "SELECT * FROM videos";
          $query = mysqli_query($con,$sql);  
          while ($row=mysqli_fetch_array($query))
          {
          ?>
            <div class="col-md-3 col-sm-6 mb-4" align="center">
              <a href="<?php echo $row['link_V'];?>">
                <img class="img-fluid"  src="data:image/jpg;base64,<?php echo $row['imagen_V'];?>">
              </a>
                  <h6><?php echo $row['nombre_V'];?></h6>
            </div>
        <?php
        }?> 
      </div>
      <hr>

      <!-- Call to Action Section -->
      <div class="row mb-4" >
        <div class="col-md-8">
          <h3> <strong>Ubicación:</strong></h3>
        </div>
        <div class="col-md-4" >
          <a class="btn btn-lg btn-secondary btn-block" href="#ubicacion" data-toggle="modal" ><img src="Static/Menu/img/slides/nivo/mapa.png"> </a>
          <div class="modal fade" tabindex="-1" role="dialog" id="ubicacion">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header" align="center">
			         <h4 class="modal-title">Modal title</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      </div>
			      <div class="modal-body">
			    
			          <!-- Embedded Google Map -->
			         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7956209169242!2d-78.50681298529945!3d-0.19327189985897625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d59a44bd73d91d%3A0xa79418a918ceda89!2sCENTRO+HOLISTICO+KURAMA!5e0!3m2!1ses-419!2sec!4v1554524191481!5m2!1ses-419!2sec" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
			        
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Save changes</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
        </div>
      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container" align="center">
      
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

