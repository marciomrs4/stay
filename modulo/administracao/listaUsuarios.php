<?php
use system\core\Grid;
use system\core\GridOption;
use system\model\TbUsuario;
use system\core\ActionController;
use system\core\FormController;
use system\core\Painel;
use system\core\DataBase;
include_once '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/bootstrap.php';
include_once 'config.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/topo.php';
include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/menuprincipal.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'modulo/administracao/ModuloAdministracao.php';



$coluns = array('Nome','Ramal','E-mail','Celular','Telefone');

$users = new TbUsuario();
$grid = new Grid($coluns,$users->findAll());
$grid->colunaoculta = 1;


$painel = new Painel();
$painel->addGrid($grid)
		->setPainelTitle('Lista de Ramais')
		->setPainelColor('primary')
		->show(isset($_SESSION['action']) ? false: true);

$form = new FormController();
$form->setForm()
	 ->getForm();

include '../../componente/rodape.php';
?>