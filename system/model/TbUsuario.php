<?php

namespace system\model;

use system\core\DataBase;
class TbUsuario extends DataBase
{
	
	public function findAll()
	{
		try {
			
			$stmt = $this->conexao->prepare('select * from tb_usuario');
			
			$stmt->execute();
			
			return $stmt;
			
		} catch (Exception $e) {
			throw new \Exception();
		}

		
	}
	
	
	
}