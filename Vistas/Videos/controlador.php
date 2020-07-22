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
	    $nombreimg=$_FILES['foto']['name'];
	    $tem=$_FILES['foto']['tmp_name'];
	    $ruta=file_get_contents($tem);
	    $ruta=base64_encode($ruta);
		$sentencia="INSERT INTO videos (Parroquia_idParroquia,nombre_V,link_V,imagen_V) VALUES (".$_POST['parroquia'].", '".$_POST['nombre']."', '".$_POST['link']."', '".$ruta."')";
		if(mysqli_query($con,$sentencia)){
			header("Location:lista.php");	
		}
	}
	if($_POST['ver']=="modificar"){
		$nombreimg=$_FILES['foto']['name'];
	    $tem=$_FILES['foto']['tmp_name'];
	    $ruta=file_get_contents($tem);
	    $ruta=base64_encode($ruta);
		$sentencia="UPDATE videos SET  Parroquia_idParroquia='".$_POST['parroquia']."', nombre_V='".$_POST['nombre']."', link_V= '".$_POST['link']."', imagen_V='".$ruta."' WHERE idVideos='".$_POST['id']."' ";
		if(mysqli_query($con,$sentencia)){
			header("Location:lista.php");	
		}
	}
	if(isset($_GET["eliminar"])){	
	    $sentencia="DELETE  FROM videos WHERE idVideos=".$_GET['id']."";
		mysqli_query($con,$sentencia); 
		header("Location:lista.php");	
	}
?>