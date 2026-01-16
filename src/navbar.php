<?php

    session_start();
?>
		<div id="top-nav" class="fixed skin-6">
			<a href="../#" class="brand">
				<span>SISTB</span>
				
			</a><!-- /brand -->					
			<button type="button" class="navbar-toggle pull-left" id="sidebarToggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<button type="button" class="navbar-toggle pull-left hide-menu" id="menuToggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<ul class="nav-notification clearfix">
				 
				<li class="profile dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="../#">
						<strong class="nombre-Usuario"><?php echo $_SESSION['usuario'][0]['nombres'].' '.$_SESSION['usuario'][0]['apellidos']; ?></strong>
						<span><i class="fa fa-chevron-down"></i></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a class="clearfix" href="../#">
								 <div class="detail">
									<strong class="nombre-Usuario"><?php echo $_SESSION['usuario'][0]['nombres'].' '.$_SESSION['usuario'][0]['apellidos']; ?></strong>
									<p class="grey" id="profesion-Usuario"><?php echo $_SESSION['usuario'][0]['cargo']; ?></p> 
								</div>
							</a>
						</li>
						<li><a tabindex="-1" href="../profile.html" class="main-link"><i class="fa fa-edit fa-lg"></i> Perfil</a></li>
						 <li class="divider"></li>
						<li><a tabindex="-1" class="main-link logoutConfirm_open" href="../#logoutConfirm"><i class="fa fa-lock fa-lg"></i> Cerrar Sesion</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /top-nav-->
		<!-- Logout confirmation -->
	<div class="custom-popup width-100" id="logoutConfirm">
		<div class="padding-md">
			<h4 class="m-top-none">Seguro de cerrar sesión?</h4>
		</div>

		<div class="text-center">
			<a class="btn btn-success m-right-sm" href="#" onclick="Javascript:localStorage.removeItem('user'); window.location.href='../index.html'">Cerrar sesión</a>
			<a class="btn btn-danger logoutConfirm_close">Cancelar</a>
		</div>
	</div>
		<script>

		</script>