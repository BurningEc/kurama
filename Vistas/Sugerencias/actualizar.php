<?php
    session_start();
  if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
    exit;
    }
?>
<?php include("../Home/Inicio.php");?>
<?php
  $consulta=Consultar($_GET['id']);
  function Consultar($id)
  {
    require_once ("../../Sistema/bd/db.php");
    require_once ("../../Sistema/bd/conexion.php");
    $sentencia="SELECT * FROM sugerencia  WHERE idSugerencia='".$id."' ";
    $resultado=mysqli_query($con,$sentencia);
    $filas=mysqli_fetch_assoc($resultado);
    return [
      $filas['idSugerencia'],
      $filas['nombre_S'],
      $filas['asunto_S'],
      $filas['correo_S'],
      $filas['mensaje_S']
    ];
  }
?>
<div class="container-fluid">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../Home/Home.php">Administración</a>
            </li>
            <li class="breadcrumb-item active">Sugerencias</li>
          </ol>
<form action="controlador.php" method="POST" name="form" enctype="multipart/form-data" >
      
      <input class="form-control" type="hidden" name="ver" value="modificar">
      <input class="form-control" type="hidden" name="id" value="<?php echo $_GET['id'];?>">

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-10">
          <input type="text" name="nombre" value="<?php echo $consulta[1]?>" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Asunto:</label>
        <div class="col-sm-10">
          <input type="text" name="asunto" value="<?php echo $consulta[2]?>" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Correo:</label>
        <div class="col-sm-10">
          <input type="email" name="correo" value="<?php echo $consulta[3]?>" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Mensaje:</label>
        <div class="col-sm-10">
          <input type="text" name="mensaje" value="<?php echo $consulta[4]?>" required>
        </div>
      </div>

      <div class="form-group row" align="center">
        <div class="col-sm-10">
        <input  class="btn btn-warning" type="submit" name="submit" value="Registrar"/>
        </div>
      </div>

</form>
</div>
<?php include("../Home/Fin.php");?>