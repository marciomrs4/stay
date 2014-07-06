<?php

namespace system\core;

class Error
{
		
	public function showErrors()
	{
		if(isset($_SESSION['erro']) or isset($_SESSION['erros'])){
		echo '<div class="alert alert-danger">';
			echo $_SESSION['erro'],'<br />';
			foreach ($_SESSION['erros'] as $erro){
				if($erro){
					echo $erro,'<br />';
				}
			}
		echo '</div>';
		}
	}

	public function showMessages()
	{
		
		if(isset($_SESSION['message'])){
			echo '<div class="alert alert-success">',
				$_SESSION['message'],
			'</div>';
		
		}

		unset($_SESSION['message']);
	}
	
}