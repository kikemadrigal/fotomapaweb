<?php


//Echamos al usuario que ya ha iniciado sesion
/*if(ControlSesion::comprobar_sesion_iniciada()){
	header('Location: '.RUTA_HOME);
	echo "Sesion ya iniciada-->".session_id().", <a href=".RUTA_SERVER.">Volver</a>";
	die();
}*/

Conexion::abrir_conexion();
$conexion = Conexion::obtener_conexion();
$usuario=RepositorioUsuario::obtener_usuario_por_nombre($conexion, $_POST['name']);
$array=["nombre"=>$_POST['name'], "password"=>$_POST['password']];
$cadena=$usuario->getNombre();
echo json_encode($cadena);
Conexion::cerrar_conexion();


?>