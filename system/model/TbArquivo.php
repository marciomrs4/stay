<?php

namespace system\model;

use system\core\DataBase;

class TbArquivo extends DataBase
{

	private $tablename = 'tb_arquivo';
	
	public function findAll()
	{
		try {
			
			$stmt = $this->conexao->prepare("SELECT arq_codigo, arq_numeracao, 
													arq_nome_fantasia, arq_emprestimo 
												FROM $this->tablename");
			
			$stmt->execute();
			
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
			
		} catch (\Exception $e) {
			throw new \Exception($e->getMessage(),$e->getCode());
		}

		
	}
	
	
}