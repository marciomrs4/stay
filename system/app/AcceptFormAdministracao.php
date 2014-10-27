<?php

namespace system\app;

use Respect\Validation\Validator as v;
use system\core\PostController;
use system\model\TbUsuario;
use system\entity\Doca;

class AcceptFormAdministracao extends PostController
{
	public function cadastrarAdmin()
	{

		try {
			
			v::string()->email()
					   ->notEmpty()
					   ->setName('E-mail')
					   ->setTemplate('O campo {{name}} é obrigatório')
					   ->assert($this->post['doca']);
					   
			try {

			  /*   $Doca = new Doca();
			    $Doca->setName($this->post['doca']);
			    
 				$tbUser = new TbUsuario();
				$dados = $tbUser->save($Doca); */
				return $this;
			   } catch (Exception $e) {
			   }
					   
		} catch (Exception $e) {
			
			throw new Exception();				
			
		}

	return $this;
		
	}
	
}