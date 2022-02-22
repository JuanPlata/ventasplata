<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Ventas "El pirul"</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<link href="../css/inicio.css" rel="stylesheet" type="text/css">
	<?php require_once "menu.php"; ?>
	
</head>
<body>
<embed src="../archivos/reporteVenta.pdf#toolbar=1&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />
</body>
</html>
<?php 
	}else{
		header("location:../index.php");
	}
 ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>