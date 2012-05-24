<?php

/*
 * View detalhe do produto: aqui estão os detalhes dos produtos
 * Cap 5
 * Pag 72 e 73
*/
 
echo "<div id='produtos-detalhe'>";

foreach($detalhes_produto as $detalhe):
   
   echo heading($detalhe->nome, 3); 
   echo "<p>" . $detalhe->descricao . "</p>"; 
   echo img("imgs/".$detalhe->foto);
   //echo heading("R$".decimal_to_reaisbr($detalhe->preco), 4);
   echo heading("R$".($detalhe->preco), 4);
     
endforeach;

echo "</div>";




?>