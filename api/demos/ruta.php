
	<div class="col-md-6 mt-4" >
	<h3>Ruta</h3>
<?php

require_once "Classes/PHPExcel.php";
		$tmpfname = "calculo.xlsx";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow(); 


/////////////////////////////////////////////////////////////////

// include getID3() library (can be in a different directory if full path is specified)
require_once('api/getid3/getid3.php');

// Initialize getID3 engine
$getID3 = new getID3;

$DirectoryToScan = 'api/demos/audios'; // change to whatever directory you want to scan
$dir = opendir($DirectoryToScan);
echo '<table border="1" cellspacing="0" cellpadding="3">';
echo '<tr><th>Ruta</th>';
echo '<th>Titulo</th></tr>';
while (($file = readdir($dir)) !== false) {
	$FullFileName = realpath($DirectoryToScan.'/'.$file);
	if ((substr($file, 0, 1) != '.') && is_file($FullFileName)) {
		set_time_limit(30);
		$ThisFileInfo = $getID3->analyze($FullFileName);

		getid3_lib::CopyTagsToComments($ThisFileInfo);

		// output desired information in whatever format you want
		echo '<tr>';
		// echo '<td>'.htmlentities(!empty($ThisFileInfo['comments_html']['Comment'])  ? implode('<br>', $ThisFileInfo['comments_html']['Comment']): chr(160)).'</td>';
		// echo '<td>'.htmlentities($ThisFileInfo['filenamepath']).'</td>';
		echo '<td>'.htmlentities($ThisFileInfo['filenamepath']).'</td>';
		echo '<td>'.htmlentities(!empty($ThisFileInfo['comments_html']['title'])  ? implode('<br>', $ThisFileInfo['comments_html']['title']): chr(160)).'</td>';
		echo '</tr>';
	}
}
?>
</div>
