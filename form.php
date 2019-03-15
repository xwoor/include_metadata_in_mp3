<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<style type="text/css">
	body{
		background-color: red;
	}
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<body>


<?php 
$row = $_GET['num'];
require_once "Classes/PHPExcel.php";
		$tmpfname = "calculo.xlsx";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow(); 
		?>


						<div class="col-md-6">
						<h1 class="text-center">Metadato # <?php echo $row ?> </h1>
					<form method="POST" action="api/demos/demo.simple.write.php?num=<?php echo $row; ?>">

					  <div class="form-group">
					    <label for="title">Title</label>
					    <input type="text" class="form-control " name="title" value="<?php echo $worksheet->getCell('A'.$row)->getValue();?>">
					  </div>

					  <div class="form-group">
					    <label for="title">Ruta</label>
					    <input type="text" class="form-control " name="rute" value="<?php echo $worksheet->getCell('B'.$row)->getValue();?>">
					  </div>

					   <div class="form-group">
					    <label for="artist">artist</label>
					    <input type="text" class="form-control " name="artist" value="<?php echo $worksheet->getCell('C'.$row)->getValue();?>">
					  </div>
					  <div class="form-group">
					    <label for="albumartist">albumartist</label>
					    <input type="text" class="form-control " name="albumartist" value="<?php echo $worksheet->getCell('D'.$row)->getValue();?>">
					  </div>
					   <div class="form-group">
					    <label for="album">album</label>
					    <input type="text" class="form-control " name="album" value="<?php echo $worksheet->getCell('E'.$row)->getValue();?>">
					  </div>
					     <div class="form-group">
					    <label for="year">year</label>
					    <input type="text" class="form-control " name="year" value="<?php echo $worksheet->getCell('F'.$row)->getValue();?>">
					  </div>
					     <div class="form-group">
					    <label for="genre">genre</label>
					    <input type="text" class="form-control " name="genre" value="<?php echo $worksheet->getCell('G'.$row)->getValue();?>">
					  </div>
					     <div class="form-group">
					    <label for="publisher">publisher</label>
					    <input type="text" class="form-control " name="publisher" value="<?php echo $worksheet->getCell('H'.$row)->getValue();?>">
					  </div>
					     <div class="form-group">
					    <label for="track">track</label>
					    <input type="text" class="form-control " name="track" value="<?php echo $worksheet->getCell('I'.$row)->getValue();?>">
					   	</div> 
							 <div class="form-group">
					    <label for="track">Posicion</label>
					    <input type="text" class="form-control " name="pos" value="<?php echo $worksheet->getCell('J'.$row)->getValue();?>">
					   	</div> 
					   	<input type="submit" name="enviar" class="btn btn-primary" value="Enviar" autofocus>
				</form>
				</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>