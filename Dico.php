<?php 
$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\n", $string);
$total = count($dico);
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
		
		<?php foreach($dico as $key => $value): ?>
		<span>
			ce Dictionaire contient : <?= $total?> Mots
		</span>
		<?php die(); ?>
		<?php endforeach?>


	</div>
</div>
</body>
</html>