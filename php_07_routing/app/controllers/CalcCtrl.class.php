<?php

namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;

class CalcCtrl {

	private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
	

	
	public function __construct(){
		//stworzenie potrzebnych obiektów
		
		$this->form = new CalcForm(); //obiekt na dane z formularza -> amount, years, interest
		$this->result = new CalcResult();
	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
                $this->form->amount = getFromRequest('amount');
                $this->form->interest = getFromRequest('interest');
                $this->form->years = getFromRequest('years');            
	}
	
	
        function validate(){
                // sprawdzenie, czy parametry zostały przekazane
                if ( ! (isset($this->form->amount) && isset($this->form->interest) && isset($this->form->years))) {
                        // sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
                        // teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
                        return false;
                }
                

                
                
                // sprawdzenie, czy potrzebne wartości zostały przekazane
                if ( $this->form->amount == "") {
                       getMessages()->addError('Nie podano kwoty kredytu.');
                }
                if ( $this->form->years == "") {
                        getMessages()->addError('Nie podano liczby rat.');
                }
                if (  $this->form->interest == "") {
                      getMessages()->addError('Nie podano oprocentowania.');
                }

                //nie ma sensu walidować dalej gdy brak parametrów
                if (! getMessages()->isError()) {

                // sprawdzenie, czy pobrane wartości są liczbami całkowitymi
                    if (! is_numeric( $this->form->amount )) {
                       getMessages()->addError('Wprowadzona wartość dla kwoty nie jest liczbą.');
                    }

                    if (! is_numeric( $this->form->years )) {
                       getMessages()->addError('Wprowadzona ilość lat nie jest liczbą.');
                    }	
                    if (! is_numeric( $this->form->interest )) {
                        getMessages()->addError('Wprowadzone oprocentowanie nie jest liczbą.');
                    } 
                }


 
                return ! getMessages()->isError(); 
        }
        
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function action_calcCompute(){

		$this->getParams();
		
		if ($this->validate()) {
				
                        $this->form->amount = intval($this->form->amount);
                        $this->form->years = intval($this->form->years);
                        $this->form->interest = intval($this->form->interest);
                        
                        if (inRole('admin')){
                            $this->result->result = round((($this->form->amount * ($this->form->interest/100)) + $this->form->amount)/ ($this->form->years * 12),2);
                            $this->result->total =  $this->result->result * $this->form->years * 12;
                            getMessages()->addInfo('Wykonano obliczenia.');
                        }
                        if (inRole('user') && $this->form->amount <= 10000){
                            $this->result->result = round((($this->form->amount * ($this->form->interest/100)) + $this->form->amount)/ ($this->form->years * 12),2);
                            $this->result->total =  $this->result->result * $this->form->years * 12;
                            getMessages()->addInfo('Wykonano obliczenia.');
                        }
                        if (inRole('user') && $this->form->amount > 10000){
                            getMessages()->addError('Tylko administrator może obliczyć ratę dla kwoty kredytu powyżej 10000zł!');
                        }
                }
                            
		$this->generateView();
	}
	
	public function action_calcKomunikat(){
		getMessages()->addInfo('Jesteś zalogowany. Wprowadź dane.');
		$this->generateView();
	}
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
                getSmarty()->assign('user',unserialize($_SESSION['user']));
		getSmarty()->assign('page_title','Strona główna');
                getSmarty()->assign('page_description','Projekt z ochroną zasobów + routing');
                getSmarty()->assign('page_header','Kalkulator kredytowy');	
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		getSmarty()->display('CalcView.tpl');
	}
}
