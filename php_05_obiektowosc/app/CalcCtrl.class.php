<?php
require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';

// Kontroler kalkulatora


class CalcCtrl {

	private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku


//konstruktor

public function __construct(){
    $this->msgs = new Messages();
    $this->form = new CalcForm();
    $this->result = new CalcResult();
}

public function getParams(){
    $this->form->amount = isset($_REQUEST ['amount']) ? $_REQUEST ['amount'] : null;
    $this->form->years = isset($_REQUEST ['years']) ? $_REQUEST ['years'] : null;
    $this->form->interest = isset($_REQUEST ['interest']) ? $_REQUEST ['interest'] : null;
}

public function validate() {
    // sprawdzenie, czy parametry zostały przekazane
    if (! (isset ( $this->form->amount ) && isset ( $this->form->years ) && isset ( $this->form->interest ))) {
        return false;
    }
    
    // sprawdzenie, czy potrzebne wartości zostały przekazane
    if ($this->form->amount == "") {
        $this->msgs->addError('Nie podano wartości kredytu');
    }
    if ($this->form->years == "") {
        $this->msgs->addError('Nie podano na ile lat');
    }
    if ($this->form->interest == "") {
        $this->msgs->addError('Nie podano oprocentowania kredytu');
    }
    
    // nie ma sensu walidować dalej gdy brak parametrów
    if (! $this->msgs->isError()) {
        
        // sprawdzenie, czy $x i $y są liczbami całkowitymi
        if (! is_numeric ( $this->form->amount )) {
            $this->msgs->addError('Kwota kredytu nie jest liczbą całkowitą');
        }
        
        if (! is_numeric ( $this->form->years )) {
            $this->msgs->addError('Długość kredytu nie jest liczbą całkowitą');
        }
        if (! is_numeric ( $this->form->interest )) {
            $this->msgs->addError('Oprocentowanie kredytu nie jest liczbą całkowitą');
        }

        //sprawdzenie znaku liczb

        if ($this->form->amount < 1) {
            $this->msgs->addError('Wartość kredytu musi być większa od 0');
        }
        if ($this->form->years < 1) {
            $this->msgs->addError('Długość kredytu musi wynosić minimum rok');
        }
        if ($this->form->interest < 0) {
            $this->msgs->addError('Oprocentowanie kredytu musi być wynosić minimum 0%');
        }
    }

    return ! $this->msgs->isError();
}

//jeśli wszystko dobrze to czas odpalić maszynę
public function process(){

    $this->getparams();
		
    if ($this->validate()) {
                
                    $this->form->amount = intval($this->form->amount);
                    $this->form->years = intval($this->form->years);
                    $this->form->interest = intval($this->form->interest);
                    $this->msgs->addInfo('Parametry poprawne.');
                  
                    $this->result->result = round((($this->form->amount * ($this->form->interest/100)) + $this->form->amount)/ ($this->form->years * 12),2);
                    
                    $this->msgs->addInfo('Wykonano obliczenia.');
            }
                        
    $this->generateView();
        }

    //generowanie widoku
    public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Kalkulator kredytowy');
		$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty z dodatkiem obiektowości');
        $smarty->assign('page_header','Oblicza miesięczną ratę kredytu na podstawie wprowadzonych danych');
				
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		
		$smarty->display($conf->root_path.'/app/CalcView.html');
	}

}

?>

