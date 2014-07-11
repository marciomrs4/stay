<?php

namespace system\core;

class Grid
{

	/**
	 * Descrição ...
	 * @var string
	 * @example Inserir o nome da classe CSS para linha
	 * csslinha1 = 'cssnome'
	 */
	public $css = 'table table-striped table-bordered table-condensed table-hover';


	/**
	 * 
	 * @var id
	 */
	public $id = 'table-bootstrap';
	
	/**
	 * Descrição ...
	 * @var bolean
	 * @example Inserir valor boleano para poder aparecer o link
	 * com javascript
	 * islinkJavasript = true
	 */
	public $colunaoculta = 0;

	/**
	 * Descrição ...
	 * @var bolean
	 * @example Inserir valor boleano para poder aparecer o link
	 * islink = true
	 */
	
	/**
	 * Descrição ...
	 * @var array
	 * @example dados que devem ser mostrados na tabela
	 * dados = tabeladedados
	 */
	private $dados;

	/**
	 * Descrição ...
	 * @var array
	 * @example Nomes para o titulo de cada coluna
	 * cabecalho = titulodascolunas
	 */
			
	private $cabecalho;

	private $function;
	
	private $columnNumber;

	private $option;
	
	private $enableOption = 1;
	
	private $painelTitle;
	
	private $painelColor;
	
	
	/**
	 *
	 * Enter description here ...
	 * @param array $cabecalho
	 * @param array $dados
	 * @author
	 */
	public function __construct($cabecalho = NULL,$dados = NULL)
	{
		$this->setDados($dados)
			 ->setCabecalho($cabecalho);
	}

	public function setDados($dados)
	{
		$this->dados = $dados;
		return $this;
	}
	
	public function setCabecalho($cabecalho)
	{
		$this->cabecalho = $cabecalho;
		return $this;
	}
	
	/**
	 * 
	 * @param string $enableOption
	 * @return \system\core\Grid
	 * @example true or false
	 */
	
	public function setEnableOption($enableOption=true)
	{
		$this->enableOption = ($enableOption == true) ? 1 : 0;
		return $this;
	}
	
	private function getEnableOption()
	{
		return $this->enableOption;
	}
	
	/**
	 * 
	 * @param string $title
	 * @return \system\core\Grid
	 * 
	 * @example primary -
				success -
				info -
				warning -
				danger
	 */
	public function setPainelColor($painelColor='info')
	{
		$this->painelColor = $painelColor;
		return $this;
	}
	
	private function getPainelColor()
	{
		return $this->painelColor;
	}
	
	public function setPainelTitle($title='')
	{
		$this->painelTitle = $title;
		return $this;
	}
	
	private function getPainelTitle()
	{
		return $this->painelTitle;
	}
	
	
	
	/**
	 *
	 * Enter description here ...
	 * @example Metodo que cria o cabeçalho baseado no array informado no
	 * construtor
	 */
	
	private function criaCabecalho()
	{

		echo("<div class='panel panel-{$this->getPainelColor()}'>
				<div class='panel-heading'>
					<h3 class='panel-title'>{$this->getPainelTitle()}</h3>
				</div>
			<div class='panel-body'>
				
			<table class='{$this->css}' id='{$this->id}'>
				<thead>
					<tr class='active'>");				
				foreach ($this->cabecalho as $cabecalho):
					echo("<th><a href='#'>{$cabecalho}</a></th>");
				endforeach;
				
				echo("</tr>");
		 echo("</thead>
		 	<tbody>");
		 
		 return $this;
	}


	public function addFunctionColumn($function, $columnNumber)
	{
		$this->function[$columnNumber] = $function;
		$this->columnNumber[$columnNumber] = $columnNumber;
		
		return $this;
	}
	
	private function getFunctionColumn($column, $columnNumber)
	{
		$function = '';
		
		if(array_key_exists($columnNumber, $this->function)){
			$function = $this->function[$columnNumber];
		}
		
		if(function_exists($function)){
			if($this->columnNumber[$columnNumber] == $columnNumber){		
				return $function($column);
			}else{
				return $column;
			}
		}else{
			return $column;
		}
		
	}
	
	/**
	 *
	 * Enter description here ...
	 * @example Metodo que cria a tabela com os dados iformados no contrutor
	 */
	private function criaTabela()
	{
		
		$linha = 0;
		
		foreach ($this->dados as $campo){
			
			$this->coluna = count($campo) / 2;
			
			#Serve para mostrar o Option Apenas uma vez
			$enableOption = $this->getEnableOption();
						
			echo("<tr>");			
			
			for($x = $this->colunaoculta; $x < $this->coluna ; $x++){
			    
    				if($enableOption == 1){

   				    	echo '<td class="col-md-1">
								<div class="btn-group">
	           						<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
	               						Opções <span class="caret"></span>
	           						</button>
	             				<ul class="dropdown-menu" role="menu">';    				    	
					             foreach ($this->option as $option){
				    				  	echo $option->createOption($campo[0]);
					             }

    					   echo'</ul>
	          					</div>';
							'</td>';
    					  #Serve para mostrar o Option Apenas uma vez
    					  $enableOption = 0;
			    }

				
				echo("<td>
					{$this->getFunctionColumn($campo[$x],$x)}
					
					</td>");
				
			}
			

			$linha++;
			echo('</tr>');
		}
		
		echo('</tbody>
			</table>	
		</div>
	</div>');
	}
	
	public function addOption(Option $option)
	{
	   $this->option[] = $option;
	   return $this;
	}

	
	/**
	 * @example Metodo que mostra a tabela na tela, chamando todos
	 * os metodos anteriores
	 */
	public function show()
	{
			$this->criaCabecalho()
				 ->criaTabela();
	}
}
?>