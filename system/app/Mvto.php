<?php

namespace system\app;

class Mvto
{

	public 	function separador($var)
	{
			return  substr($var, 0,9).'-'.
					substr($var, 9,1).'-'.
					#Linha abaixo é o DRT
					substr($var, 10,8).'-'.
					#Linha abaixo é a Data: Dia
					substr($var, 24,2).'/'.
					#Linha abaixo é a Data: Mês
					substr($var, 22,2).'/'.
					#Linha abaixo é a Data: Ano
					substr($var, 18,4).'-'.
					#Linha abaixo é a Data: Hora
					substr($var, 26,2).':'.
					#Linha abaixo é a Data: Min
					substr($var, 28,2).'-'.
					#Numero do relogio
					substr($var, 30,2).'-'.
					substr($var, 32);

	}
	
	
	public function alteraNome($var)
	{
		return $var.' Alterado com sucesso!!!';
	}

}

?>