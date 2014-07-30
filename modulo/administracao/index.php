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


$coluns = array('','ID','Email');

$users = new TbUsuario();

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


$grid->addOption($gridOption)
	->addOption(GridOption::newOption('/')
							->setIco('signal')
							->setName('Danilo')
							->setUrl('action/alterar'))
	->addOption($option3)
	->addFunctionColumn(function($var){ return strtoupper($var);}, 1)
	->addFunctionColumn(function($var){return $var.'Ahh manolo';}, 0);

$painel = new Painel();
$painel->setPainelTitle('Lista de usuarios')
	   ->setPainelColor('default')
	   ->addGrid($grid)
	   ->show(!isset($_SESSION['action']));


$form = new FormController();
$form->setForm()
	 ->getForm();



include '../../componente/rodape.php';
?>