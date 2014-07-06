<?php
use system\core\Grid;
use system\core\GridOption;
use system\model\TbUsuario;
include_once '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/bootstrap.php';
include_once 'config.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/topo.php';
include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/menuprincipal.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'modulo/administracao/ModuloAdministracao.php';


$coluns = array('#','Coluna 1','Usu Login','Usu senha','Usu Nivel','Usu ativo','Pes codigo','Uni codigo');

$users = new TbUsuario();

$grid = new Grid($coluns,$users->findAll());

$gridOption = new GridOption();

$gridOption->addAction('Alterar/Usuario');
$gridOption->addAction('Adcionar/Usuario');


$grid->colunaoculta = 0;
$grid->addOption($gridOption);

$grid->show();

include '../../componente/rodape.php';
?>