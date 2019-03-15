<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->
<style type="text/css">
	body{
		background-color: red;
	}
</style>
</head>

<body>

<?php

if(!isset($_GET['num'])){
	$_GET['num'] = 1;
}
?>
				<div class="container">	
				<div class="row">
					<?php
					include('form.php');
					include('api/demos/ruta.php');
					?>

				</div>
				</div>

</body>
</html>