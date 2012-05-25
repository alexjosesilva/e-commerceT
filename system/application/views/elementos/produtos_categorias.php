

<?php

/* *********************************
 * View do Produtos Categorias
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

	/***************************************************
	 * Código do carrinho na view produtos categorias
	 * Cap 11 
	 * Pag 149
	 */
	echo br();
	
	echo "<span class='linkcart'>";
		if($this->cart->total_items() && $this->cart->total_items()>0){
			echo anchor(base_url().'carrinho',"Vocês tem [ <b>".$this->cart->total_items()."</b> ] itens no seu carrinhho");
		}
		else{
			echo anchor(base_url().'carrinho',"Seu carrinho está vazio!");
		}
	
	echo "</span>";
	
	echo heading('Categorias',3);
	
	foreach ($categorias as $categoria):
		$lista[] = anchor(base_url() . "produtos/categoria/". $categoria->id, $categoria->nome);
	endforeach;
	
	echo ul($lista);

echo "</div>";

?>

