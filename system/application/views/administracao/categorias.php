<div id="form-cadastro">


<?php
   
   echo validation_errors();
   echo form_open(base_url()."administracacao/categorias/adicionar");
   
   echo form_fieldset("Adicionar Categoria");
   
   echo form_label("Nome da Categroria","nome");
   echo form_input('nome',set_value('nome'));
   
   echo form_label("Descrição da Categoria",'descricao');
   echo form_textarea('descricao',set_value('descricao'));
   
   echo form_submit('mysubmit','Adicionar');
   
   echo form_fieldset_close();
   
   echo form_close();
   
?>

</div>

<div id="lista-categorias">
<?php

   foreach ($categorias as $categoria):  
   
    $link = anchor("administracao/categorias/excluir".$categoria->id,"[x]","onclick=\"return confirm('Confirmar a Exclusao desta categoria ?')\"");
    $link .="-";
    $link .= anchor("administracao/categorias/alterar/".$categoria->id, $categoria->nome);
    $ul[] =$link;
   
   endforeach;
   
   echo ul($ul);
?>   
</div>