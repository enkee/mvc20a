<? 
	include ('../seguridad.php');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Documento sin título</title> 
        <!--<link rel="stylesheet" type="text/css" href="<? echo 'styles/'. $_SESSION['micss'] ; ?>.css">-->
        <?
		include_once 'unico.php';
		?>
    </head>

    <body>
        <p>Hola mundo<br></p>
        <p><a href="../index.php">Ir pagina 1</a></p>
        <p><a href="../salir.php">Cerrar Sesion</a></p>
    </body>
</html>