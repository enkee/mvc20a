<?
	session_start();
	
	if($_SESSION['autentificado']!="1"){
		header("location: login2.php");
		exit();
	}
?>