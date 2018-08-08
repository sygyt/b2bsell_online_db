<?php


class Configuration{
	function base_url()
	{
		

		$docRoot = $_SERVER['SERVER_NAME'];
		$base_url= "http://".$docRoot."/fiver/ser/app/";
	
	
		return $base_url;
	}
	function base_title()
	{
		$base_title= " My | Resume ";
		return $base_title;
	}
	
}
?>