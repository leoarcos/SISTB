<?php

include_once '../DTO/users_DTO.php';
$user=$_POST['user'];
$pass=$_POST['pass'];

//$user="jefe";
//$pass="jefe";
$mngUser = new users_DTO();
$data = $mngUser->LogIn(strtoupper($user),strtoupper($pass));
 
if($data['STATUS']=="OK"){
	$datosUsuarios=$data['DATA'][0];
	$datosPermisos=[];

	//echo json_encode($data['DATA'][0]); 
	for($i=0;$i<count($data['DATA']);$i++){ 
		
		if($data['DATA'][$i]['evento']=='1'){
			
			$datosPermisos['libropacientes']['permiso']=$data['DATA'][$i]['pevento'];
			$datosPermisos['libropacientes']['agregar']=$data['DATA'][$i]['agregar'];
			$datosPermisos['libropacientes']['modificar']=$data['DATA'][$i]['modificar'];
			$datosPermisos['libropacientes']['eliminar']=$data['DATA'][$i]['eliminar'];
			$datosPermisos['libropacientes']['consultar']=$data['DATA'][$i]['consultar'];
		}
		if($data['DATA'][$i]['evento']=='2'){ 

			$datosPermisos['quimioprofilaxis']['permiso']=$data['DATA'][$i]['pevento'];
			$datosPermisos['quimioprofilaxis']['agregar']=$data['DATA'][$i]['agregar'];
			$datosPermisos['quimioprofilaxis']['modificar']=$data['DATA'][$i]['modificar'];
			$datosPermisos['quimioprofilaxis']['eliminar']=$data['DATA'][$i]['eliminar'];
			$datosPermisos['quimioprofilaxis']['consultar']=$data['DATA'][$i]['consultar'];
		}
		if($data['DATA'][$i]['evento']=='3'){
			
			$datosPermisos['resitentefarmacos']['permiso']=$data['DATA'][$i]['pevento'];
			$datosPermisos['resitentefarmacos']['agregar']=$data['DATA'][$i]['agregar'];
			$datosPermisos['resitentefarmacos']['modificar']=$data['DATA'][$i]['modificar'];
			$datosPermisos['resitentefarmacos']['eliminar']=$data['DATA'][$i]['eliminar'];
			$datosPermisos['resitentefarmacos']['consultar']=$data['DATA'][$i]['consultar'];
		}
		if($data['DATA'][$i]['evento']=='4'){
			
			$datosPermisos['laboratorio']['permiso']=$data['DATA'][$i]['pevento'];
			$datosPermisos['laboratorio']['agregar']=$data['DATA'][$i]['agregar'];
			$datosPermisos['laboratorio']['modificar']=$data['DATA'][$i]['modificar'];
			$datosPermisos['laboratorio']['eliminar']=$data['DATA'][$i]['eliminar'];
			$datosPermisos['laboratorio']['consultar']=$data['DATA'][$i]['consultar'];
		}
		if($data['DATA'][$i]['evento']=='5'){
			
			$datosPermisos['sintomaticorespiratorio']['permiso']=$data['DATA'][$i]['pevento'];
			$datosPermisos['sintomaticorespiratorio']['agregar']=$data['DATA'][$i]['agregar'];
			$datosPermisos['sintomaticorespiratorio']['modificar']=$data['DATA'][$i]['modificar'];
			$datosPermisos['sintomaticorespiratorio']['eliminar']=$data['DATA'][$i]['eliminar'];
			$datosPermisos['sintomaticorespiratorio']['consultar']=$data['DATA'][$i]['consultar'];
		}
		if($data['DATA'][$i]['evento']=='6'){
			
			$datosPermisos['farmacia']['permiso']=$data['DATA'][$i]['pevento'];
			$datosPermisos['farmacia']['agregar']=$data['DATA'][$i]['agregar'];
			$datosPermisos['farmacia']['modificar']=$data['DATA'][$i]['modificar'];
			$datosPermisos['farmacia']['eliminar']=$data['DATA'][$i]['eliminar'];
			$datosPermisos['farmacia']['consultar']=$data['DATA'][$i]['consultar'];
		}
		if($data['DATA'][$i]['evento']=='7'){
			
			$datosPermisos['ips']['permiso']=$data['DATA'][$i]['pevento'];
			$datosPermisos['ips']['agregar']=$data['DATA'][$i]['agregar'];
			$datosPermisos['ips']['modificar']=$data['DATA'][$i]['modificar'];
			$datosPermisos['ips']['eliminar']=$data['DATA'][$i]['eliminar'];
			$datosPermisos['ips']['consultar']=$data['DATA'][$i]['consultar'];
		}
		if($data['DATA'][$i]['evento']=='8'){
			
			$datosPermisos['informes']['permiso']=$data['DATA'][$i]['pevento'];
			$datosPermisos['informes']['agregar']=$data['DATA'][$i]['agregar'];
			$datosPermisos['informes']['modificar']=$data['DATA'][$i]['modificar'];
			$datosPermisos['informes']['eliminar']=$data['DATA'][$i]['eliminar'];
			$datosPermisos['informes']['consultar']=$data['DATA'][$i]['consultar'];
		}
		if($data['DATA'][$i]['evento']=='9'){
			
			$datosPermisos['administrativo']['permiso']=$data['DATA'][$i]['pevento'];
			$datosPermisos['administrativo']['agregar']=$data['DATA'][$i]['agregar'];
			$datosPermisos['administrativo']['modificar']=$data['DATA'][$i]['modificar'];
			$datosPermisos['administrativo']['eliminar']=$data['DATA'][$i]['eliminar'];
			$datosPermisos['administrativo']['consultar']=$data['DATA'][$i]['consultar'];
		}
		if($data['DATA'][$i]['evento']=='10'){
			
			$datosPermisos['adicionales']['permiso']=$data['DATA'][$i]['pevento'];
			$datosPermisos['adicionales']['agregar']=$data['DATA'][$i]['agregar'];
			$datosPermisos['adicionales']['modificar']=$data['DATA'][$i]['modificar'];
			$datosPermisos['adicionales']['eliminar']=$data['DATA'][$i]['eliminar'];
			$datosPermisos['adicionales']['consultar']=$data['DATA'][$i]['consultar'];
		}
		if($data['DATA'][$i]['evento']=='11'){
			
			$datosPermisos['PPD']['permiso']=$data['DATA'][$i]['pevento'];
			$datosPermisos['PPD']['agregar']=$data['DATA'][$i]['agregar'];
			$datosPermisos['PPD']['modificar']=$data['DATA'][$i]['modificar'];
			$datosPermisos['PPD']['eliminar']=$data['DATA'][$i]['eliminar'];
			$datosPermisos['PPD']['consultar']=$data['DATA'][$i]['consultar'];
		}

		
		
	   
		
	} 	
	session_start();
	$_SESSION['usuario']=$datosUsuarios;
	$_SESSION['permisos']=$datosPermisos;
	?>

	<script>localStorage.setItem("permisos", <?php echo $_SESSION['permisos']; ?> );</script>';
	<?php
	header('Location: ../src/');
	//print_r($_SESSION['usuario']);

}else{
	header('Location: ../');
}
