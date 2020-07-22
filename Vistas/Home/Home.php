<?php
    session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
		exit;
    }
?>
<?php include("Inicio.php");?>
<div align="center">
	
<h1 align="center">
       Bienvenidos a la Administración de la Pagina  
         

       
       </h1>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>

   <img src="img/kurama.jpg" alt="" class="logo"  width="650" height="350"  /> 
</div>
<?php include("Fin.php");?>
						