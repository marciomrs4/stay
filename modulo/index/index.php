<?php
include_once '../../bootstrap.php';


use system\app\FormController as Form;

$Controller = new Form();
$Controller->setForm('../../forms/login')->getForm();

?>