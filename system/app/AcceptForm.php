<?php

namespace system\app;

use Respect\Validation\Validator as v;
use system\core\PostController;
use system\model\TbUsuario;
use system\entity\Doca;

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

	   		$this->post['doca'] = filter_var($this->post['doca'],FILTER_SANITIZE_STRIPPED);
	   	
	   		
	   		
	       v::string()->notEmpty()
	                  ->email()
	                  ->setName('Doca')
	                  ->setTemplate('O valor {{name}} é obrigatório')
	                  ->assert($this->post['doca']);
	                  
            $Doca = new Doca();
            $Doca->setName($this->post['doca'])
                 ->setId($this->post['cod_doca']);
	                  
            $tbUser = new TbUsuario();
            $tbUser->update($Doca);
	                  
	                  
	   	return $this;
	   } catch (Exception $e) {
	       
	   }   throw new \Exception();
	}
	
}