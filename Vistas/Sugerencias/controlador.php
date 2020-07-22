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
		$sentencia="INSERT INTO sugerencia (nombre_S,asunto_S,correo_S,mensaje_S) VALUES ('".$_POST['nombre']."', '".$_POST['asunto']."', '".$_POST['correo']."', '".$_POST['mensaje']."')";
		if(mysqli_query($con,$sentencia)){
			header("Location:lista.php");	
		}
	}
	if($_POST['ver']=="crearUs"){ 
		$sentencia="INSERT INTO sugerencia (nombre_S,asunto_S,correo_S,mensaje_S) VALUES ('".$_POST['nombre']."', '".$_POST['asunto']."', '".$_POST['correo']."', '".$_POST['mensaje']."')";
		if(mysqli_query($con,$sentencia)){
			header("Location:../../sugerencia.php");	
		}
	}
	if($_POST['ver']=="modificar"){
		$sentencia="UPDATE sugerencia SET  nombre_S='".$_POST['nombre']."', asunto_S='".$_POST['asunto']."', correo_S= '".$_POST['correo']."', mensaje_S='".$_POST['mensaje']."' WHERE idSugerencia='".$_POST['id']."' ";
		if(mysqli_query($con,$sentencia)){
			header("Location:lista.php");	
		}
	}
	if(isset($_GET["eliminar"])){	
	    $sentencia="DELETE  FROM  sugerencia  WHERE idSugerencia=".$_GET['id']."";
		mysqli_query($con,$sentencia); 
		header("Location:lista.php");	
	}
?>