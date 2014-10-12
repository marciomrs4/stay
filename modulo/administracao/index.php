<?php
use system\core\Grid;
use system\core\GridOption;
use system\model\TbUsuario;
use system\core\ActionController;
use system\core\FormController;
use system\core\Painel;
use system\core\SessionController;
include_once '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/bootstrap.php';
include_once 'config.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/topo.php';
include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/menuprincipal.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'modulo/administracao/ModuloAdministracao.php';

/* echo '<pre>';
print_r($_SESSION);
echo '</pre>'; */

$coluns = array('ID','Identificador','Nome','DEPTO','Data','Dia','Mes','Ano','ID UN');

$array;


foreach(file('csv.csv') as $dados){
	$array[] = explode(';',$dados);
}


$grid = new Grid($coluns,$array);

$grid->addFunctionColumn(function($var){
	  	return $var.' Olha Aqui';},0)
	 ->addFunctionColumn('separaor',0);


$painel = new Painel();
$painel->addGrid($grid)
		->setPainelTitle('Arquivo MVTO')
		->setPainelColor('primary')
		->show(isset($_SESSION['action']) ? false: true);

$form = new FormController();
$form->setForm()
	 ->getForm();

include '../../componente/rodape.php';
?>