<?php
require_once 'bootstrap.php';

$modulo = $_GET['urlModulo'];
$action = $_GET['urlAction'];

$_SESSION['projeto'] = $configGlobal['projectName'];

$_SESSION['modulo']= $modulo;

$_SESSION['action'] = $action;


header('location: '.$_SERVER['HTTP_REFERER']);


?>