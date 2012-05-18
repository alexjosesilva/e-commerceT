<?php

	echo "<div id='menu-categorias'>";
	
	echo "<a href='".base_url()."'>HOME</a>";
	echo br();
	echo "<a href='".base_url()."contato'>CONTATO</a>";
	echo br(2);
	
	echo form_open(base_url().'produtos/busca');
	echo form_input('busca');
	echo form_submit('mysubmit','Buscar!');
	echo form_close();
	
	echo heading('Categorias',3);
		
	foreach ($produtos_categoria as $item) {
		$lista[]="<a href='".base_url()."produtos/categoria/".$categoria->id."'>".$categoria->nome."<\a>";
		
	}
	echo "</div>";

?>