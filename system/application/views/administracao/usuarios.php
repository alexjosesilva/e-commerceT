<div id="form-cadastro">

<?php
    
    echo validation_errors();
    
    echo form_open_multipart(base_url().'administracao/usuarios/cadastrar');
    
    echo form_fieldset('Adicionar Usuario');
    
        echo form_label('Tipo de usuário:','usuario');
              
        echo "<div id='tipo-usuario'>";
           echo "<p>".form_radio('usuario','Administrador')."Adminstrador</p>";
           echo "<p>".form_radio('usuario','Comprador')."Comprador</p>";
        echo "</div>";
           
        echo form_label('Nome do usuário','nome');
        echo form_input('nome',set_value('nome'));
        
        echo form_label('Email','email');
        echo form_input('email',set_value('email'));
                
        echo form_label('Telefone','telefone');
        echo form_input('telefone',set_value('telefone'));
        
        echo form_label('Inserir senha','senha');
        echo form_password('senha',set_value('senha'));
        
        echo form_label('Confirmar senha','senha');
        echo form_password('senhaconfirmar',set_value('senha'));
        
        echo form_submit('mysubmit','Adicionar');
        echo form_reset('mysubmit','Cancelar');
                
    echo form_fieldset_close();
    
    echo form_close();
    
?>

</div>

<div id='lista-usuarios'>
<?php
foreach($usuarios as $usuario):

    echo anchor("./administracao/usuarios/excluir/".$usuario->id, "[X]","onclick=\"return confirm('Confirma a exclusao deste Usuário ?')\"");
    echo " - ";
    echo anchor("./administracao/usuarios/alterar/".$usuario->id, $usuario->nome);
    echo br('1');
   
endforeach;

?>
</div>