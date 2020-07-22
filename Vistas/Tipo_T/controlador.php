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
	   
    if($_POST['ver']=="crear"){ 
		$sentencia="INSERT INTO tipotradicion (nombre_T) VALUES ('".$_POST['nombre']."')";
		if(mysqli_query($con,$sentencia)){
			header("Location:lista.php");	
		}
	}
	if($_POST['ver']=="modificar"){
		$sentencia="UPDATE tipotradicion SET  nombre_T='".$_POST['nombre']."' WHERE idTipo_T='".$_POST['id']."' ";
		if(mysqli_query($con,$sentencia)){
			header("Location:lista.php");	
		}
	}
	if(isset($_GET["eliminar"])){	
	    $sentencia="DELETE  FROM tipotradicion WHERE idTipo_T=".$_GET['id']."";
		mysqli_query($con,$sentencia); 
		header("Location:lista.php");	
	}
?>