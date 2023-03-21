<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_kwota">Kwota kredytu: </label>
	<input id="id_kwota" type="number" name="x" value="<?php if (isset($kwota)) print ($kwota); ?>" /><br />
	<label for="id_proc">Oprocentowanie: </label>
	<input id="id_proc" type="number" name="z" min="1" max="200" value="<?php if (isset($oproc)) print ($oproc); ?>" /><br />
	<label for="id_lata">Na ile lat: </label>
	<input id="id_lata" type="number" name="y" min="1" max="50" value="<?php if (isset($naIle)) print($naIle); ?>" /><br />
	<input type="submit" value="Oblicz" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($miesRata)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Miesięczna rata kredytu to:  '.$miesRata . 'zł'; ?>
</div>
<?php } ?>

</body>
</html>