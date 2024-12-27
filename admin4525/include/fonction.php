
  <?php  
  function clean($string) {
		$string = html_entity_decode(preg_replace('/&([a-zA-Z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);/i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8');
		$string = strtolower(trim(preg_replace('/[^0-9a-z]+/i', '-', $string), '-'));
		return $string;
	}
	function wd_remove_accents($str, $charset='utf-8'){
		$str = htmlentities($str, ENT_NOQUOTES, $charset);    
		$str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
		$str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
		$str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères    
		return $str;
	}
	function string2url($chaine) { 
		$chaine = trim($chaine); 
		$chaine = strtr($chaine, 
		"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ", 
		"aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn"); 
		$chaine = strtr($chaine,"ABCDEFGHIJKLMNOPQRSTUVWXYZ","abcdefghijklmnopqrstuvwxyz"); 
		$chaine = strtr($chaine,"."," "); 
		$chaine = preg_replace('#([^.a-z0-9]+)#i', '-', $chaine); 
		$chaine = preg_replace('#-{2,}#','-',$chaine); 
		$chaine = preg_replace('#-$#','',$chaine); 
		$chaine = preg_replace('#^-#','',$chaine); 
		return $chaine; 
	}
  ?>
  