<?php
namespace AsiLZade;

class Router

{
	public $url;

	public function __construct()
	{

		$data = explode('/',$this->url);
		$controllername = $data[0];
		if($data[0]==null){
			$controllername = 'Home';
		}
		$function = $data[1];
		if($data[1] == null){
			$function = 'Index';
			
		}

		require_once('Controller/' . $controllername . '.php');
		
		$controllername::$function();
	}

}

?>