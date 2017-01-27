<?php 

$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
$brut = json_decode($string, true);
$top = $brut["feed"]["entry"]; # liste de films
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Liste des Film</title>
</head>
<body>
	<div>
		<h3>Top 10 des Film</h3>
		<ul>
			<?php for ($i=0; $i < 9 ; $i++) { ?>

			<li><?= $i+1 .":"."\n" ?><?=  $top[$i]["im:name"]["label"];?> </li>

			<?php } ?>
		</ul>
	</div>
</body>
</html>