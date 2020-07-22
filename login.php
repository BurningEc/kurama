<?php
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("Sistema/Session/password_compatibility_library.php");
}
require_once ("Sistema/bd/db.php");
require_once("Sistema/Session/Login.php");
$login = new Login();
if ($login->isUserLoggedIn() == true) {
   header("location: Vistas/Home/Home.php");
} else {

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Static/Login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Static/Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Static/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Static/Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Static/Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Static/Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Static/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="Static/Login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">

		<div class="container-login100">

			<div class="wrap-login100">

				<div class="login100-pic js-tilt" data-tilt>

					<img src="Static/Login/images/kurama.jpg" alt="IMG" width="650" height="330">
				</div>

				<form  method="post" action="login.php">
					<h3 align="center"><strong>Administrador </strong></h3>
					<br>
					<div class="form-group">
					    <label for="username">Correo</label>
						<input type="text" class="form-control" name="user_name" id="user_name" required>
					</div>
					<div class="form-group">
						<label for="password">Contraseña</label>
						<input type="password" name="user_password" id="user_password" class="form-control" required>
					</div>
					<br>
					<button type="submit" class="btn btn-primary btn-block" name="login">Iniciar Sesión</button>
				</form>
           </div>
		</div>
	</div>

<!--===============================================================================================-->	
	<script src="Static/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Static/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="Static/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Static/Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Static/Login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="Static/Login/js/main.js"></script>

</body>
</html>
<?php
}
?>
	