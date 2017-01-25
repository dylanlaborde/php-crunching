<?php 
$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\n", $string);
$total = count($dico);
$aray=[];
foreach ($dico as $key => $value) {
	$countArray = count($aray);
	if (strlen($dico[$key]) === 15) {
		array_push($aray, $dico[$key]);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dico</title>
</head>
<body>
	<div>
		<h3>Combien de Mots contient ce dictionaire ?</h3>
		<div>
			<span>
				ce Dictionaire contient : <?= $total?> Mots
			</span>
		</div>
	</div>
	<div>
		<h3>Combien de mots font exactement 15 caractères ?</h3>
		<span>
			Le nombre de mots faisant 15 caractères est :<?= $countArray?>
		</span>
	</div>
</body>
</html>

