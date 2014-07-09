<?php
namespace system\core;

class ActionController
{
	protected $projectName;
	protected $urlModulo;
	protected $urlAction;
	protected $urlValue;
	
	
	protected $controler = 'FrontControler.php';
	
	private $url;
	
	public static function actionUrl()
	{
        return  new ActionController();
	}
	
	public function setProjecName($projectName)
	{
		$this->projectName = DIRECTORY_SEPARATOR.strtolower($projectName).DIRECTORY_SEPARATOR.$this->controler;
		return $this;
	}

	public function setUrlModulo($urlModulo)
	{
		$this->urlModulo = '?urlModulo='.strtolower($urlModulo);
		return $this;
	}
	
	public function setUrlAction($urlAction)
	{
		$this->urlAction = '&urlAction='.strtolower($urlAction);
		return $this;
	}
	
	public function setValue($urlValue)
	{
		settype($urlValue, 'int');
		$this->urlValue = '&urlValue='.$urlValue;
		return $this;
	}
	
	private function __get($propName)
	{
	    return $this->$propName;
	}
	
	public function getUrl()
	{
/* 		echo '/',$this->projectName,'/',
				 $this->controler,'?
				 urlModulo=',$this->urlModulo,
			   '&urlAction=',$this->urlAction,'
				&urlValue=',$this->urlValue;
 */		
		echo $this->__get('projectName'),
		     $this->__get('urlModulo'),
		     $this->__get('urlAction'),
		     $this->__get('urlValue');
		     
		
	}
	
}