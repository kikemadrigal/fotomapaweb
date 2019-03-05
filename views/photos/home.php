<?php
require_once( "app/config.php" );
require_once( "app/ControlSesion.php" );
require_once( "app/Conexion.php" );
require_once( "app/RepositorioFotos.php" );
require_once( "app/Foto.php" );


require_once('views/layouts/document-start.inc.php');
echo "<div class='container'>Para poner una foto picha o toca el mapa.</div>";
require_once('views/map/map.inc.php');
echo "<br>";
//Call the file that contain map
require_once('views/photos/carrusel.inc.php');

require_once('views/layouts/document-end.inc.php');
?>