<?php //góra strony z szablonu 
include _ROOT_PATH.'/templates/top.php';
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
</head>
<body>
	
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>

<form action="<?php print(_APP_ROOT); ?>/app/calc.php" method="post" class="pure-form pure-form-stacked"><br />
	<legend>Kalkulator kredytowy</legend>
	<fieldset>
		<label for="id_amount">Kwota kredytu: </label>
                <input id="id_amount" type="number" name="amount" max="1000000" value="<?php out($amount); ?>" /><br />
                <label for="id_years">Liczba lat: </label>
                <input id="id_years" type="number" name="years" min="1" value="<?php out($years); ?>" /><br />
                <label for="id_interest">Oprocentowanie: </label>
                <input id="id_interest" type="number" name="interest" min="1" value="<?php out($interest); ?>" /><br />
	</fieldset>	
	<input type="submit" value="Oblicz" class="pure-button pure-button-primary" /><br />
</form>	

<div class="messages">

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
	echo '<h4>Wystąpiły błędy: </h4>';
	echo '<ol class="err">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>
</div>
<?php if (isset($result)){ ?>
	<h4>Miesięczna rata kredytu to: </h4>
	<p class="res">
<?php print($result).'zł'; ?>
	</p>
<?php } ?>

</div>

<?php //dół strony z szablonu 
include _ROOT_PATH.'/templates/bottom.php';
?>
</body>
</html>