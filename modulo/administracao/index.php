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

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

$coluns = array('LINHA','Identificador','DRT','Data','Hora','N° Relogio','ID Relogio');


function separador($var){
	 return substr($var, 0,9).'-'.
			substr($var, 9,1).'-'.
			#Linha abaixo é o DRT
			substr($var, 10,8).'-'.
			#Linha abaixo é a Data: Dia
			substr($var, 24,2).'/'.						
	 		#Linha abaixo é a Data: Mês
			substr($var, 22,2).'/'.
			#Linha abaixo é a Data: Ano
			substr($var, 18,4).'-'.
			#Linha abaixo é a Data: Hora
			substr($var, 26,2).':'.
			#Linha abaixo é a Data: Min
			substr($var, 28,2).'-'.
			#Numero do relogio
			substr($var, 30,2).'-'.			
			substr($var, 32);
}


$array;


foreach(file($_FILES['arquivo']['tmp_name']) as $dados){
	$array[] = explode('-', separador($dados));
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