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
    $sentencia="SELECT * FROM tipotradicion WHERE idTipo_T='".$id."' ";
    $resultado=mysqli_query($con,$sentencia);
    $filas=mysqli_fetch_assoc($resultado);
    return [
      $filas['idTipo_T'],
      $filas['nombre_T']
    ];
  }
?>
<div class="container-fluid">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../Home/Home.php">Administración</a>
            </li>
            <li class="breadcrumb-item active">Tipo de Terapia</li>
          </ol>
<form action="controlador.php" method="POST" name="form">
      
      <input class="form-control" type="hidden" name="ver" value="modificar">
      <input class="form-control" type="hidden" name="id" value="<?php echo $_GET['id'];?>">

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-10">
          <input type="text" name="nombre" value="<?php echo $consulta[1]?>" required>
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