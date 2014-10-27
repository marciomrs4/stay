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


echo '<pre>';
print_r($_SESSION);
echo '</pre>';

$coluns = array('Hospitais','Resposavel','Telefone','TESTE');

//$users = new TbUsuario();
//$users->findAll();

$array;
foreach( file('ContatosHospitais.csv') as $dados){
	$array[] = explode(';', $dados);
}

function teste ($var){
	return 'R$ '.strtoupper($var);
}

$option = new GridOption('');
$option->setIco('trash')
		->setName('Excluir')
			->setUrl(ActionController::actionUrl()->setProjecName('stay')
												  ->setUrlModulo('administracao')
												  ->setUrlAction('cadastrar/doca')
												  ->setValue()
												  ->getUrl());

$grid = new Grid($coluns,$array);
$grid->addOption(GridOption::newOption('#')->setIco('search')
										->setName('Procurar')
										->setUrl(''))
	->addOption($option)
	->addOption(GridOption::newOption('#')->setIco('edit')
										  ->setName('Editar')
										  ->setUrl(''))
	->addFunctionColumn('test',1);


$painel = new Painel();
$painel->addGrid($grid)
		->setPainelTitle('Contatos Clientes')
		->setPainelColor('primary')
		->show(isset($_SESSION['action']) ? false: true);
 
$form = new FormController();
$form->setForm()->getForm();

include '../../componente/rodape.php';
?>