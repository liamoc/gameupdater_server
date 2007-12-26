<?php

class template
{
	function template($tpl)
	{
		$this->fn = $tpl;
		$this->vars = array();
	}
	
	function set($n, $v)
	{
		$this->vars[$n] = $v;
	}
	
	function show()
	{
		extract($this->vars);
		include("templates/" . $this->fn);
	}
}

?>