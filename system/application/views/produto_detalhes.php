<?php

echo "<div id='produtos-home'>";

echo heading($produtos_categori[0]->nome_categoria,3);

foreach ($produtos_categoria[0] as $item):
	echo "<span class='item-home'>";
		echo heading($item->nome,4);
		echo img('imgs/'.$item->foto);
		echo "<a href='".base_url()."produtos/detalhe/".$item->id."'>Ver Detalhes </a>";
		echo "</span>";
endforeach;

echo "</div>";

?>