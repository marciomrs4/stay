<?php
include_once '../../bootstrap.php';
include_once 'config.php';

include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/comercial/ModuloComercial.php';

use system\core;
use system\core\Controler;
use system\core\FormController;


$controler = new FormController($_SESSION);

$controler->setForm()->getForm();


include '../../componente/rodape.php';
?>