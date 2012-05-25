<?php

/*
 * View detalhe do produto: aqui estão os detalhes dos produtos
 * Cap: 5
 * Pag: 72 e 73
 * Adicionado código do carrinho de compras
 * Cap: 11
 * Pag: 143
*/
 
echo "<div id='produtos-detalhe'>";

foreach($detalhes_produto as $detalhe):
echo heading($detalhe->nome, 3); 
   
echo form_open(base_url().'carrinho/adicionar');
echo form_fieldset("Adicionar ao carrinho");

	echo form_hidden('id',$detalhe->id);
   	echo form_label('Quantidade','qty');
   	
   	$options = array(
   		'1' =>  '1',
   		'2'	=>  '2',
   		'3'	=>	'3',
   		'4'	=>	'4',
   		'5'	=>	'5',
   		'6'	=>	'6',	
   	);
   	
   	echo form_dropdown('qty',$options);
   	
   	echo form_hidden('price',$detalhe->preco);
   	echo form_hidden('name',$detalhe->nome);
   	echo form_submit("comprar","COMPRAR");

echo form_fieldset_close();
echo form_close();
      
   //echo heading("R$".decimal_to_reaisbr($detalhe->preco), 4);
   echo heading("R$".($detalhe->preco), 4);
   echo "<p>" . $detalhe->descricao . "</p>";
   echo img("imgs/".$detalhe->foto);
     
endforeach;

echo "</div>";




?>