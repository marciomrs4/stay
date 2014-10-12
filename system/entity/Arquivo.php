<?php

namespace system\entity;

use Respect\Validation\Validator as V;
use system\core\PostController;

/**
 *
 * @author Amaquina
 *        
 */
class Arquivo
{    
    private $arq_codigo;
    private $arq_numeracao;
    private $arq_nome_fantasia;
    private $arq_emprestimo;
    private $usu_codigo;
    
    public function setNumercao($numeracao)
    {

		try {
	    	V::string()->numeric()
	    			   ->notEmpty()
	    			   ->setName('Numercao')
	    			   ->setTemplate('O campo {{name}} é obrigatório')
	    			   ->assert($numeracao); 
	    			   
	    			   $this->arq_numeracao = $numeracao;
	    			   
		}catch (Exception $e){
			throw new Exception($e->getMessage(),$e->getCode());
		}			      	

		return $this;
    }
    
    public function getNumercao()
    {
        return $this->name;
    }
    
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
}