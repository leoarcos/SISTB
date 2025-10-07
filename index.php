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
					<form class="form-login">
						<div class="form-group">
							<label>Usuario</label>
							<input type="text" placeholder="Usuario" id="user" name="user" class="form-control input-sm bounceIn animation-delay2" >
						</div>
						<div class="form-group">
							<label>Contraseña</label>
							<input type="password" placeholder="Contraseña" id="pass" name="pass" class="form-control input-sm bounceIn animation-delay4">
						</div>
						 
		
						<div class="seperator"></div>
						 

					 

						<hr/>
							
					</form>
					<a class="btn btn-success btn-block bounceIn animation-delay5 login-link pull-right" style="font-size: 14px;cursor:pointer;color: white" href="src/index.php"><i class="fa fa-sign-in"></i> Ingresar</a>
					
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
		$("#pass").on('keyup', function (e) {
			if (e.key === 'Enter' || e.keyCode === 13) {
				// Do something
				logIn();
			}
		});
		 
		function logIn(){ 

		}
	</script>
  </body>
</html>
