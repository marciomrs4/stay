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

$coluns = array('#','','','Usu senha','Usu Nivel','Usu ativo','Pes codigo','Uni codigo');

$users = new TbUsuario();

$grid = new Grid($coluns,$users->findAll());

$gridOption = new GridOption();
$gridOption->setUrl('/stay/modulo/comercial')
           ->setType('pencil')
           ->setName('Remover');

//$gridoption2 = clone $gridOption;

$gridoption2 = GridOption::newOption()->setUrl('action/alterarItem.php?variavel')
									  ->setType('search')
									  ->setName('Alterar');


$grid->addFunctionColumn('ucfirst', 1);

$grid->addFunctionColumn('strtoupper', 3);

function nova($var){
	return 'R$ '.$var;
}


$grid->addFunctionColumn('nova',4);




$grid->addOption($gridOption);
$grid->addOption($gridoption2);

$grid->show();

include '../../componente/rodape.php';
?>