<?php
    session_start();
  if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
    exit;
    }
?>

<?php
  $consulta=Consultar($_GET['id']);
  function Consultar($id)
  {
    require_once ("../../Sistema/bd/db.php");
    require_once ("../../Sistema/bd/conexion.php");
    $sentencia="SELECT * FROM parroquia WHERE idParroquia='".$id."' ";
    $resultado=mysqli_query($con,$sentencia);
    $filas=mysqli_fetch_assoc($resultado);
    return [
      $filas['idParroquia'],
      $filas['nombre_P'],
      $filas['cedula'],
      $filas['direccion'],
      $filas['edad'],
      $filas['correo']

    ];
  }
?>
<?php include("../Home/Inicio.php");?>
<div class="container-fluid">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../Home/Home.php">Administración</a>
            </li>
            <li class="breadcrumb-item active">Pacientes</li>
          </ol>
<form action="controlador.php" method="POST" name="form" enctype="multipart/form-data" >
      
      <input class="form-control" type="hidden" name="ver" value="modificar">
      <input class="form-control" type="hidden" name="id" value="<?php echo $_GET['id'];?>">
      <div class="form-group row" >
        <legend  style="font-size: 18pt"><b>Registro</b></legend>
        <label for="inputEmail3" class="col-sm-2 col-form-label">Parroquia</label>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-10">
          <input type="text" name="nombre" value="<?php echo $consulta[1]?>" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Cédula:</label>
        <div class="col-sm-10">
          <input type="text" name="cedula" value="<?php echo $consulta[2]?>" required>
        </div>
      </div>
        <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Dirección:</label>
        <div class="col-sm-10">
          <input type="text" name="direccion" value="<?php echo $consulta[3]?>" required>
        </div>
      </div>
        <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Edad:</label>
        <div class="col-sm-10">
          <input type="text" name="edad" value="<?php echo $consulta[4]?>" required>
        </div>
      </div>
  <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Correo:</label>
        <div class="col-sm-10">
          <input type="text" name="correo" value="<?php echo $consulta[5]?>" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Imagen:</label>
        <div class="col-sm-10">
          <input type="file" name="foto" required>
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