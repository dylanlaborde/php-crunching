<?php 

$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
$brut = json_decode($string, true);
$top = $brut["feed"]["entry"]; # liste de films
$filmBefore2000;
$arrayCategory=[];
$arrayArtist=[];
$popularCategory;
$popularReal;

foreach ($top as $key => $value) {	
	$category = $value["category"]["attributes"]["label"];
	$artist = $value["im:artist"]["label"];
	// push des catégory dans un array
	array_push($arrayCategory, $category);
	//push des realisateur dans un array
	array_push($arrayArtist, $artist);

	// Classement "Gravity"
	if ($value["im:name"]["label"] === "Gravity") {
		$classement = array_search($value, $top);
	}
	// Realisateur "The LEGO Movie"
	if ($value["im:name"]["label"] === "The LEGO Movie") {
		$real = $value["im:artist"]["label"];
	}
	// film avant 2000
	if ($value['im:releaseDate']['label'] < 2000) {
		$filmBefore2000 = count($value);
	}
	


}
// categorie
foreach ($arrayCategory as $key => $value) {
	$maxKeyArray = max(array_count_values($arrayCategory));// valeur max nbr categorie
	if ($key === $maxKeyArray) {
		$popularCategory = $value;
	}
}
//artist
foreach ($arrayArtist as $key => $value) {
	 	$maxKeyArtist = max(array_count_values($arrayArtist));
	 	if ($key === $maxKeyArtist) {
	 		$popularReal = $value;
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
		<span><?= $filmBefore2000?> Film sont sortit avant 2000</span>
	</div>
	<div>
		<h3>Quel est le film le plus récent ? Le plus vieux ?</h3>
		<li><?php foreach ($top as $key => $value) :?>
			<?php 
			$titre = $value['im:name']['label'];
			$date = $value["im:releaseDate"]["label"];
			$arrayDate[$date] = $titre;
			endforeach;
			ksort($arrayDate);
			echo "le film le récent est ". end($arrayDate) ;
			?>

		</li>
		<li><?php echo "le film le plus vieux est". reset($arrayDate); ?></li>

	</div>
	<!-- exercice 5 -->
	<div>
		<h3>Quelle est la catégorie de films la plus représentée ?</h3>
		<span>la categorie la plus représentée est <?= $popularCategory?></span>
	</div>
	<!-- exercice 6 -->
	<div>
		<h3>Quel est le réalisateur le plus présent dans le top100 ?</h3>
		<span>le realisateur le plus present est <?= $popularReal?></span>
	</div>
	<div>
		<h3>Combien cela coûterait-il d'acheter le top10 sur iTunes ? de le louer ?</h3>
		<span></span>
	</div>
</body>
</html>