<?php
require_once '../../../bootstrap.php';


use system\app\AcceptFormAdministracao as Post;
use system\core\FormController;

try {
	
	$post = new Post();
	
	$post->setPost($_POST);
	$post->cadastrarAdmin();
	
	$post->clearPost();
	
} catch (Exception $e) {

	$form = new FormController();
	$form->setModulo($_SESSION['moduloTemp'])
	->setAction($_SESSION['actionTemp'])
	->setValue($_SESSION['valueTemp']);
	
	$_SESSION['erro'] = $e->getMainMessage();
	$_SESSION['erros'] = $e->findMessages(
	array(
		'string' => 'O campo {{name}} � obrigatorio',
		'notEmpty' => 'O campo {{name}} n�o deve ser vazio',
		'email' => 'O campo {{name}} deve ser um e-mail v�lido'
	)
	);
	
}


header('location: '.$_SERVER['HTTP_REFERER']);