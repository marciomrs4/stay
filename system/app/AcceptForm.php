<?php

namespace system\app;

use Respect\Validation\Validator as v;
use system\core\PostController;
use system\model\TbUsuario;

class AcceptForm extends PostController
{
	public function cadastrarComercial()
	{

		try {
			
 			v::string()->notEmpty()
<<<<<<< HEAD
 					   ->email()
=======
>>>>>>> 279865917859b4b9fb7f0dfe49b48720caaf9768
					   ->setName('Doca')
					   ->setTemplate('O campo {{name}} � obrigat�rio')
					   ->assert($this->post['doca']);

			try {
				

				$tbUser = new TbUsuario();
				$dados = 1;
				return $tbUser->save($dados);
				
				
			} catch (Exception $e) {
				
			}		   
					   
		} catch (Exception $e) {
			
			throw new Exception();				
			
		}

		
	}
	
}