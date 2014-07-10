<?php
use system\core\Grid;
use system\core\GridOption;
use system\model\TbUsuario;
use system\core\ActionController;
include_once '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/bootstrap.php';
include_once 'config.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/topo.php';
include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/menuprincipal.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'modulo/administracao/ModuloAdministracao.php';

echo $_SESSION['variavel'];

$coluns = array('','ID','Nome','Usu senha','Usu Nivel','Usu ativo','Pes codigo','Uni codigo');

$users = new TbUsuario();

$grid = new Grid($coluns,$users->findAll());


$gridOption = new GridOption('/');
$gridOption->setUrl('/stay/modulo/comercial')
           ->setIco('pencil')
           ->setName('Remover');


//$gridoption2 = clone $gridOption;

/* $gridoption2 = ; */

$option3 = new GridOption();
$option3->setName('Excluir')
		->setIco('cog')
		->setUrl('action/remover.php?seila');


function nova($var){
	return 'R$ '.$var;
}

function mutliplica($val)
{
	return $val * 2;
}


$grid->addFunctionColumn('ucfirst', 1)
	 ->addFunctionColumn('strtoupper', 3)
	 ->addFunctionColumn('nova',4)
	 ->addFunctionColumn('mutliplica',5)
	 ->addOption($gridOption)
	 ->addOption(GridOption::newOption()->setUrl('action/alterarItem.php?variavel')
									    ->setIco('search')
									    ->setName('Alterar'))
	 ->addOption($option3)
	 ->setEnableOption(true)
	 ->show();



include '../../componente/rodape.php';
?>