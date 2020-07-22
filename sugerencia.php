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

    <!-- Page Content -->
    <div class="container">
      <br>
      <br>
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Sugerencias
        <small></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Sugerencias</li>
      </ol>

      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Envie su Sugerencia</h3>
          <form  method="POST" action="Vistas/Sugerencias/controlador.php">
            <input class="form-control" type="hidden" name="ver" value="crearUs">
            <div class="control-group form-group">
              <div class="controls">
                <label>Nombre:</label>
                <input type="text" class="form-control" id="name" required data-validation-required-message="Escribe tu nombre" name="nombre">
                <p class="help-block"></p>
              </div>
            </div>

              <div class="control-group form-group">
              <div class="controls">
                <label>Asunto:</label>
                <input type="asunto" class="form-control" id="asunto" required data-validation-required-message="Escribe el asunto:" name="asunto">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Correo Electronico:</label>
                <input type="email" class="form-control" id="email" required data-validation-required-message="Escribe tu correo" name="correo">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Sugerencia:</label>
                <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Escribe tu sugerencia" maxlength="999" style="resize:none" name="mensaje"></textarea>
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="sendMessageButton" >Enviar Sugerencia</button>
          </form>
        </div>

      </div>
    </div>
    <!-- /.container -->
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