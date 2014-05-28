<?php

namespace system\app;

use Respect\Validation\Validator as v;
use system\core\PostController;

class AcceptForm extends PostController
{
	public function cadastrarComercial()
	{
		//return $this->post;
		try {
			
			v::string()->email()
					   ->notEmpty()
					   ->setName('Doca')
					   ->assert($this->post['doca']);
					   
		} catch (Exception $e) {
			throw new \Exception($e->getMessage());
		}

		
	}
	
}