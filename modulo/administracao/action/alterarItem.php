<?php
require_once '../../../bootstrap.php';


$_SESSION['variavel'] = $_GET['variavel'];

header('location: '.$_SERVER['HTTP_REFERER']);