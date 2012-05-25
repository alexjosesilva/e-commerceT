<?php

	
	echo heading("Nada encontrado.",3);
	echo "Nenhum resultado encontrado com o termpo pesquisado".$termo.".";
	echo br(2);
	
	echo "<a href='javascript:history.go(-1)'>Voltar</a> | <a href='".base_url()."'>Home</a>";
	
?>