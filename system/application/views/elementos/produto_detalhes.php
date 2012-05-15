<?php

echo "<div id='produtos-detalhe'>";

foreach ($detalhes_produto as $detalhe):
	echo heading($detalhe->nome,3);
	echo "<p>".$detalhe->descricao."</p>";
	echo img('imgs/'.$detalhe->foto);
	echo heading($detalhe->preco,4);
endforeach;

echo "</div>";

?>