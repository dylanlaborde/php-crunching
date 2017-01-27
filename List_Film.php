<?php 

$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
$brut = json_decode($string, true);
$top = $brut["feed"]["entry"]; # liste de films
$filmBefore2000=[];
foreach ($top as $key => $value) {
	if ($value['im:releaseDate']['label'] < 2000) {
		array_push($filmBefore2000, $value);

	// print_r($value['im:releaseDate']["attributes"]["label"]);

	}
	// Classement "Gravity"
	if ($value["im:name"]["label"] === "Gravity") {
		$classement = array_search($value, $top);
	}
	// Realisateur "The LEGO Movie"
	if ($value["im:name"]["label"] === "The LEGO Movie") {
		$real = $value["im:artist"]["label"];
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Liste des Film</title>
</head>
<body>
	<!-- exercice 1 -->
	<div>
		<h3>Top 10 des Film</h3>
		<ul>
			<?php for ($i=0; $i < 10 ; $i++) { ?>

			<li><?= $i+1 .":"."\n" ?><?=  $top[$i]["im:name"]["label"];?> </li>

			<?php } ?>
		</ul>
	</div>
	<!-- exercice 2 -->
	<div>
		<h3>
			Classement du Film Gravity :
		</h3>
		<span>le film "Gravity" est a la position <?= $classement+1 ."."?></span>
	</div>
	<!-- exercice 3 -->
	<div>
		<h3>Quel est le réalisateur du film « The LEGO Movie » ?</h3>
		<span>le/les Réalisateur de The LEGO Movie sont <?= $real;?></span>
	</div>
	<!-- exercice 4 -->
	<div>
		<h3>Combien de films sont sortis avant 2000 ?</h3>
		<span><?= count($filmBefore2000)+1?> Film sont sortit avant 2000</span>
	</div>
</body>
</html>