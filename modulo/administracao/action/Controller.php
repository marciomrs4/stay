<?php
require_once '../../../bootstrap.php';


use system\app\AcceptFormAdministracao as Post;
use system\core\FormController;

try {
	
	$post = new Post();
	
	$post->setpost($_POST)
	     ->cadastrarAdmin()
	     ->clearPost();
	
	
} catch (Exception $e) {

	$form = new FormController();
	$form->setModulo($_SESSION['moduloTemp'])
	->setAction($_SESSION['actionTemp'])
	->setValue($_SESSION['valueTemp']);

	$_SESSION['erro'] = $e->getMessage();
	
    if(method_exists($e,'getMainMessage')){
        $_SESSION['erro'] = $e->getMainMessage();        
    }
	
    if(method_exists($e,'findMessages')){
    	$_SESSION['erros'] = $e->findMessages(
    	array(
    		'string' => 'O valor {{name}} é obrigatorio',
    		'notEmpty' => 'O valor {{name}} não é valido',
    		'email' => 'O valor {{name}} deve ser um e-mail válido'
    	)
    	);
    }
}


header('location: '.$_SERVER['HTTP_REFERER']);