<?php

namespace system\app;

use system\core\PostController;
use system\entity\Arquivo;

class AcceptFormArquivo extends PostController
{
	public function validateArquivo()
	{

		try {
			
			$arquivoEntity = new Arquivo();
			$arquivoEntity->setNumercao($this->post['arq_numeracao']);			

				
			} catch (Exception $e) {
				
				throw new Exception();
			}

		return $this;
		
	}
	
	
}