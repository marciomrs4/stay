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



$coluns = array('','ID','Email','Nome');

$users = new TbUsuario();

$option = new GridOption('');
$option->setIco('search')
	   ->setName('Procurar')
		->setUrl('remover/artigo/');

$grid = new Grid($coluns,$users->findAll());

$grid->addOption(GridOption::newOption('=')
						->setIco('edit')
						->setName('Editar'))
	  ->addOption($option)
	  ->addFunctionColumn(function($var){
	  	return base64_encode($var);
	  },0)
	  ->addFunctionColumn(function($var){ 
	  	return rand(1,10);},2)
	  ->show();


/* $form = new system\app\Form();

$painel = new Painel();
$painel->addGrid($form)
		->setPainelTitle('Lista de Usuários')
		->setPainelColor('warning')
		->show();


$form = new FormController();
$form->setForm()
	 ->getForm();

 */

include '../../componente/rodape.php';
?>