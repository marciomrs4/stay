<?php
require_once '../../../bootstrap.php';

//sleep(2);

use system\app\AcceptFormAdministracao as Post;
use system\core\FormController;

try {
	
	$post = new Post();
	
	$_SESSION['file_mvto'] = $_FILES['arquivo']['tmp_name'];
	
	$post->router('../index.php');

	
	
} catch (Exception $e) {
   
    header('location: ../index.php');
}