
	<div class="col-md-6 mt-4" >
	<h3>Lista</h3>
<?php


/////////////////////////////////////////////////////////////////

// include getID3() library (can be in a different directory if full path is specified)
require_once('api/getid3/getid3.php');

// Initialize getID3 engine
$getID3 = new getID3;

$DirectoryToScan = 'api/demos/audios'; // change to whatever directory you want to scan
$dir = opendir($DirectoryToScan);
echo '<table border="1" cellspacing="0" cellpadding="3">';
echo '<tr><th>Ubicacion Archivo</th>
<th>Artista</th>
<th>Album</th>
<th>Album Artist</th>
<th>Title</th>
<th>Genero</th>
<th>Año</th>
<th>publisher</th>
<th>Bitrate</th>
<th>Tiempo</th></tr>';
while (($file = readdir($dir)) !== false) {
	$FullFileName = realpath($DirectoryToScan.'/'.$file);
	if ((substr($file, 0, 1) != '.') && is_file($FullFileName)) {
		set_time_limit(30);

		$ThisFileInfo = $getID3->analyze($FullFileName);

		getid3_lib::CopyTagsToComments($ThisFileInfo);

		// output desired information in whatever format you want
		echo '<tr>';
		echo '<td>'.htmlentities($ThisFileInfo['filenamepath']).'</td>';
		echo '<td>'.htmlentities(!empty($ThisFileInfo['comments_html']['artist']) ? implode('<br>', $ThisFileInfo['comments_html']['artist']): chr(160)).'</td>';
		echo '<td>'.htmlentities(!empty($ThisFileInfo['comments_html']['album'])  ? implode('<br>', $ThisFileInfo['comments_html']['album']): chr(160)).'</td>';

		echo '<td>'.htmlentities(!empty($ThisFileInfo['comments_html']['tags'])  ? implode('<br>', $ThisFileInfo['comments_html']['tags']): chr(160)).'</td>';



		echo '<td>'.htmlentities(!empty($ThisFileInfo['comments_html']['title'])  ? implode('<br>', $ThisFileInfo['comments_html']['title']): chr(160)).'</td>';
		echo '<td>'.htmlentities(!empty($ThisFileInfo['comments_html']['genre'])  ? implode('<br>', $ThisFileInfo['comments_html']['genre']): chr(160)).'</td>';
		echo '<td>'.htmlentities(!empty($ThisFileInfo['comments_html']['year'])  ? implode('<br>', $ThisFileInfo['comments_html']['year']): chr(160)).'</td>';
		echo '<td>'.htmlentities(!empty($ThisFileInfo['comments_html']['publisher'])  ? implode('<br>', $ThisFileInfo['comments_html']['publisher']): chr(160)).'</td>';
		echo '<td align="right">'.htmlentities(!empty($ThisFileInfo['audio']['bitrate'])?round($ThisFileInfo['audio']['bitrate'] / 1000).' kbps' : chr(160)).'</td>';
		echo '<td align="right">'.htmlentities(!empty($ThisFileInfo['playtime_string'])?$ThisFileInfo['playtime_string']: chr(160)).'</td>';
		echo '</tr>';
	}
}
?>
</div>
