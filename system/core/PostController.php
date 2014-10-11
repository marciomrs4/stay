<?php

namespace system\core;

abstract class PostController
{
		
	protected $post;

	public function validarPost($post)
	{ 
		if($post)
		{
			$this->setpost($post);
			$_SESSION['post'] = $post;

		}elseif($_SESSION['post'])
		{
			$this->setpost($_SESSION['post']);
		}
		
	}
	
	public function setPost($post)
	{
		$this->post = $post;
		return $this;
	}
	
	public function getPost()
	{
		return($this->post);
	}

	public function setValueGet($get,$getname)
	{
		foreach ($get as $chaves => $valor){break 1;}
		
		$this->post[$getname] = $valor;
		
		return $this;
	}
	
	public function getValueGet($getname)
	{
		return(base64_decode($this->post[$getname]));
	}

	public function listarpost()
	{
		foreach ($this->post as $campo => $valor)
		{
			echo("
					[ Campo:<font color='blue'> ( {$campo} )</font>  ] 
							- 
				  	[ Valor:<font color='red'> ( {$valor} )</font>  ]
				  <br />
				");
		}
	}

	#Metodo para facilitar obter os nomes dos campos
	public function criarCampos()
	{
		foreach ($this->post as $campo => $valor)
		{
			echo('$this->post[\''.$campo.'\']<br />');
		}
	}

	public function criarArray($post)
	{
		$Array = explode(',', $post);
		
		return($Array);
	}
	
	public function clearPost($action, $message = 'Cadastrado com sucesso !')
	{
		unset($_SESSION['action'],$_SESSION[$action]);

		$_SESSION['message'] = $message;

		return $this;

	}
	
	public function router($location=null)
	{
		if($location==null){
			header('location: '.$_SERVER['HTTP_REFERER']);
		}

		header('location: '.$location);
	}
	
	
}