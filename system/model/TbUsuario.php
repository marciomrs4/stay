<?php

namespace system\model;

use system\core\DataBase;
use system;
class TbUsuario extends DataBase
{
	
	public function findAll()
	{
		try {
			
			$stmt = $this->conexao->prepare('SELECT * FROM test');
			
			$stmt->execute();
			
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
			
		} catch (\Exception $e) {
			throw new \Exception($e->getMessage(),$e->getCode());
		}

		
	}
	
	public function findOne($codigo)
	{
	    try {
	        	
	        $stmt = $this->conexao->prepare('SELECT * FROM test WHERE cod_test = ?');
	        	
	        $stmt->bindParam(1, $codigo,\PDO::PARAM_INT);
	        
	        $stmt->execute();
	        	
	        return $stmt->fetch(\PDO::FETCH_ASSOC);
	        	
	    } catch (\Exception $e) {
	        throw new \Exception($e->getMessage(),$e->getCode());
	    }
	
	
	}
	
	
	public function save(system\entity\Doca $doca)
	{
	    
	    try {
	    
	        $statement = ("INSERT INTO test (test_descripton) value(:test_descripton)");
	        $stmt = $this->conexao->prepare($statement);
	         
	        $stmt->bindParam(':test_descripton', $doca->getName(),\PDO::PARAM_STR);
	        
	        $stmt->execute();
	        
	    } catch (\Exception $e) {
	        throw new \Exception($e->getMessage(),$e->getCode());
	    }
	}
	
	public function update(system\entity\Doca $Doca)
	{
	     
	    try {
	
	        $statement = ("UPDATE test set test_descripton = :test_descripton
	                       WHERE cod_test = :cod_test");
	        $stmt = $this->conexao->prepare($statement);
	
	        $stmt->bindParam(':test_descripton', $Doca->getName(),\PDO::PARAM_STR);
	        $stmt->bindParam(':cod_test', $Doca->getId(),\PDO::PARAM_INT);
	        	         
	        $stmt->execute();
	         
	    } catch (\Exception $e) {
	        throw new \Exception($e->getMessage(),$e->getCode());
	    }
	}
	
}