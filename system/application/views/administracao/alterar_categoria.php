<div id="form-cadastro">


<?php
   
   // 
   //  alterar_categoria.php
   //  codeigniter
   //  
   //  Created by Alex jose silva on 2012-05-20.
   //  Copyright 2012 Alex. All rights reserved.
   // 
   
   
   echo validation_errors();
   echo form_open(base_url().'administracao/categorias/gravar_alteracao');
   
   echo form_fieldset("Alterar Categoria");
   
   echo form_hidden('id',$dados_categoria[0]->id);
   
   echo form_label("Nome da Categroria","nome");
   echo form_input('nome',$dados_categoria[0]->nome);
   
   echo form_label("Descrição da Categoria",'descricao');
   echo form_textarea('descricao',$dados_categoria[0]->descricao);
   
   echo form_submit('mysubmit','Salvar');
   echo form_reset('myreset','CANCELAR');
   
   echo form_fieldset_close();
   echo form_close();
   
?>

</div>
