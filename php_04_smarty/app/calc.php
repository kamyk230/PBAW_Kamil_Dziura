<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

function getParams(&$amount,&$years,&$interest){
    $amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
	$years = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
    $interest = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : null;
}

function validate(&$amount,&$years,&$interest,&$messages){
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($amount) && isset($years) && isset($interest))) {
		// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $amount == "") {
		$messages [] = 'Nie podano kwoty kredytu.';
	}
	if ( $years == "") {
		$messages [] = 'Nie podano liczby rat.';
	}
        if ( $interest == "") {
		$messages [] = 'Nie podano oprocentowania.';
	}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (count ( $messages ) != 0) return false;
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $amount )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą.';
	}
	
	if (! is_numeric( $years )) {
		$messages [] = 'Druga wartość nie jest liczbą.';
	}	
	if (! is_numeric( $interest )) {
		$messages [] = 'Druga wartość nie jest liczbą.';
	}	

	if ($amount<1){
		$messages [] = "Kwota pożyczki musi być większa od zera.";
	}

	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$amount,&$years,&$interest,&$messages,&$result){
	
	//konwersja parametrów na int
	$amount = intval($amount);
	$years = intval($years);
    $interest = intval($interest);
	

	
	$result = ($amount+($amount*($interest/100)))/($years*12);
	$result = round($result, 2);
       
        

}

//definicja zmiennych kontrolera
$amount = null;
$years = null;
$interest = null;
$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($amount,$years,$interest);
if ( validate($amount,$years,$interest,$messages) ) { // gdy brak błędów
	process($amount,$years,$interest,$messages,$result);
}

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulator kredytowy');
$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header','Oblicza miesięczną ratę kredytu na podstawie wprowadzonych danych');

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('amount',$amount);
$smarty->assign('years',$years);
$smarty->assign('interest',$interest);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc_view.tpl');