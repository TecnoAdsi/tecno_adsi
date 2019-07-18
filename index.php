<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Bienvenido</title>

	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/registro.css" />

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

	<div class="container" style="position:fixed; width:50%; height:50%; top:30%; left:50%;">
		<?php

			require('php/conexion.php');
			date_default_timezone_set("America/Bogota");

				if (isset($_REQUEST['username'])){
					$username = stripslashes($_REQUEST['username']);
					$username = mysqli_real_escape_string($con,$username);
					$pwd = stripslashes($_REQUEST['pwd']);
					$pwd = mysqli_real_escape_string($con,$pwd);
					$estado = stripslashes($_REQUEST['estado']);
					$estado = mysqli_real_escape_string($con,$estado);

					$query = "INSERT into `usuarios` (nombre_usuario, contrasena_usuario, estado_usuario) VALUES ('$username', '".md5($pwd)."', '$estado')";
					$result = mysqli_query($con,$query);

					if($result){
						echo "<div class='form'>
						<h3>El registro se realizó exitosamente.</h3>
						<br/>Click here to <a href='index.php'>Login</a></div>";
					}
				}else{				

		?>

		<div class="container">
			<div class="row">
				<h3>Registro de Usuario</h3>
			</div>

			<br><br>

			<div class="row">
				<form action="" method="POST" class="frmRegistro" role="form">
					<div class="form-group row">
						<label for="username" class="col-sm-4">Usuario</label>
						<div class="col-sm-8">
							<input type="text" name="username" id="email" class="form-control" required autofocus autocomplete="off">
						</div>
					</div>

					<div class="form-group row">
						<label for="pwd" class="col-sm-4">Contraseña</label>
						<div class="col-sm-8">
							<input type="password" name="pwd" class="form-control" required autofocus complete="off">
						</div>
					</div>

					<div class="form-group row">
						<label for="estado" class="col-sm-6">Estado de Usuario</label>
						<div class="col-sm-6">
							<select name="estado" id="estado" class="form-control" required>
								<option value="0">Desactivo</option>
								<option value="1">Activo</option>
							</select>
						</div>
					</div>

					<br>

					<div class="form-group row">
						<div class="col-sm-8">
						</div>
						<div class="col-sm-4">
							<input type="submit" class="btn btn-primary" name="ingresar" value="Ingresar">
						</div>						
					</div>
				</form>
			</div>				
		</div>

		<?php } ?>
	</div>
	

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>