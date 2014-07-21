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
					   ->setName('Doca')
					   ->setTemplate('O campo {{name}} é obrigatório')
					   ->assert($this->post['doca']);

			try {
				

				$tbUser = new TbUsuario();
				$dados = 1;
				return $tbUser->save($dados);
				
				
			} catch (Exception $e) {
				
				throw new \Exception();
			}		   
					   
		} catch (Exception $e) {
			
			throw new Exception();				
			
		}
		
	}
	
	public function alterarDoca()
	{
	   try {
	       
	       v::string()->notEmpty()
	                  ->numeric()
	                  ->setName('Doca')
	                  ->setTemplate('O valor {{name}} é obrigatório')
	                  ->assert($this->post['doca']);
	                  
            $tbUser = new TbUsuario();
            $tbUser->update($this->post);
	                  
	                  
	   	return $this;
	   } catch (Exception $e) {
	       
	   }   throw new \Exception();
	}
	
}