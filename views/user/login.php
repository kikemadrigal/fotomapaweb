<?php
session_start();
//Archivos necesarios para trabajar:
require_once( "app/config.php" );
require_once( "app/Conexion.php" );
require_once( "app/ValidacionesFormularioLoginUsuario.php" );
require_once( "app/RepositorioUsuario.php" );
require_once( "app/RepositorioUserMessages.php");
require_once( "app/Usuario.php" );
require_once( "app/ControlSesion.php" );

//Echamos al usuario que ya ha iniciado sesion
if(ControlSesion::comprobar_sesion_iniciada()){
	header('Location: '.RUTA_HOME);
	echo "Sesion ya iniciada-->".session_id().", <a href=".RUTA_SERVER.">Volver</a>";
	die();
}

//Si pulsa el botón se crea el validador
if ( isset( $_POST[ 'botonFormularioLogin' ] ) ) {
	Conexion::abrir_conexion();
	$validarLogin = new ValidacionesFormularioLoginUsuario( Conexion::obtener_conexion(), $_POST[ 'nombreusuario' ], $_POST[ 'claveusuario' ] );
	if($validarLogin->registroValido()){
		$usuario=RepositorioUsuario::obtener_usuario_por_nombre(Conexion::obtener_conexion(), $validarLogin->getNombre());
		ControlSesion::abrir_sesion($usuario);
		Conexion::cerrar_conexion();
		//$mensaje="El ".$_SESSION['tipo'].": ".$_SESSION['nombre']." ha iniciado sesión";
		//RepositorioUserMessages::stored(Conexion::obtener_conexion(),$mensaje, $validarLogin->getNombre());
		echo "<script type='text/javascript'>location.href='".RUTA_HOME."'</script>";
		/*echo "sesion abierta para ".$_SESSION['nombre'].", ".$_SESSION['tipo'];
		if(ControlSesion::comprobar_sesion_iniciada())
			{
				echo "<br>sesion iniciada"; 
			}else{
				echo "sesion no iniciada"; 
			}*/
		die();
	}
}



//Cabecera html
include_once( "views/layouts/document-start.inc.php" );
?>

<div class="container">
	<br><br>
	<?php
	if(!isset($_POST['botonFormularioLogin'])){
		//echo "<h3>El boto no existe</h3>";
		include('loginempty.inc.php');
	}else{
		//echo "<h3>El boto si existe</h3>";
		include('loginvalidate.inc.php');
	}
	?>
	<a href="<?php echo RUTA_OLVIDO_CLAVE; ?>" title="Recupera tu contrase&ntilde;a perdida">¿Has perdido tu contrase&ntilde;a?</a>
</div>
<?php
//Final html
include_once( "views/layouts/document-end.inc.php" );
?>