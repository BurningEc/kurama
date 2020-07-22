<?php
  require_once ("Sistema/bd/db.php");
  require_once ("Sistema/bd/conexion.php");
  if (isset($_POST['search1'])) {
    $q = $_POST['q'];
    $sql = "SELECT * FROM parroquia_detalle where Parroquia_idParroquia=".$q."";
    $query = mysqli_query($con,$sql); 
    $response=""; 
    while ($row=mysqli_fetch_array($query))
      {
        $sql1 = "SELECT * FROM tradicion where idTradicion=".$row['Tradicion_idTradicion']."";
        $query1 = mysqli_query($con,$sql1);  
        while ($row1=mysqli_fetch_array($query1))
          {
            $response.="<tr>";
            $response.="<td>".$row1['idTradicion']."</td>";
            $sql2 = "SELECT * FROM parroquia where idParroquia=".$row['Parroquia_idParroquia']."";
            $query2 = mysqli_query($con,$sql2);  
            while ($row2=mysqli_fetch_array($query2))
              {
            $response.="<td>".$row2['nombre_P']."</td>";
              }
            $sql3 = "SELECT * FROM tipotradicion where idTipo_T=".$row1['TipoTradicion_idTipoTradicion']."";
                  $query3 = mysqli_query($con,$sql3);  
                  while ($row3=mysqli_fetch_array($query3))
                  {
            $response.="<td>".$row3['nombre_T']."</td>";
                  }
            $response.="<td>".$row1['nombre_T']."</td>";
            $response.="<td>".$row1['descripcion_T']."</td>";
            $response.="<td><img style='height: 100px;width: 100px;'' src='data:image/jpg;base64,".$row1['imagen_T']."'></td>";
            $response.="</tr>";    
          }
      }            
    exit($response);
  }
?>
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
     <link href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="dist/star-rating.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Static/Menu/css/modern-business.css" rel="stylesheet">
    <script type="text/javascript">
    function lista(){
    var query = $("#searchBox").val();
      $.ajax(
      {
        url: 'tradicion.php',
        method: 'POST',
        data: {
          search1: 1,
          q: query
        },
        success: function (data) {
          $("#tradicion_lista").html("");
          $("#tradicion_lista").html(data);
        },
        dataType: 'text'
      }
      );
    }  
</script>
<style>
.selcls { 
    padding: 9px; 
    border: solid 1px #517B97; 
    outline: 0; 
    background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #CAD9E3), to(#FFFFFF)); 
    background: -moz-linear-gradient(top, #FFFFFF, #CAD9E3 1px, #FFFFFF 25px); 
    box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
    -moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
    -webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 

    } 
   
</style>    

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
        <small>Tradiciones</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Inicio</a>
        </li>
        <li class="breadcrumb-item active"> <strong>Tradiciones </strong></li>
      </ol>
      <div style="width: 100%;">
         <h3>Gastronomía</h3>
        <div class="row">
        <?php 
          require_once ("Sistema/bd/db.php");
          require_once ("Sistema/bd/conexion.php");
          $sql = "
SELECT tradicion.rating,tradicion.idTradicion,tipotradicion.nombre_T, tradicion.nombre_T, tradicion.descripcion_T,tradicion.imagen_T from tradicion,tipotradicion where tipotradicion.idTipo_T=1 AND  tradicion.TipoTradicion_idTipoTradicion=tipotradicion.idTipo_T ;";
          $query = mysqli_query($con,$sql);  
          while ($row=mysqli_fetch_array($query))
          {
          ?>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" style="height: 200px;width: 250px;" src="data:image/jpg;base64,<?php echo $row['imagen_T'];?>"></a>
                <div class="card-body" align="center">
                  <h4 class="card-title">
                    <a href="#"><?php echo $row['nombre_T'];?></a>
                  </h4>
                  <p class="card-text" align="justify" ><?php echo $row['descripcion_T'];?></p>
                </div>
                <div align="center">
                  <?php echo '
                  <form action="calificar.php" method="POST">
                    <input name="tradicion" type="hidden" value="'.$row['idTradicion'].'">
               <select name="rating"class="form-control selcls" id="gender1" style="width: 70px;">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          
        </select>         
        <br>
        <button class="btn btn-info btn-sm">Calificar</button>
                  </form>
                  <br>
                  <div    class="progress"  style="height: 25px; width:50px ;">
                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="5" style="'.$row['rating'].'">'.$row['rating'].'%</div></div>
                   ';?>
                </div>
              </div>
            </div>
        <?php
        }?>    
      </div>
      </div>
      <br><br>
      <h3>Festividades </h3>
 <div class="row">
        <?php 
          require_once ("Sistema/bd/db.php");
          require_once ("Sistema/bd/conexion.php");
          $sql = "
SELECT tradicion.rating,tradicion.idTradicion,tipotradicion.nombre_T, tradicion.nombre_T, tradicion.descripcion_T,tradicion.imagen_T from tradicion,tipotradicion where tipotradicion.idTipo_T=5 AND  tradicion.TipoTradicion_idTipoTradicion=tipotradicion.idTipo_T ;";
          $query = mysqli_query($con,$sql);  
          while ($row=mysqli_fetch_array($query))
          {
          ?>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" style="height: 200px;width: 250px;" src="data:image/jpg;base64,<?php echo $row['imagen_T'];?>"></a>
                <div class="card-body" align="center">
                  <h4 class="card-title">
                    <a href="#"><?php echo $row['nombre_T'];?></a>
                  </h4>
                  <p class="card-text" align="justify" ><?php echo $row['descripcion_T'];?></p>
                </div>
                <div align="center">
                  <?php echo '
                  <form action="calificar.php" method="POST">
                    <input name="tradicion" type="hidden" value="'.$row['idTradicion'].'">
                   <button class="btn btn-info">Calificar</button>
                   <select name="rating">
                     <option>1</option>
                     <option>2</option>
                     <option>3</option>
                     <option>4</option>
                     <option>5</option>
                   </select>
                 
                  </form>
                  <div    class="progress"  style=" width: 50%;">
                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow=""aria-valuemin="1" aria-valuemax="5" style="'.$row['rating'].'">'.$row['rating'].'%</div></div>
                   ';?>
                </div>
              </div>
            </div>
        <?php
        }?>    
      </div>
      <h3>Artesanías </h3>
 <div class="row">
        <?php 
          require_once ("Sistema/bd/db.php");
          require_once ("Sistema/bd/conexion.php");
          $sql = "
SELECT tradicion.rating,tradicion.idTradicion,tipotradicion.nombre_T, tradicion.nombre_T, tradicion.descripcion_T,tradicion.imagen_T from tradicion,tipotradicion where tipotradicion.idTipo_T=6 AND  tradicion.TipoTradicion_idTipoTradicion=tipotradicion.idTipo_T ;";
          $query = mysqli_query($con,$sql);  
          while ($row=mysqli_fetch_array($query))
          {
          ?>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" style="height: 200px;width: 250px;" src="data:image/jpg;base64,<?php echo $row['imagen_T'];?>"></a>
                <div class="card-body" align="center">
                  <h4 class="card-title">
                    <a href="#"><?php echo $row['nombre_T'];?></a>
                  </h4>
                  <p class="card-text" align="justify" ><?php echo $row['descripcion_T'];?></p>
                </div>
                <div align="center">
                  <?php echo '
                  <form action="calificar.php" method="POST">
                    <input name="tradicion" type="hidden" value="'.$row['idTradicion'].'">
                   <button class="btn btn-info">Calificar</button>
                   <select name="rating">
                     <option>1</option>
                     <option>2</option>
                     <option>3</option>
                     <option>4</option>
                     <option>5</option>
                   </select>
                 
                  </form>
                  <div    class="progress"  style=" width: 50%;">
                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow=""aria-valuemin="1" aria-valuemax="5" style="'.$row['rating'].'">'.$row['rating'].'%</div></div>
                   ';?>
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
    <style type="text/css" media="screen">
      <style>
  .star-rating a {
  float: right;
  color: #95a5a6; /* gris (normal) */
}
  .star-rating a:hover {
    color: #f39c12; /* amarillo (seleccionado) */
  }
  .star-rating a:hover ~ a {
    color: #f39c12; /* amarillo (seleccionado) */
  }
</style>
    </style>

  </body>

</html>