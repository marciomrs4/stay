<?php
include_once '../../bootstrap.php';
include_once 'config.php';

include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/comercial/ModuloComercial.php';

use system\app\Form;
use system\core\Painel;

$form = new Form();
$form->setForm();

$painel = new Painel();

$painel->addGrid($form)
	   ->setPainelTitle('Painel de Formulario')
	   ->show();


include '../../componente/rodape.php';
?>