
<style>
	.arrow-icon {
		margin-left: auto; /* Alinear la flecha a la derecha */
		transition: transform 0.63s ease !important; /* Animación suave para el cambio de dirección */
    	float: right;
	}

	.submenu {
		display: none; /* Ocultar el submenú por defecto */
		list-style-type: none; /* Eliminar viñetas */
		padding: 0; /* Eliminar padding */
		margin: 0; /* Eliminar margin */
		opacity: 0; /* Opacidad inicial en 0 */
		transition: opacity 0.3s ease  !important; /* Transición suave para la opacidad */
		height: 0; /* Altura inicial en 0 para el efecto de colapso */
		overflow: hidden; /* Ocultar el contenido desbordante */
	}

	.submenu.show {
		display: block; /* Mostrar el submenú */
		opacity: 1; /* Opacidad completa */
		height: auto; /* Permitir que el contenido se ajuste automáticamente */
    	transition: transform 0.3s ease;
	}

	.submenu li {
		padding: 5px 10px; /* Espaciado para los elementos del submenú */
	}

	.submenu li a {
		text-decoration: none; /* Eliminar subrayado de los enlaces */
		color: #333; /* Color del texto */
	}

	.submenu li a:hover {
		color: #5fd4feef !important; /* Color al pasar el ratón sobre el enlace */
	}

	/* Clase para rotar la flecha al abrir el menú */
	.active-arrow {
		transform: rotate(90deg); /* Rotar la flecha 90 grados */
    	transition: transform 0.3s ease;
	}

</style>
		<aside class="fixed skin-6">
			<div class="sidebar-inner scrollable-sidebar">
				<div class="size-toggle">
					<a class="btn btn-sm" id="sizeToggle">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="btn btn-sm pull-right logoutConfirm_open"  href="../#logoutConfirm" title="Cerrar Sesion">
						<i class="fa fa-power-off"></i>
					</a>
				</div><!-- /size-toggle -->	
				<div class="user-block clearfix">
					 <div class="detail">
						<strong class="nombre-Usuario">Nombre Usuario</strong>
						<ul class="list-inline">
							<li><a href="../profile.html">Perfil</a></li>
							 
						</ul>
					</div>
				</div><!-- /user-block -->
				 
				<div class="main-menu">
					<ul>
						<li class="active" id="menuHome">
							<a  href="index.html"  >
								<span class="menu-icon">
									<i class="fa fa-dashboard fa-lg"></i> 
								</span>
								<span class="text">
									Inicio
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li class="" id="menuLibro">
							<a  href="#" class="menu-item" >
								<span class="menu-icon">
									<i class="fa fa-book fa-lg"></i> 
								</span>
								<span class="text">
									Libro de Pacientes &nbsp;
								</span>
								<span class="arrow-icon">
									<i class="fa fa-chevron-right"></i> <!-- Flecha a la derecha -->
								</span>
								<span class="menu-hover"></span>
							</a>
							<ul class="submenu">
								<li><a href="../redir.php?rut=registrarPaciente">Registrar</a></li>
								<li><a href="../redir.php?rut=IDeditPaciente">Identificación</a></li>
								<li><a href="../redir.php?rut=libroPacientes">Listar</a></li>
								<li><a href="../redir.php?rut=consultaMultiple">Consulta Multiple</a></li>
								<li><a href="../redir.php?rut=circular007">Consulta Libro de Pacientes Circular 007</a></li>
							</ul>
						</li>
						<li class="" id="menuSintomaticos">
							<a href="#" class="menu-item">
								<span class="menu-icon">
									<i class="fa fa-heart fa-lg"></i> 
								</span>
								<span class="text">
									Sintomaticos Respiratorios
								</span>
								<span class="arrow-icon">
									<i class="fa fa-chevron-right"></i> <!-- Flecha a la derecha -->
								</span>
								<span class="menu-hover"></span>
							</a>
							<ul class="submenu">
								<li><a href="../redir.php?rut=registroSintomaticoRespiratorio">Registrar</a></li>
								<li><a href="../redir.php?rut=consultaSintomaticoRespiratorio">Consultar nombre/identificación</a></li> 
							</ul>
						</li>
						<li class="" id="menuQuimioprofilaxis">
							<a  href="#" class="menu-item">
								<span class="menu-icon">
									<i class="fa fa-flask fa-lg"></i> 
								</span>
								<span class="text">
									QuimioProfilaxis
								</span>
								<span class="arrow-icon">
									<i class="fa fa-chevron-right"></i> <!-- Flecha a la derecha -->
								</span>
								<span class="menu-hover"></span>
							</a>
							<ul class="submenu">
								<li><a href="../redir.php?rut=registroQuimioprofilaxis">Registrar</a></li>
								<li><a href="../redir.php?rut=consultaQuimioprofilaxis">Consultar nombre/identificación</a></li> 
								<li><a href="../redir.php?rut=consultaMultipleQuimioprofilaxis">Consultar multiple</a></li> 
								<li><a href="../redir.php?rut=Quimioprofilaxis007">Libro de Quimioprofilaxis circular 007</a></li>  
							</ul>
						</li>
						<li class="" id="menuResistentes">
							<a  href="#" class="menu-item">
								<span class="menu-icon">
									<i class="fa fa-leaf fa-lg"></i> 
								</span>
								<span class="text">
									Resistente a<br>Farmacos
								</span>
								<span class="arrow-icon">
									<i class="fa fa-chevron-right"></i> <!-- Flecha a la derecha -->
								</span>
								<span class="menu-hover"></span>
							</a>
							<ul class="submenu">
								<li><a href="../redir.php?rut=registroFarmacoResitente">Registrar</a></li>
								<li><a href="../redir.php?rut=consultaResitentes">Consultar nombre/identificación</a></li> 
							</ul>
						</li>
						<li  id="menuFarmacia">
						    <a href="#" class="menu-item">
						        <span class="menu-icon">
						            <i class="fa fa-magic fa-lg"></i>
						        </span>
						        <span class="text">Farmacia</span>
						        <span class="arrow-icon"><i class="fa fa-chevron-right"></i></span>
						    </a>
						    <ul class="submenu">
						        <li>
						            <a href="#" class="submenu-item">
						                Medicamentos
						                <span class="arrow-icon"><i class="fa fa-chevron-right"></i></span>
						            </a>
						            <ul class="submenu">
						                <li><a href="../redir.php?rut=registrarMedicamento">Registrar</a></li>
						                <li><a href="../redir.php?rut=listadoMedicamentos">Listar</a></li>
						                <li><a href="../redir.php?rut=descarteMedicamentos">Descartar</a></li>
						            </ul>
						        </li>
						        <li>
						            <a href="#" class="submenu-item">
						                Autorización
						                <span class="arrow-icon"><i class="fa fa-chevron-right"></i></span>
						            </a>
						            <ul class="submenu">
						                <li><a href="../redir.php?rut=registrarAutorizacion">Registrar</a></li>
						                <li><a href="../redir.php?rut=busquedaAutorizacion">Búsqueda y modificación</a></li>
						                <li><a href="../redir.php?rut=descargaAutorizacion">Descarga de autorizaciones por listado</a></li>
						                <li><a href="../redir.php?rut=listadoAutorizacion">Listado de autorizaciones</a></li>
						            </ul>
						        </li>
						        <li>
						            <a href="#" class="submenu-item">
						                STOCK
						                <span class="arrow-icon"><i class="fa fa-chevron-right"></i></span>
						            </a>
						            <ul class="submenu">
						                <li><a href="../redir.php?rut=registrarStock">Registro</a></li>
						                <li><a href="../redir.php?rut=descargaStock">Descarga</a></li>
						                <li><a href="../redir.php?rut=listadoStock">Listado</a></li>
						            </ul>
						        </li>
						    </ul>
						</li>

						<li class="" id="menuInformes"> 
							<a  href="#" class="menu-item">
								<span class="menu-icon">
									<i class="fa fa-bar-chart-o fa-lg"></i> 
								</span>
								<span class="text">
									Informes
								</span>
								<span class="arrow-icon">
									<i class="fa fa-chevron-right"></i> <!-- Flecha a la derecha -->
								</span>
								<span class="menu-hover"></span>
							</a>
							<ul class="submenu">
								<li><a href="../redir.php?rut=informeTrimestralCasosTb">Casos de actividades tuberculosis</a></li>  
							</ul>
						</li>
						<li class="" id="menuAdmin"> 
							<a  href="#"  class="menu-item" >
								<!--<a  href="#" data-toggle="modal" data-target="#servidor-modal" >-->
								<span class="menu-icon">
									<i class="fa fa-cog fa-lg"></i> 
								</span>
								<span class="text">
									Administración
								</span>
								<span class="arrow-icon">
									<i class="fa fa-chevron-right"></i> <!-- Flecha a la derecha -->
								</span>
								<span class="menu-hover"></span>
							</a>
							<ul class="submenu">
								<li><a href="../redir.php?rut=usuarios">Usuarios</a></li>
								<li><a href="../redir.php?rut=listarIPS">Administrar IPS</a></li> 
							</ul>
						</li> 
					</ul>
					
					<div class="alert alert-info">
						Bienvenido a SISTB. 
					</div>
				</div><!-- /main-menu -->
			</div><!-- /sidebar-inner -->
		</aside>
