<?php

namespace system\model;

use system\core\DataBase;
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
	
	
	public function save($dados)
	{
	    
	    try {
	    	
	        $statement = ("INSERT INTO test (test_descripton) value(?)");
	        $stmt = $this->conexao->prepare($statement);
	         
	        $stmt->bindParam(1, $dados['doca'],\PDO::PARAM_STR);
	        
	        $stmt->execute();
	        
	    } catch (\Exception $e) {
	        throw new \Exception($e->getMessage(),$e->getCode());
	    }
	}
	
	public function update($dados)
	{
	     
	    try {
	
	        $statement = ("UPDATE test set test_descripton = ?
	                       WHERE cod_test = ?");
	        $stmt = $this->conexao->prepare($statement);
	
	        $stmt->bindParam(1, $dados['doca'],\PDO::PARAM_STR);
	        $stmt->bindParam(2, $dados['cod_test'],\PDO::PARAM_STR);
	        	         
	        $stmt->execute();
	         
	    } catch (\Exception $e) {
	        throw new \Exception($e->getMessage(),$e->getCode());
	    }
	}
	
}