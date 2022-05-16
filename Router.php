<?php
namespace AsiLZade;

class Router

{
	public $url;

	public function __construct()
	{
		if(!isset($_GET['url'])){
			
			echo '404';
			
		}
		else
		{
			$this->url = $_GET['url'];
		}
		
	
		$data = explode('/',$this->url);
		$controllername = $data[0];
		$function = $data[1];
		
		
		require_once('Controller/' . $controllername . '.php');
		
		
		$controllername::$function();
	}

}

?>