<?php
require_once '../../../bootstrap.php';


use system\app\AcceptForm as Form;

$form = new Form();

try {
	
	$form->setPost($_POST);
		
	$_SESSION['form'] = $form->cadastrarComercial();
	
	
} catch (Exception $e) {

	//$_SESSION['erro'] = $e->getMessage();

//$_SESSION['erro'] =	$e->getMainMessage();

$_SESSION['erro'] = $e->findMessages(array(
		'string' => '{{name}} Erro de String',
		'email'  => '{{name}} Erro de email'
));

/*	
	$_SESSION['erro'] = $errors = $e->findMessages(array(
			'string' => 'Ao tentar inserir {{name}} houve um erro de String',
			'email'  => 'O valor {{input}} não é um email valido',
			'notEmpty' => 'O valor {{input}} não pode ser vazio',
			'alnum' => 'o valor {{input}} tem ser alfanumerico'
	));
*/
		
}



header('location: '.$_SERVER['HTTP_REFERER']);