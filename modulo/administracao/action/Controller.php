<?php
require_once '../../../bootstrap.php';

//sleep(2);

use system\app\AcceptFormAdministracao as Post;
use system\core\FormController;

try {
	
	$post = new Post();
	
	$post->setPost($_POST)
	     ->cadastrarAdmin()
	     ->clearPost('cadastrar/doca')
		 ->router('../listaUsuarios.php');

	
} catch (Exception $e) {

	$_SESSION['cadastrar/doca'] = $post->getPost();
	
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
    
    header('location: ../index.php');
}