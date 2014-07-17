<?php

namespace system\app;

use system\core\IGrid;
/**
 *
 * @author marcio.santos
 *        
 */
class Grid implements IGrid
{

	private $text;
	
	public function __construct($text)
	{
		$this->text = $text;
	}
	
	
	public function show($show=true)
	{
		echo $this->text;
		
		$valores = array('Usu Nivel','Usu ativo','Pes codigo','Uni codigo');

		echo "<table border='1'>
					<tr>";
		foreach ($valores as $valor){
			echo "<td> {$valor} </td>";
		}
		echo '</tr>
				<table>';
	}
	

}

?>