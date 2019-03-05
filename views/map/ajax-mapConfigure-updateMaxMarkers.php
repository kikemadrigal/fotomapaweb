<?php
	header("access-control-allow-origin: *");
	//session_start();
	require_once( "../../app/config.php" );
	require_once( "../../app/RepositorioMapConfigure.php" );
	//require_once( "../../app/ControlSesion.php" );
	require_once( "../../app/Conexion.php" );
	
	
	Conexion::abrir_conexion();
	$conexion=Conexion::obtener_conexion();
	$actualizada=RepositorioMapConfigure::updateMaxMarkers($conexion, $_GET['maxMarkers']);
	Conexion::cerrar_conexion();
	echo $actualizada;
?>