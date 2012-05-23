<div id="form-cadastro">

<?php
    // 
    //  alterar_produto.php
    //  codeigniter
    //  
    //  Created by Alex on 2012-05-22.
    //  Copyright 2012 Alex. All rights reserved.
    //  
    //  View de alterar produto
    //  Cap 9 Pag 129
    // 
    
    
   echo validation_errors();
   echo form_open(base_url().'administracao/produtos/gravar_alteracao');
   
   echo form_fieldset("Adicionar Produto");
   
   echo form_hidden('id',$dados_produtos[0]->id);
   
   echo form_label('Categroria','categoria');
   
   foreach($categorias as $categoria):
       $drop[$categoria->id]=$categoria->nome;
   endforeach;
   
   !set_value('categoria')?$selecionado=null:$selecionado=set_value('categoria');
   
   echo form_dropdown('categoria',$drop,$selecionado);
   
   echo form_label('Nome do produto','nome');
   echo form_input('nome',$dados_produtos[0]->nome);
   
   echo form_label('Foto do produto','userfile');
   echo form_upload('userfile','BUSCAR');
   
   echo form_label('Proço do produto','preco');
   echo form_input('preco',$dados_produtos[0]->preco);
   //echo form_input('preco',decimal_to_reaisbr($dados_produtos[0]->preco));
   
      
   echo form_label("Descrição da Produto",'descricao');
   echo form_textarea('descricao',$dados_produto[0]->descricao);
   
   echo form_submit('mysubmit','Alterar');
   echo form_submit('mysubmit','Cancelar');
   
   echo form_fieldset_close();
   echo form_close();  
    
?>

</div>

<div id='lista-produtos'>
<?php
foreach($produtos as $produto):

    echo anchor("./administracao/produtos/excluir/".$produto->id, "[X]","onclick=\"return confirm('Confirma a exclsao desta categoria?')\"");
    echo " - ";
    echo anchor("./administracao/produtos/alterar/".$produto->id, $produto->nome);
    echo br(1);

endforeach;

?>