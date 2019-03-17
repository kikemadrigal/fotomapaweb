<?php
require_once( "app/config.php" );
require_once( "app/Conexion.php" );
require_once( "app/ControlSesion.php" );
require_once( "app/RepositorioFotos.php" );
require_once( "app/RepositorioUsuario.php" );
require_once( "app/ObtenerUsuario.php" );


Conexion::abrir_conexion();
$conexion = Conexion::obtener_conexion();

$array = RepositorioFotos::getAllAPI( $conexion,1000 );

echo json_encode($array);
//echo var_dump($array);
	
conexion::cerrar_conexion();

?>