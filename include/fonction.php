
  <?php  
  function clean($string) {
    $string = html_entity_decode(preg_replace('/&([a-zA-Z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);/i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8');
    $string = strtolower(trim(preg_replace('/[^0-9a-z]+/i', '-', $string), '-'));
    return $string;
}
  ?>
  