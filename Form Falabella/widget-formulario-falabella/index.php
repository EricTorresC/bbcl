<?php






if(!empty($_POST)) {

	$error = false;
	$data = '';

	$nombre   = $_POST['nombre'];
	$email    = $_POST['email'];
	$telefono = $_POST['telefono'];
	$pregunta = $_POST['pregunta'];

	if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['telefono']) && !empty($_POST['pregunta'])) {

		$_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {

			$_POST['nombre'] = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
			$_POST['telefono'] = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
			$_POST['pregunta'] = filter_var($_POST['pregunta'], FILTER_SANITIZE_STRING);

			if(!empty($_POST['nombre']) && !empty($_POST['telefono']) && !empty($_POST['pregunta'])) {
				$data = "Nombre: {$_POST['nombre']}; Telefono: {$_POST['telefono']}; E-mail: {$_POST['email']}; Pregunta: {$_POST['pregunta']}";
				file_put_contents("data.txt", $data, FILE_APPEND);
			}
			else {
				$error = true;
			}
		} 
		else {
			$error = true;
		}
	}
	else {
		$error = true;
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<style type="text/css">
	table td input, table td textarea {
		width: 100%;
	}
	body{
		color: white;
		padding: 0px;
		margin-top: 0px;
		margin-bottom: 0px;
	}
	.container{
		background-color: black;
		margin: 0px;
	}
	.error {
		border:1px solid #ff0000 ;
		margin-top: 5px;
		margin-bottom: 25px;
		padding: 10px;
	}
	.success {
	    border: 1px solid #00cc00;
	    color: white;
	    margin-bottom: 25px;
	    padding: 10px;
	}
	</style>

</head>
<body>
	<div class="container">
		<div class="row mainContainer">
			<div class="col s12 m5">
				<div class="texto center-align">
				</div>
				<form action="./" method="post" id="mainForm">
					<div class="input-field">	
						<input type="text" name="nombre" id="nombre" class="validate" required="true">
						<label for="name">Nombre y apellido</label>	
					</div>
	
					<div class="input-field">
						<input type="text" name="telefono" id="telefono" class="validate" required="true">
						<label for="telephone">Teléfono</label>

						<div class="input-field">
						    <input type="email" name="email" id="email" class="validate" required="true">
						    <label for="email">Email</label>

						    <div class="input-field col s12">
						        <textarea name="pregunta" id="pregunta" class="materialize-textarea" rows="5"></textarea>
						        <label for="description">Pregunta X</label>
						    </div>

							<input type="submit" value="Enviar" class="waves-effect waves-light btn" style="margin:10px" data-delay="50" name="action">
							<?php if(!empty($_POST)): ?>
								<?php if($error): ?>
									<div class="error">Ocurrió un error al enviar el formulario, por favor intente nuevamente.</div>
								<?php else: ?>
									<div class="success">Formulario enviado con éxito.</div>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

<!-- Compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
</body>
</html>
