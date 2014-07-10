<?php
require_once '../../../bootstrap.php';


$_SESSION['variavel'] = $_GET['seila'];

header('location: '.$_SERVER['HTTP_REFERER']);