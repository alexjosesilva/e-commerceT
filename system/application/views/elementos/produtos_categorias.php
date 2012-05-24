

<?php

/* View do Produtos Categorias
 *  Cap5 
 *  Pag 69 editado na pag 81
 */

echo "<div id='menu-categorias'>"; 
		
	echo "<a href='".base_url()."'>Home</a>";	
	echo br();
	echo "<a href='".base_url()."contato'>Contato</a>";
	echo br();
	echo "<a href='".base_url()."administracao'>Administração</a>";
    echo br(2);
    
	echo form_open(base_url()."produtos/busca");
	echo form_input('busca');
	echo form_submit('mysubmit','Buscar!');
	echo form_close();

	echo heading('Categorias',3);
	
	foreach ($categorias as $categoria):
		$lista[] = anchor(base_url() . "produtos/categoria/". $categoria->id, $categoria->nome);
	endforeach;
	
	echo ul($lista);

echo "</div>";

?>

