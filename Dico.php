<?php 
$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\n", $string);
$total = count($dico);
$aray=[];
$arryContainW=[];
$arrayEnd=[];
foreach ($dico as $key => $value) {
	$countArray = count($aray);
	$countArrayContainW = count($arryContainW);
	$countArrayEnd = count($arrayEnd);
	if (strlen($dico[$key]) === 15) {
		array_push($aray, $dico[$key]);
	}
	if (strpos($dico[$key], "w")) {
		array_push($arryContainW , $dico[$key]);
		
	}
	if (substr($dico[$key], -1) === "q") {
		array_push($arrayEnd, $dico[$key]);
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
	<div>
		<h3>Combien de mots contiennent la lettre « w » ?</h3>
		<span><?= $countArrayContainW?> Mots contiennent la letre "w"</span>

	</div>
	<div>
		<h3>Combien de mots finissent par la lettre « q » ?</h3>
		<span><?= $countArrayEnd?> Mots finissent par "q"</span>
	</div>
</body>
</html>

