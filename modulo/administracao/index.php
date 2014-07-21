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





$coluns = array('','Usu Nivel','Usu ativo');

$users = new TbUsuario();
/* 
echo '<pre>';
print_r($users->findAll());
echo '</pre>';
 */
$grid = new Grid($coluns,$users->findAll());



$gridOption = new GridOption('');
$gridOption->setUrl(ActionController::actionUrl()
                                    ->setProjecName($configGlobal['projectName'])
								    ->setUrlModulo('administracao')
								    ->setUrlAction('alterar/doca')
                                    ->setValue()
								    ->getUrl())
           ->setIco('pencil')
           ->setName('Alterar');

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



$grid->addOption($gridOption)
	->addOption(GridOption::newOption('/')
							->setIco('signal')
							->setName('Danilo')
							->setUrl('action/alterar'))
	->addOption($option3);

//$show = ($_SESSION['action'] == '') ? true : false;

$painel = new Painel();
$painel->setPainelTitle('Lista de usuarios')
	   ->setPainelColor('default')
	   ->addGrid($grid)
	   ->show(($_SESSION['action'] == '') ? true : false);


$form = new FormController();
$form->setForm()
	 ->getForm();



include '../../componente/rodape.php';
?>