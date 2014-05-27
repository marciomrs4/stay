<?php

namespace system\app;

class FormController
{
	
	protected $form;
	public $dirForm = 'forms/';
	
	protected $session;
	
	public $modulo;
	public $action;
	
	public function __construct($session)
	{
		$this->session = $session;
		
		$this->setModulo()->setAction();
	}
	
	public function setModulo()
	{
		$this->modulo = ($this->session['modulo'] != '') ? $this->session['modulo'] : '|';
		return $this;
	}
	
	public function setAction()
	{
		$this->action = ($this->session['action'] != '') ? $this->session['action'] : '|';
		return $this;
	}
	
	public function getForm()
	{
		if(file_exists($this->form)){
			include_once $this->form;			
		}else {
			echo 'Arquivo não encontrado';
		}
	
		unset($_SESSION[$this->action]);

	}
	
	
	public function setForm($form = null)
	{
		if($form == null){

			 	$this->form = strtolower($this->dirForm.$this->action.'.php');

			}else{
				
			
			
			$this->form = strtolower($form.'.php');
			
		}
		
		return $this;
		
	}
	
	private function satinizePath($path)
	{
		filter_var($path,FILTER_SANITIZE_URL);
	}
}