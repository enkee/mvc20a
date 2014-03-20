<?
	include("conexion.php");
	
	session_start();
	
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];

	$sql="SELECT css FROM usuarios WHERE PasUsu='$clave' AND UsuUsu='$usuario'";
	$result = mysql_query($sql) or die(mysql_error());
	$filas=mysql_num_rows($result);
	
	if($filas==1){
		$_SESSION['autentificado']="1";
		$_SESSION['user']=$usuario;
		$_SESSION['pass']=$clave;
		
		$row = mysql_fetch_assoc($result);
		extract($row);
		
		$_SESSION['micss']=$css;
		header("location:../aplicacion_2.php"); 
	}
	else{
		header("Location:../login2.php?error='error'&usu=$usuario");
	}
?>