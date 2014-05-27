<?php
include_once '../../bootstrap.php';
include_once 'config.php';

include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/comercial/ModuloComercial.php';

use system\app;
use system\app\Controler;
use system\app\FormController;


$controler = new FormController($_SESSION);

$controler->setForm()->getForm();

session_destroy();

include '../../componente/rodape.php';
?>