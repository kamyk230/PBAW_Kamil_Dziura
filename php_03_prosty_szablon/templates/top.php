<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php out($page_description); if (!isset($page_description)) {  ?> Opis domyślny ... <?php } ?>">
	<title><?php out($page_title); if (empty($page_title)) {  ?> Kalkulator kredytowy <?php } ?></title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<link rel="stylesheet" href="<?php print(_APP_URL); ?>/css/style.css">		
</head>
<body>

<div class="header">
	<h1><?php out($page_title); if (!isset($page_title)) {  ?> Kalkulator kredytowy <?php } ?></h1>
	<h2><?php out($page_header); if (!isset($page_header)) {  ?> Oblicza kwotę miesięcznej raty kredytu <?php } ?></h1>
	<p>
		<?php out($page_description); if (!isset($page_description)) {  ?> Użytkownik może sprawdzić kwotę do 10000zł <?php } ?>
	</p>
</div>

<div class="content">