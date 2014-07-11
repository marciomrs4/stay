<?php
use system\core\Grid;
use system\core\GridOption;
use system\model\TbUsuario;
use system\core\ActionController;
use system\core\FormController;
use system\core\Painel;
include_once '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/bootstrap.php';
include_once 'config.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/topo.php';
include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/menuprincipal.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'modulo/administracao/ModuloAdministracao.php';

echo $_SESSION['variavel'];


$form = new FormController();
$form->setForm()
	 ->getForm();



$coluns = array('','ID','Nome','Usu senha','Usu Nivel','Usu ativo','Pes codigo','Uni codigo');

$users = new TbUsuario();

$grid = new Grid($coluns,$users->findAll());


$gridOption = new GridOption('#');
$gridOption->setUrl('/stay/modulo/comercial/index.php')
           ->setIco('pencil')
           ->setName('Remover');

$option3 = GridOption::newOption()->setName('Excluir')
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
	 ->addFunctionColumn('mutliplica',4)
	 ->addFunctionColumn('nova',5)
	 ->addOption($gridOption)
	 ->addOption(GridOption::newOption()->setUrl('action/alterarItem.php?variavel')
									    ->setIco('search')
									    ->setName('Alterar'))
	 ->addOption($option3)
	 ->addOption(GridOption::newOption()->setIco('save')
										->setName('Exportar')
										->setUrl('action/Exportar.php?id'));

$painel = new Painel();
$painel->addGrid($grid)
	   ->setPainelTitle('Lista de usuarios')
	   ->setPainelColor('danger')
	   ->show();

$novoPainel = new Painel();
$novoPainel->addGrid(new Grid())
		   ->setPainelTitle('Novo Painel')
		   ->setPainelColor('warning')
		   ->show();


include '../../componente/rodape.php';
?>