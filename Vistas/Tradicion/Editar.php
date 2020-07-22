<?php
    session_start();
  if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
    exit;
    }
?>
<?php
  require_once ("../../Sistema/bd/db.php");
  require_once ("../../Sistema/bd/conexion.php");
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
            $response.="<td><a class='btn btn-warning' href='actualizar.php?id=".$row1['idTradicion']."'>Editar</a></td>";
            $response.="<td><a class='btn btn-danger' href='controlador.php?eliminar=true&id=".$row1['idTradicion']."'>Eliminar</a></td>";
            $response.="</tr>";    
          }
      }            
    exit($response);
  }
?>
<script type="text/javascript">
    function lista(){
    var query = $("#searchBox").val();
      $.ajax(
      {
        url: 'lista.php',
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
<?php include("../Home/Inicio.php");?>
<div class="container-fluid">          
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../Home/Home.php">Administración</a>
    </li>
    <li class="breadcrumb-item active">Historial</li>
  </ol>
  <div style="width: 100%;">
  <a href="crear.php" class="btn btn-info" >Agregar</a>
  <a href="javascript:lista()" class="btn btn-info"  style="float: right;">Buscar</a>
  <select id="searchBox" style="width: 350px;float: right;margin-right: 20px;" name="parroquia" class="form-control" required>
            <?php
              $sql = "SELECT * FROM parroquia";
              $query = mysqli_query($con,$sql);  
              while ($row=mysqli_fetch_array($query))
                {
                ?>
                <option value="<?php echo $row['idParroquia'];?>"><?php echo $row['nombre_P'];?></option>
            <?php
                }?>
  </select>
  </div>
  <br>
  <br>
    <section>
      <table class="table">      
        <thead>
          <tr>
            <th>Id</th>
            <th>Parroquia</th>
            <th>Tipo</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Imagen</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody id="tradicion_lista">
          
        </tbody>
      </table>
    </section>


</div>
<br>
<?php include("../Home/Fin.php");?>