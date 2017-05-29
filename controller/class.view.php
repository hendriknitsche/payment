<?php

class view{

	public function show($view = false, $data=array()) 
	{
		if($view === false)
			return false;

		foreach($data as $var => $val)
		{
			$$var = $val;
		}
		require_once('view/'.$view.'.php');
	}
  
}
