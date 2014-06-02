<?php
include_once '../../bootstrap.php';
include_once 'config.php';

include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/comercial/ModuloComercial.php';

use system\core;
use system\core\Controler;
use system\core\FormController;
use system\model\TbUsuario;

/* echo '<pre>';
print_r($_SESSION);
echo '</pre>';  */

$controler = new FormController();

$controler->setForm()->getForm();

 echo '<pre>';
print_r($_SESSION);
echo '</pre>';

//session_unset();

include '../../componente/rodape.php';
?>