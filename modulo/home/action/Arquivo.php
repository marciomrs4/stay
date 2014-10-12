<?php 
require_once '../../../bootstrap.php';

use system\entity\Arquivo;
use system\core\FormController;
use system\app\AcceptFormArquivo;

if($_POST){
	
	try {

		$AcceptForm = new AcceptFormArquivo();
		$AcceptForm->setPost($_POST)
				   ->validateArquivo()
				   ->clearPost('cadastrar/arquivo')
				   ->router('../index.php');

		
	} catch (Exception $e) {
		
		$_SESSION['cadastrar/arquivo'] = $AcceptForm->getPost();
		
		foreach ($_SESSION['cadastrar/arquivo'] as $valores => $valor){
			
			echo $valores, '=>', $valor;
			
			if(isset($valores)){
				$_SESSION['cadastrar/arquivo'][$valores] = $valor;
			}else{
				$_SESSION['cadastrar/arquivo'][$valores] = '';
			}
			
		}
		
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
							'notEmpty' => 'O valor {{name}} não é valido',
							'numeric' => 'O valor {{name}} deve ser valor número válido'							
					)
			);
		}
		
		header('location: ../index.php');
	}
	
	
}



?>