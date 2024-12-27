<ul class="unordered-list bullet-primary text-reset" style="list-style-type: disclosure-closed;">
	<?php 
		$table_page = explode ("/",$_SERVER['PHP_SELF']);
		$total_element = count($table_page);
		if($table_page[$total_element-1]=='eglise.php'){
			echo '<li style="color: #605dba;"><a href="eglise">L\'Eglise de Champcueil</a></li>
			<li><a href="concert-eglise">Les concerts à l\'église de Champcueil</a></li>
			<li><a href="cloches-eglise">Les cloches de l\'église de Champcueil</a></li>';
		}
		if($table_page[$total_element-1]=='concert-eglise.php'){
			echo '<li><a href="eglise">L\'Eglise de Champcueil</a></li>
			<li style="color: #605dba;"><a href="concert-eglise">Les concerts à l\'église de Champcueil</a></li>
			<li><a href="cloches-eglise">Les cloches de l\'église de Champcueil</a></li>';
		}
		if($table_page[$total_element-1]=='cloches-eglise.php'){
			echo '<li><a href="eglise">L\'Eglise de Champcueil</a></li>
			<li><a href="concert-eglise">Les concerts à l\'église de Champcueil</a></li>
			<li style="color: #605dba;"><a href="cloches-eglise">Les cloches de l\'église de Champcueil</a></li>';
		}
	?>
	
</ul>