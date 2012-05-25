<?php 
	
	/*
     *  View de produto home
     * Cap 5
     * Pag 70
     * 
     */
echo "<div id='produtos-home'>";

echo heading('Bem Vindo ao Catalogo de Produtos!',3);



foreach ($produtos as $item):
	
	echo "<span class='item-home'>";
	
    	echo heading($item->nome,4);
		echo img('imgs/'.$item->foto);
		echo "<a href='".base_url()."produtos/detalhe/". $item->id ."'>Ver Detalhes</a>";
                
	echo "</span>";
 
endforeach;

echo "</div>";

// Paginação do sistema
if($paginas!=NULL)
 echo $paginas;
?>