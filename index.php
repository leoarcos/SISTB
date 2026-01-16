<?php

    session_start();
    if(!isset($_SESSION['usuario'])){
       
        echo "<script>console.log('session no iniciada');</script>";
    }else{
        header('Location: src/ ');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SISTB - Inicio de sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
 
    <!-- Bootstrap core CSS -->
	
	
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap4/dist/css/bootstrap.min.css">
	
	<!-- Font Awesome -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	
	<!-- Perfect -->
	<link href="css/app.min.css" rel="stylesheet">
	<style>
                    
            html {
            background-color: #56baed;
            }

            body {
            font-family: "Poppins", sans-serif;
            height: 100vh;
            background: url(img/fondotb.jpg) no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
	</style>

  </head>

  <body>
	<div class="login-wrapper">
		<div class="text-center">
			<h2 class="fadeInUp animation-delay8" style="font-weight:bold">
				<span >SISTB</span>
			</h2>
		</div>
		<div class="login-widget animation-delay1">	
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<div class="pull-left">
						<i class="fa fa-lock fa-lg"></i> Inicio de Sesion
					</div>
 
				</div>
				<div class="panel-body">
					<!--API/servicios/logIn.php-->
					<form class="form-login" action="Javascript: logIn();" method="POST">
						<div class="form-group">
							<label>Usuario</label>
							<input type="text" placeholder="Usuario" id="user" name="user" class="form-control input-sm bounceIn animation-delay2" required>
						</div>
						<div class="form-group">
							<label>Contraseña</label>
							<input type="password" placeholder="Contraseña" id="pass" name="pass" class="form-control input-sm bounceIn animation-delay4" required>
						</div>
						 
		
						<div class="seperator"></div>
						 

					 

						<hr/>
					<button class="btn btn-success btn-block bounceIn animation-delay5 login-link pull-right" style="font-size: 14px;cursor:pointer;color: white" type="submit"><i class="fa fa-sign-in"></i> Ingresar</button>
							
					</form>
					
				</div>
			</div><!-- /panel -->
		</div><!-- /login-widget -->
	</div><!-- /login-wrapper -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <!-- Jquery -->
	<script src="js/jquery-1.10.2.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
   
	<!-- Modernizr -->
	<script src='js/modernizr.min.js'></script>
   
    <!-- Pace -->
	<script src='js/pace.min.js'></script>
   
	<!-- Popup Overlay -->
	<script src='js/jquery.popupoverlay.min.js'></script>
   
    <!-- Slimscroll -->
	<script src='js/jquery.slimscroll.min.js'></script>
   
	<!-- Cookie -->
	<script src='js/jquery.cookie.min.js'></script>

	<!-- Perfect -->
	<script src="js/app/app.js"></script>
	<script> 
		let env;
		$(function	()	{
			fetchData(); 
		});
		$("#pass").on('keyup', function (e) {
			if (e.key === 'Enter' || e.keyCode === 13) {
				// Do something
				logIn();
			}
		});
		async function fetchData(){
			//enviroments
			try {
				const response = await fetch('src/json/enviroments.json'); // Reemplaza con la ruta a tu archivo JSON
				
				if (!response.ok) {
				throw new Error('Error al cargar el archivo JSON'); // Manejo de errores si la respuesta no es ok
				}

				env = await response.json(); // Convierte la respuesta a JSON
				console.log(env); // Aquí puedes trabajar con los datos JSON
			} catch (error) {
				console.error('Error DPTOS:', error); // Manejo de errores
			}

		}

		 
		async function logIn(){ 
			console.log('login');
		 
			console.log(window.location.pathname);
			//window.location.href=window.location.pathname+'src/index.php';
			data={
				email: document.getElementById('user').value,
				password: document.getElementById('pass').value
			}
			let dataSend={ key: env.key, data };
			console.log(dataSend);
			try {
				const respuesta = await fetch(env.url_api+'servicios/logIn.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json' // Indica que estás enviando JSON
				},
				body: JSON.stringify(dataSend)
				});

				if (!respuesta.ok) {
				throw new Error(`Error HTTP: ${respuesta.status}`);
				}

				const resultado = await respuesta.json(); // Si el servidor responde con JSON
				console.log('Respuesta del servidor:', resultado);
				if(resultado.STATUS=='OK' ){
					if(resultado.DATA){
						alert('usuario loggeado!..'); 
						//ALMACENAR EN $_SESSION php
						 // Enviar los datos al servidor para guardarlos en sesión
						try {
							await fetch(env.url_api + 'servicios/guardarSession.php', {
								method: 'POST',
								headers: { 'Content-Type': 'application/json' },
								body: JSON.stringify({ data: resultado.DATA }),
								credentials: 'include' // 🔸 MUY IMPORTANTE para enviar cookies de sesión
							});
							ee={token: resultado.TOKEN, data: resultado.DATA[0]};
							console.log(ee);
							localStorage.setItem('user', JSON.stringify(ee));
							window.location.href='src/';
						 
						 } catch (error) {
							alert('Error en la petición AL GURADAR USUARIO:', error);
							
						 }
						
					}else{

						alert('usuario y/o contraseña erroneo(s)!..'); 
					}

				}else{
					alert('Error al loggear el usuario!..')
				}

			} catch (error) {
				alert('Error en la petición:', error);
			}
		}
	</script>
  </body>
</html>
