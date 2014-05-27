<?php
require_once '../../../bootstrap.php';


use system\app\PostController as Post;

$post = new Post();

$post->setPost($_POST);

$_SESSION['post'] = $post->getPost();


header('location: '.$_SERVER['HTTP_REFERER']);