<?php
use system\core\Painel;
use system\app\GraficoPainel;
use system\core\FormController;
use system\app\Form;
require_once '../../bootstrap.php';
include_once 'config.php';

include '../../componente/topo.php';
include '../../componente/menuprincipal.php';

include '../../modulo/administracao/ModuloAdministracao.php';

$painel = new Painel();

$grid = new GraficoPainel();
$grid->setForm('graficos/GraficoClientesBarra');

$painel->addGrid($grid)
		->setPainelColor('primary')
		->setPainelTitle('Grafico de Arquitetos PJ')
	    ->show(!isset($_SESSION['action']) ? true : false);

$form = new Form();
$form->setForm();
$OutroPainel = new Painel();
$OutroPainel->addGrid($form)
			->setPainelColor('Novo')
			->show();

include '../../componente/rodape.php';
?>