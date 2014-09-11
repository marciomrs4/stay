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



$coluns = array('','ID','Email','Nome','','','','','');

/* $users = new TbUsuario();

echo '<pre>';
print_r($users->findAll());
echo '</pre>';
 */

$array;
foreach( file('csv.csv') as $dados){
	$array[] = explode(';', $dados);
}

/* $option = new GridOption('');
$option->setIco('search')
	   ->setName('Procurar')
		->setUrl('remover/artigo/');

 */

$grid = new Grid($coluns,$array);



$grid->addFunctionColumn(function($var){
	  	return $var.' Olha Aqui';
	  },0)->addFunctionColumn(function($var){
	 	return strtoupper($var);
	 },3)->addFunctionColumn(function ($var){
	return str_replace('/', '-', $var);
},4);


$painel = new Painel();
$painel->addGrid($grid)
		->setPainelTitle('Lista de Usu�rios')
		->setPainelColor('primary')
		->show();

$grid2 = new \system\app\Grid('TEXTO');

$painel2 =  new Painel();
$painel2->addGrid($grid2)
		->setPainelColor('primary')->setPainelTitle('Sei l�')->show();

$form = new FormController();
$form->setForm()
	 ->getForm();



include '../../componente/rodape.php';
?>