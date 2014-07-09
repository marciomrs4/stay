<?php
namespace system\core;

class GridOption implements Option
{
	protected $buttonList = array();
	
    protected $url;
	protected $action;
	protected $type;
	private $value;
    
	public function setAction($action)
	{
	    $this->action = $action;
	    return $this;
	}

	private function getAction()
	{
	    return $this->action;	
	}
	
	public function setType($type)
	{
	    $this->type = $type;
	    return $this;
	}
	
	private function getType()
	{
	    return $this->type;
	}
	
	public function setUrl($url)
	{
	    $this->url = $url;
	    return $this;
	}
	
	private function getUrl()
	{
	   return $this->url;   
	}
	
	public function setValue($value)
	{
	    $this->value = $value;
	    return $this;
	}
	
	public function getValue()
	{
	    return $this->value;
	}
	
	public function addAction($text)
	{
		
		$this->buttonList[] =
		"<li>
		    <a href=".$this->getUrl().$this->getValue().">
		      <span class='glyphicon glyphicon-{$this->getType()}'>
		      </span>
		      $text
		      </a>
		</li>";
		
		return $this;
	    
	}

	private function createButtonList($value)
	{
	    $this->setValue($value);
	    
        $buttonList = '';
        	    
	    foreach ($this->buttonList as $button){
	         $buttonList .= $button;
	    }
	    
	    return $buttonList;
	}
	
	public function createOption($value)
	{

	    
	    $option = '';
	    
	    $option = '<div class="btn-group">
	           <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
	               Opções <span class="caret"></span>
	           </button>
	           <ul class="dropdown-menu" role="menu">'.
	               $this->createButtonList($value).	        	
	           '</ul>
	          </div>';
	    
	    return $option;  
       
	}
	
	
}