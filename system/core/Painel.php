<?php

namespace system\core;

class Painel
{
	
	private $painelTitle;
	
	private $painelColor = 'default';
	
	private $grid;
	
	
	/**
	 * 
	 * @param string $title
	 * @return \system\core\Grid
	 * 
	 * @example primary -
				success -
				info -
				warning -
				danger -
				default
	 */
	public function setPainelColor($painelColor='default')
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

	public function addGrid(IGrid $grid)
	{
		$this->grid = $grid;
		return $this;	
	}
	
	public function show()
	{
		
		echo("<div class='panel panel-{$this->getPainelColor()}'>
					<div class='panel-heading'>
						<h3 class='panel-title'>{$this->getPainelTitle()}</h3>
					</div>
			  	<div class='panel-body'>");
			$this->grid->show();
		  echo("</div>
			  </div>");
	
	}
}
?>