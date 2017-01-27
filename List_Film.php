<?php 

$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
$brut = json_decode($string, true);
$top = $brut["feed"]["entry"]; # liste de films

foreach ($top as $key => $value) {
	// Classement "Gravity"
	if ($value["im:name"]["label"] === "Gravity") {
		$classement = array_search($value, $top);
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
	</div>
</body>
</html>