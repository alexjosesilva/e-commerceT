
<div id="form-contato">

<?php 
echo validation_errors();

echo form_open(base_url().'contato/enviar');
	echo form_fieldset("Fale conosco");
		echo form_label('Informe o seu nome','nome');
		echo form_input('nome',set_value('nome'));
		echo form_label('Informe o seu e-mail','email');
		echo form_input('email',set_value('email'));
		echo form_label('Menssagem','menssagem');
		echo form_textarea('mensagem',set_value('mensagem'));
		
		echo form_submit("enviar","Enviar");
		echo form_reset("cancelar","Cancelar");
		
	echo form_fieldset_close();
echo form_close();
?>

</div>
