<?php

namespace system\model;

use system\core\DataBase;
class TbUsuario extends DataBase
{
	
	public function findAll()
	{
		try {
			
			$stmt = $this->conexao->prepare('SELECT * FROM tb_usuario');
			
			$stmt->execute();
			
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
			
		} catch (\Exception $e) {
			throw new \Exception();
		}

		
	}
		
	
}