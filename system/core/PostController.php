<?php

namespace system\core;

class PostController
{
	protected $post;
	
	public function setPost($post)
	{
		$this->post = $post;
	}
	
	public function getPost()
	{
		return $this->post;
	}
	
	
}