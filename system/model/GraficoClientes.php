<?php

namespace system\model;

use system\core\DataBase;

class GraficoClientes extends DataBase
{

	private $tablename = 'tb_arquivo';
	
	public function QuantidadeClientes()
	{
		try {
			
			$stmt = $this->conexao->prepare("SELECT (SELECT tpp_descricao FROM tb_tipo_pessoa WHERE PE.tpp_codigo = tpp_codigo), count(*)
												FROM tb_pessoa AS PE
												WHERE tpp_codigo IN (1,2,3,4,8,9)
												GROUP BY 1
												ORDER BY 1
											");
			
			$stmt->execute();
			
			foreach ($stmt as $value){
				echo '[',"'",$value[0],"'",',',$value[1],'],';
			}
				
			
		} catch (\Exception $e) {
			throw new \Exception($e->getMessage(),$e->getCode());
		}

		
	}
	

	#Quantidade Arquitetos PJ por Executivo de venda
	public function QuantidadeArquitetosPj()
	{
		try {
				
			$stmt = $this->conexao->prepare("SELECT (SELECT fun_nome_completo FROM tb_funcionario WHERE PJ.pes_codigo_funcionario = pes_codigo), 
											count(*) 
											FROM tb_arquiteto_pj AS PJ 
											GROUP BY 1 ORDER BY 1
											");
				
			$stmt->execute();
				
			foreach ($stmt as $value){
				echo '[',"'",$value[0],"'",',',$value[1],'],';
			}
	
				
		} catch (\Exception $e) {
			throw new \Exception($e->getMessage(),$e->getCode());
		}
	
	}
	
	
	#Quantidade clientes PJ por Executivo de venda
	public function QuantidadeClientesPj()
	{
		try {
	
			$stmt = $this->conexao->prepare("SELECT (SELECT fun_nome_completo FROM tb_funcionario WHERE PJ.pes_codigo_funcionario = pes_codigo),
											count(*)
											FROM tb_cliente_pj AS PJ
											GROUP BY 1 ORDER BY 1
											");
	
			$stmt->execute();
	
			foreach ($stmt as $value){
				echo '[',"'",$value[0],"'",',',$value[1],'],';
			}
	
	
		} catch (\Exception $e) {
			throw new \Exception($e->getMessage(),$e->getCode());
		}
	
	}
	
}