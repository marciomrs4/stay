<?php

namespace system\app;

use system\core\IGrid;
use system\core\FormController;
/**
 *
 * @author marcio.santos
 *        
 */
class GraficoPainel extends FormController implements IGrid
{
	
	public function show($true=true)
	{
		$this->getForm();
	}

}

?>