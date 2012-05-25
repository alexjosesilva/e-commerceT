<div id='conteudo'>
    
<?php
echo "<div id='produtos-home'>";

/* Primeiro testar se vem vazio a categoria*/
if($produtos_categoria==NULL) 
    echo "Sem produtos cadastrados com essa categoria";
else{
       echo heading($produtos_categoria[0]->nome_categoria, 3);
    
       foreach($produtos_categoria as $item):
    
            echo "<span class='item-home'>";
    
                echo heading($item->nome,4);
                echo img("imgs/".$item->foto);
                echo "<a href='".base_url()."produtos/detalhe/". $item->id ."'>";
                    echo "Ver Detalhes";
                echo "</a>";
    
            echo "</span>";
    
        endforeach;
}
echo "</div>";
?>

</div>