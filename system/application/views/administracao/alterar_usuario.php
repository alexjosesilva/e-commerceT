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
   echo form_open_multipart(base_url().'administracao/usuarios/gravar_alteracao');
   
   echo form_fieldset("Alterar Usuario");
   
   echo form_hidden('id',$dados_usuario[0]->id);
   
   echo form_label('Nome do usuario','nome');
   echo form_input('nome',$dados_usuario[0]->nome);
   
   echo form_label('Tipo de usuario:','usuario');
   echo form_input('usuario',$dados_usuario[0]->usuario);
            
   echo form_label('Email do usuario:','email');
   echo form_input('email',$dados_usuario[0]->email);
   
   
   echo form_label('Telefone','telefone');
   echo form_input('telefone',$dados_usuario[0]->telefone);
      
   echo form_label('Inserir nova senha','senha');
   echo form_password('senha',set_value('senha'));
    
   echo form_label('Confirmar senha','senha');
   echo form_password('senhaconfirmar',set_value('senha'));     
     
     
   echo form_submit('mysubmit','Alterar');
   echo form_reset('myreset','CANCELAR');
   
   echo form_fieldset_close();
   echo form_close();  
    
?>

</div>

<div id='lista-usuarios'>
<?php
foreach($usuarios as $usuario):

    echo anchor("./administracao/usuarios/excluir/".$usuario->id, "[X]","onclick=\"return confirm('Confirma a exclsao desta usuarios?')\"");
    echo " - ";
    echo anchor("./administracao/usuarios/alterar/".$usuario->id, $usuario->nome."-[ ". $usuario->usuario."]");
    echo br(1);

endforeach;

?>