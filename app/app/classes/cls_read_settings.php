<?php	
	class ReadSettings{		
		public static function getValue($parent, $element){
			//$FILE_NAME = $_SERVER['DOCUMENT_ROOT'] . '/saliya-service-center/settings/settings.xml';
			$FILE_NAME = 'http://service.saliyamotors.com/settings/settings.xml';
			$XML = new DOMDocument();
			$XML->load($FILE_NAME);
			
			$groups = $XML->getElementsByTagName( $parent );
			$element = $groups->item(0)->getElementsByTagName( $element );
			
			return $element->item(0)->nodeValue;
		}				
	}
?>