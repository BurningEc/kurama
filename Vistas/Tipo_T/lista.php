<?php
    session_start();
  if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
    exit;
    }
?>
<?php include("../Home/Inicio.php");?>
<div class="container-fluid">          
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../Home/Home.php">Administración</a>
    </li>
    <li class="breadcrumb-item active">Tipo de Terapia</li>
  </ol>
   <a href="crear.php" class="btn btn-warning" ><i class="fas fa-plus"> Agregar</i></a>
  <br>
  <br>
    <section>
      <table class="table">      
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            require_once ("../../Sistema/bd/db.php");
            require_once ("../../Sistema/bd/conexion.php");
            $sql = "SELECT * FROM tipotradicion";
            $query = mysqli_query($con,$sql);  
            while ($row=mysqli_fetch_array($query))
              {?>
              <tr>
                <td><?php echo $row['idTipo_T'];?></td>
                <td><?php echo $row['nombre_T'];?></td>
                <td>
                  <a class="btn btn-info" href="actualizar.php?id=<?php echo $row['idTipo_T'];?>"><i class="fas fa-cog"> Editar</i></a>
                </td>
                <td>
                  <a class="btn btn-dark" href="controlador.php?eliminar=true&id=<?php echo $row['idTipo_T'];?>"><i class="fas fa-trash-alt"> Eliminar</i></a>
                </td>
              </tr>
          <?php
            }?>
        </tbody>
      </table>
    </section>
</div>
<br>
<?php include("../Home/Fin.php");?>